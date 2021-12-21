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

<h2> Product Ratings </h2>
<?php $results_per_page=10;
      $ratings=[];
      $productID=se($_GET,"id","",false);
      $query="SELECT * FROM Ratings WHERE product_id=$productID";
      $db=getDB();
      $stmt=$db->prepare($query);
      try{
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($results){
            $ratings=$results;
        }
        
    }
    catch(Exception $e){
        flash("<pre>" . var_export($e, true) . "</pre>");
    }
    $number_of_results= count($ratings);
    $number_of_pages=ceil($number_of_results/$results_per_page);
    if(!isset($_GET["page"])){
        $page=1;
    }
    else{
        $page=$_GET["page"];
    }
    $this_page_first_result=($page-1)*$results_per_page;
    $query="SELECT * FROM Ratings WHERE product_id=$productID LIMIT $this_page_first_result,$results_per_page";
    $db=getDB();
    $stmt=$db->prepare($query);
    try{
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if($results){
          $ratings=$results;
      }
      
  }
  catch(Exception $e){
      flash("<pre>" . var_export($e, true) . "</pre>");
  }
  if(count($ratings)>0){
  $averageRating=0;
  foreach($ratings as $rate){
      $r=se($rate,"rating","",false);
      $c=se($rate,"comment","",false);
      $averageRating+=$r;
      echo "rating: ",$r, "    ","comment: ",$c,"<br>";
  }
  echo "Average Rating: ",number_format(($averageRating/count($ratings)),2),"<br>";
    for($page=1;$page<=$number_of_pages;$page++){
        $productID=se($_GET,"id","",false);
        $loc="details.php?id=$productID&page=$page";
        echo "<a href=$loc>$page </a>";
    }
}
?>



<h2>Rate Product</h2>
<form method="POST">  
    <label for="rating"> Rating </label><br>
    <input id="rating" min="1" max="5" type="number" name="rating" ><br>
    <label for="comment"> Comment </label><br>
    <textarea id="comment" rows="5" cols="30" name="comment" required> </textarea><br>
    <input type="submit" value="Submit Rating" name="submitRating"/>

</form>

<?php 
if(isset($_POST["submitRating"])){
    $productID=$_GET["id"];
    $userID=get_user_id();
    $rating=se($_POST,"rating","",false);
    $comment=se($_POST,"comment","",false);
    $query="INSERT INTO Ratings(product_id,user_id,rating,comment) VALUES (:product_id,:user_id,:rating,:comment)";
    $db=getDB();
    $stmt=$db->prepare($query);
     $flag=false;
    try {
        $stmt->execute([":product_id" => $productID, ":user_id" => $userID, ":rating" => $rating,":comment"=>$comment]);
        $flag=true;
    } catch (Exception $e) {
        flash("There was a problem adding the rating","danger");
        flash("<pre>" . var_export($e, true) . "</pre>");
        
    }
    if($flag==true){
        if(count($ratings)==0){
            $averageRating=0;
        }
        $currSum=$averageRating+$rating;
        $num=count($ratings)+1;
        $avg=$currSum/$num;
        $query="UPDATE Products SET average_rating=$avg WHERE id=$productID";
        $db=getDB();
        $stmt=$db->prepare($query);
        try{
            $stmt->execute();
        }
        catch(Exception $e){
            flash("There was a problem updating the average rating");
        }
    }

}


?>
 



<?php
require(__DIR__ . "/../../partials/flash.php");
?>