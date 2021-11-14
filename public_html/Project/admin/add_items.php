<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!(has_role("Admin")||has_role("Shop_Owner"))) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "home.php"));
}

if(isset($_POST["submit"])){
    $productName=se($_POST,"productName","",false);
    $description=se($_POST,"description","",false);
    $category=se($_POST,"category","",false);
    $stock=se($_POST,"stock","",false);
    $unitPrice=se($_POST,"unitPrice","",false);
    $visibility=se($_POST,"visibility","",false);
    $hasError=false;
    if(empty($productName)){
        flash("Product name not entered","warning");
        $hasError=true;
    }
    if(empty($description)){
        flash("Description not entered","warning");
        $hasError=true;
    }
    if(empty($category)){
        flash("Category is not entered","warning");
        $hasError=true;
    }
    if(!$hasError){
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Products (name, description, category, stock, unit_price, visibility) VALUES(:name, :description, :category, :stock,:unit_price,:visibility)");
        try {
            $stmt->execute([":name" => $productName, ":description" => $description, ":category" => $category,":stock" => (int)$stock, ":unit_price" => (int)$unitPrice, ":visibility" => (bool)$visibility]);
            flash("Product Added to Inventory","success");
        } catch (Exception $e) {
            flash("There was a problem adding to the inventory","danger");
            flash("<pre>" . var_export($e, true) . "</pre>");
            users_check_duplicate($e->errorInfo);
        }


    }

}

?>

<h1>Add Products to Inventory</h1>
<form method="POST">  
    <label for="name"> Product Name: </label><br>
    <input type="text" name="productName"><br>
    <label for="name"> Description </label><br>
    <textarea rows="5" cols="30" name="description"></textarea><br>
    <label for="name"> Category</label><br>
    <input type="text" name="category"><br>
    <label for="name"> Stock </label><br>
    <input type="text" name="stock"><br>
    <label for="name"> Unit Price </label><br>
    <input type="number" name="unitPrice"><br>
    <label for="name"> Visibility </label><br>
    <input min="0" max="1" type="number" name="visibility" value=1> <br>
    <input type="submit" value="Add Role" name="submit"/>

</form>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>




