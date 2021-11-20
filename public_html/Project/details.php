<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<?php 
$query="SELECT name,description,category,stock,unit_price FROM Products WHERE id=:id";
$params=[":id"=>$_GET["id"]];
$db=getDB();
$stmt=$db->prepare($query);
$column=[];
try{
    $stmt->execute($params);
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
    if($results){
        $column=$results;
    }
    else{
        flash("No Products Found","warning");
    }
}
catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");

}

?>
<h1>Product Information for <?php se($column,"name")?></h1>
<?php foreach($column as $index=>$value) : ?>
      <tr>
          <td><b><?php echo $index ,":" ?></b></td>
          <?php if($index=="unit_price") : ?>
                <?php $priceConversion = $value/100;?>
                <td> <?php echo "$", number_format($priceConversion,2) ?></td>
          <?php else :?>
          <td><?php echo $value ?></td>  
          <?php endif;?>
      </tr>
      <br>

<?php endforeach;  ?>

<?php if(is_logged_in()) : ?>
     <form method="POST">
     <label for="quantity"> Quantity: </label>
     <input type="hidden" name="product_id" value=<?php se($_GET,"id"); ?> >
     <input type="hidden" name="user_id" value=<?php se($_SESSION["user"], "id", "", true)?> >
     <input required id="quantity" type="number" min="1" max=<?php se($column,"stock"); ?> name="desired_quantity">
     <input type="hidden" name="unit_cost" value=<?php se($column,"unit_price");?> >
     <input type="submit" name="submit" value="Add To Cart" >
     </form> 
<?php endif; ?>

<?php
if(isset($_POST["submit"])){
    /*$db = getDB();
        $stmt = $db->prepare("INSERT INTO Products (name, description, category, stock, unit_price, visibility) VALUES(:name, :description, :category, :stock,:unit_price,:visibility)");
        try {
            $stmt->execute([":name" => $productName, ":description" => $description, ":category" => $category,":stock" => (int)$stock, ":unit_price" => (int)$unitPrice, ":visibility" => $visibility]);
            flash("Product Added to Inventory","success");
        } catch (Exception $e) {
            flash("There was a problem adding to the inventory","danger");
            flash("<pre>" . var_export($e, true) . "</pre>");
            users_check_duplicate($e->errorInfo);
        }

    */
    echo "Product Id: ", $_POST["product_id"],"<br>","User Id: ",
    $_POST["user_id"],"<br>", "Desired Quantity:", $_POST["desired_quantity"],"<br>","Unit_Cost:",
    $_POST["unit_cost"];
    $query="INSERT INTO Cart ( ";
    $ignore=["submit"];
    $arr=[];
    $arr2=[];
    $params=[];
    foreach($_POST as $column=>$value){
        if(in_array($column,$ignore)){
            continue;
        }
        array_push($arr,$column);
        array_push($arr2,":$column");
        $params+=[":$column"=>$value];

    }
    $query.=join(",",$arr);
    $query.=") VALUES (";
    $query.=join(",",$arr2);
    $query.=")";
    echo "<br>";
    echo $query;
    $db=getDB();
    $stmt=$db->prepare($query);
    try{
        $stmt->execute($params);
        flash("Added to Cart", "Success");
        
    }
    catch(Exception $e){
        flash("Item Already in Cart","danger");
        flash("<pre>" . var_export($e, true) . "</pre>");


    }

}

?>




<?php
require(__DIR__ . "/../../partials/flash.php");
?>