<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<?php  

$id=get_user_id();
$counter=1;
$query="SELECT * FROM Orders WHERE user_id =$id ORDER BY id DESC LIMIT 10";
$orders=[];
$db=getDB();
$stmt=$db->prepare($query);
try {
    $stmt->execute();
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if($row){
        $orders=$row;
    }

} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}


?>

<h2> Purchase History </h2>
<table class="table">  
<?php foreach($orders as $index=>$order): ?>
    <?php 
    $price=se($order,"total_price","",false);
    $address=se($order,"address","",false);
    $payment=se($order,"payment_method","",false);
    ?>
   <?php if($index==0): ?>
    <tr>
        <td> Recent Orders </td>
        <td> Total Price </td>
        <td> Address </td>
        <td> Payment </td>
    </tr>
    <tr>
        <td><?php echo $counter; $counter++;?> </td>
        <td><?php echo "$",number_format($price/100,2) ?></td>
        <td><?php echo $address ?> </td>
        <td> <?php echo $payment ?> </td>
        <td><a style="color:red;" href="purchaseDetails.php?id=<?php se($order, "id"); ?>"> View Details</a> </td>

    </tr>
   <?php else: ?>
    <tr>
        <td><?php echo $counter; $counter++; ?> </td>
        <td><?php echo "$",number_format($price/100,2) ?></td>
        <td><?php echo $address ?> </td>
        <td> <?php echo $payment ?> </td>
        <td><a style="color:red;" href="purchaseDetails.php?id=<?php se($order, "id"); ?>"> View Details</a> </td>
    </tr>
    <?php endif; ?>
<?php endforeach; ?>

</table>



<?php
require(__DIR__ . "/../../partials/flash.php");
?>