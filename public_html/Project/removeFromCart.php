<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<?php 
$id=get_user_id();
$productId=$_GET["product_id"];
if($productId!="all"){
$query="DELETE FROM Cart WHERE user_id=$id AND product_id=$productId"; 
}
else{
    $query="DELETE FROM Cart WHERE user_id=$id";

}
$db=getDB();
$stmt=$db->prepare($query);
try {
    $stmt->execute();
                
    } catch (PDOException $e) {
          flash(var_export($e->errorInfo, true), "danger");
            }
header("Location: cart.php");

?>








<?php
require(__DIR__ . "/../../partials/flash.php");
?>