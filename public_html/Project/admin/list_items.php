<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!(has_role("Admin")||has_role("Shop_Owner"))) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "home.php"));
}
?>
<?php
$results_per_page=2;
$ratings=[];
$query="SELECT * FROM Products WHERE visibility=1";
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
$query="SELECT id,name from Products WHERE (visibility=1 OR visibility=0)";
$params=[];
if(isset($_POST["category"])&&!empty($_POST["category"])){
    $cat=se($_POST,"category","",false);
    $query.=" AND category LIKE :category";
    $params+= [":category"=>$cat];
}
if(isset($_POST["product"])&&!empty($_POST["product"])){
    $prod=se($_POST,"product","",false);
    $query.=" AND name LIKE :name";
    $params+=[":name"=>"%$prod%"];
}
if(isset($_POST["stock"])&&!empty($_POST["stock"])){
    $query.=" AND stock=0";
}
if(isset($_POST["price"])){
        $query.=" ORDER BY unit_price ASC";    
    }
else{
    $query.=" ORDER BY modified DESC";
}
$query.=" LIMIT $this_page_first_result,$results_per_page";
$db=getDB();
$stmt=$db->prepare($query);
$products=[];
try{
    $stmt->execute($params);
    $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if($results){
        $products=$results;
    }
    else{
        flash("No Products Found","warning");
    }
}
catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");

}

?>



<h2>Filter Products</h2>
<form method="POST">
    <label for="Category"><b>Category</b> </label>
    <input id="Category" type="text" name="category">
    <br>
    <label for="product"><b>Product Name</b> </label>
    <input id="product" type="text" name="product">
    <br>
    <label for="price"><b>Sort by Price</b></label>
    <input id="price" type="checkbox" name="price" value="yes">
    <br>
    <label for="stock"><b>See Items out of Stock</b></label>
    <input id="stock" type="checkbox" name="stock" value="yes">
    <br>
    <input type="submit" value="filter" />
    <br>
   
</form>
<table>
    <thead>
        <th>Product List</th>
    </thead>
    <tbody>
        <?php if (empty($products)) : ?>
            <tr>
                <td colspan="100%">No products Found</td>
            </tr>
        <?php else : ?>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php se($product, "name"); ?></td>
                    <td>
                    <a href="edit_items.php?id=<?php se($product, "id"); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<h4> Select Page </h4>
<?php
 for($page=1;$page<=$number_of_pages;$page++){
    
    $loc="list_items.php?page=$page";
    echo "<a href=$loc>$page </a>";
}
?>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>