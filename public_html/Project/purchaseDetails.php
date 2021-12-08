<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<?php
$orderID=se($_GET,"id","",false);
$query="SELECT Products.name,OrderItems.quantity,OrderItems.unit_price FROM OrderItems JOIN Products ON OrderItems.product_id=Products.id WHERE order_id=$orderID";
$db=getDB();
$stmt=$db->prepare($query);
try {
    $stmt->execute();
    $eachOrder=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>
<h2 style="text-align:center"> Items Purchased </h2>
<table class="table">
<?php foreach($eachOrder as $index=>$arr): ?>
    <?php if($index==0): ?>
        <tr>
            <td> Name</td>
            <td> Quantity </td>
            <td> Price </td>
        </tr>
        <tr>
            <td><?php se($arr,"name","");   ?></td>
            <td><?php se($arr,"quantity",);   ?></td>
            <td><?php $x=se($arr,"unit_price","",false); echo "$", number_format($x/100,2);   ?></td>
        </tr>
         
    <?php else: ?>
        <tr>
            <td><?php se($arr,"name","");   ?></td>
            <td><?php se($arr,"quantity",);   ?></td>
            <td><?php $x=se($arr,"unit_price","",false); echo "$", number_format($x/100,2);   ?></td>
        </tr>

    <?php endif; ?>


<?php endforeach; ?>



</table>






<?php
require(__DIR__ . "/../../partials/flash.php");
?>