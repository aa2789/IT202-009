<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<?php 
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
     se($totalOrder,"total_price","",false);
    
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}
?>
<h2> Total Order </h2>
<table class="table">  
<?php foreach($totalOrder as $col=>$val): ?>
<tr> 
    <?php if($col=="total_price"): ?>
         <td> <?php echo $col ?> </td>
         <td> <?php echo "$",number_format($val/100,2) ?> </td>
         <?php else: ?>
         <td> <?php echo $col ?> </td>
         <td> <?php echo $val ?> </td>
         <?php endif; ?>

</tr>
<?php endforeach; ?>


</table>

<?php
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
<h2> Items Purchased </h2>
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


<h2 style="text-align:center"> Thank You For Shopping With Us ! </h2>





<?php
require(__DIR__ . "/../../partials/flash.php");
?>