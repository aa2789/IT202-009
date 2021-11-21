<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>

<?php 
$id=get_user_id();
$products=[];
$query="SELECT Products.name, Products.stock, Products.id, Cart.unit_cost,Cart.desired_quantity 
FROM Cart JOIN Products ON Products.id=Cart.product_id where Cart.user_id=$id";
$ignore=["stock","id"];
$db=getDB();
$stmt=$db->prepare($query);
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $products = $results;
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>

 
<?php $subtotal=0;?>
<?php if(count($products)==0): ?>
      <h2> No products Added to Cart</h2>
<?php else:?>
 <div class="cart content-wrapper">
    <h1 style="text-align:center;">Shopping Cart</h1>
    <form  method="post">
        <table class="table">
            <tbody>   
            <?php foreach($products as $index=>$arr): ?>  
            <?php if($index==0) :?>
                <thead>
                    <tr>
                    <?php foreach($arr as $col=>$val): ?>
                        <?php if(in_array($col,$ignore)){
                            continue;
                        }
                        ?>
                            
                        <td><b><?php se($col) ?></b></td>
                    <?php endforeach;?>
                    <td><b>Subtotal</b></td>
                    </tr>

                </thead>
                <tr>
                    <?php foreach($arr as $col=>$val): ?>
                        <?php if(in_array($col,$ignore))continue; ?>
                        <?php if($col=="desired_quantity"): ?>
                              <td>
                                  <input type="number" name="desired_quantity[<?php $arr["name"] ?>]" value= <?php se($arr,$col);?> min=0 max=<?php se($arr,"stock"); ?> required>
                              </td>
                        <?php elseif($col=="name"): ?>
                            <td><a style="color:red;" href="details.php?id=<?php se($arr, "id"); ?>"><?php se($arr,$col); ?></a> </td>
                        <?php elseif($col=="unit_cost"): ?>
                            <td><?php echo "$", number_format($val/100,2); ?></td>
                        <?php else: ?>
                        <td><?php se($arr,$col) ?></td>
                        <?php endif; ?>
                    <?php endforeach;?>
                    <td><?php $x=number_format((se($arr,"unit_cost","",false)*se($arr,"desired_quantity","",false))/100,2); $subtotal+=$x; echo "$", $x;?></td>


                </tr>
            <?php else: ?>
                <tr>
                    <?php foreach($arr as $col=>$val): ?>  
                        <?php if(in_array($col,$ignore))continue;?>
                        <?php if($col=="desired_quantity"):?>
                            <td>
                                <input type="number" name="desired_quantitiy" value= <?php se($arr,$col);?> min=0 max=<?php se($arr,"stock"); ?> required>
                             </td>  
                        <?php elseif($col=="name"):?>
                            <td><a style="color:red;" href="details.php?id=<?php se($arr, "id"); ?>"><?php se($arr,$col); ?> </a> </td>
                        <?php elseif($col=="unit_cost"): ?>  
                            <td><?php echo "$", number_format($val/100,2); ?></td>
                        <?php else:?>         
                        <td><?php se($arr,$col);?> </td>
                        <?php endif;?>
                    <?php endforeach; ?>
                    <td><?php $x=number_format((se($arr,"unit_cost","",false)*se($arr,"desired_quantity","",false))/100,2); $subtotal+=$x; echo "$", $x;?></td>
                </tr>
        
            <?php endif;?>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <span class="text"> <b>Total Cost: </b></span>
            <span class="price">&dollar;<?php echo number_format($subtotal,2); ?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>
<?php endif;?>















<?php
require(__DIR__ . "/../../partials/flash.php");
?>