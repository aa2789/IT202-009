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
            $stmt->execute([":name" => $productName, ":description" => $description, ":category" => $category,":stock" => (int)$stock, ":unit_price" => (int)$unitPrice, ":visibility" => $visibility]);
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
    <input id="name" type="text" name="productName" required><br>
    <label for="desc"> Description </label><br>
    <textarea id="desc" rows="5" cols="30" name="description" required></textarea><br>
    <label for="cat"> Category</label><br>
    <input id="cat" type="text" name="category" required><br>
    <label for="stk"> Stock </label><br>
    <input id="stk" type="text" name="stock" required><br>
    <label for="price"> Unit Price </label><br>
    <input id="price" min="0" type="number" name="unitPrice"><br>
    <label for="vis"> Visibility </label><br>
    <input id="vis" min="0" max="1" type="number" name="visibility"> <br>
    <input type="submit" value="Add Item" name="submit"/>

</form>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>




