<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!(has_role("Admin")||has_role("Shop_Owner"))) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "home.php"));
}
?>

<?php
$id=se($_GET,"id","",false);
$query="SELECT name, description, category, stock, unit_price, visibility FROM Products where id = :id";
$params=[":id"=>$id];
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
<h2>Edit <?php se($column,"name") ?></h2>
<form method="POST">  
    <label for="name"> Product Name: </label><br>
    <input id="name" type="text" name="name" value="<?php se($column,"name"); ?>" required><br>
    <label for="desc"> Description </label><br>
    <textarea id="desc" rows="5" cols="30" name="description" required> <?php echo $column["description"]; ?> </textarea><br>
    <label for="cat"> Category</label><br>
    <input id="cat" type="text" name="category" value=<?php se($column,"category");?> required><br>
    <label for="stk"> Stock </label><br>
    <input id="stk" type="text" name="stock" value=<?php se($column,"stock");?>  required><br>
    <label for="price"> Unit Price </label><br>
    <input id="price" min="0" type="number" name="unit_price" value=<?php se($column,"unit_price");?>><br>
    <label for="vis"> Visibility </label><br>
    <input id="vis" min="0" max="1" type="number" name="visibility" value=<?php se($column,"visibility");?>> <br>
    <input type="submit" value="Edit" name="submit"/>

</form>
<?php
if(isset($_POST["submit"])){
$id=se($_GET,"id","",false);
$ignore=["submit"];
$query="UPDATE Products SET ";
$arr=[];
$params=[":id"=>$id];
foreach($_POST as $column=>$value){
    if(in_array($column,$ignore)){
        continue;
    }
    $val=se($value,null,"",false);
    array_push($arr,"$column= :$column");
    $params+=[":$column"=>$val];
    
}
$query.=join(",",$arr);
$query.=" WHERE id=:id";

$db=getDB();
$stmt=$db->prepare($query);
try{
    $stmt->execute($params);
    flash("Updated Item","success");

}
catch( PDOException $e){
    flash(var_export($e->errorInfo, true), "danger");

}



}

?>


<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>
