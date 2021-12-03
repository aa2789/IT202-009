<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<?php echo "order successful";
$id=get_user_id();

$query="SELECT id FROM Orders ORDER BY id DESC LIMIT 1";
$db=getDB();
$stmt=$db->prepare($query);
try {
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $orderID=se($row,"id","",false);
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}
$query="SELECT total_price,address,payment_method FROM Orders WHERE id=$orderID";
$db=getDB();
$stmt=$db->prepare($query);
try {
    $stmt->execute();
    $totalOrder=$stmt->fetch(PDO::FETCH_ASSOC);
     se($totalOrder,"total_price");
    
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}
?>
<h2> Total Order </h2>
<table>  
<?php foreach($totalOrder as $col=>$val): ?>
<tr> 
    <td> <?php echo $col ?> </td>
    <td> <?php echo $val ?> </td>

</tr>
<?php endforeach; ?>


</table>








<?php
require(__DIR__ . "/../../partials/flash.php");
?>