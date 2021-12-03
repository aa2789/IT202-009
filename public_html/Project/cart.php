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

 
<?php $subtotal=0;
 $productToIdMap=[];

?>
<?php if(count($products)==0): ?>
      <h2> No products Added to Cart</h2>
<?php else:?>
 <div class="cart content-wrapper">
    <h1 style="text-align:center;">Shopping Cart</h1>
    <form  method="post">
        <table class="table">
            <tbody>   
            <?php foreach($products as $index=>$arr): ?> 
            <?php $productToIdMap[se($arr,"name","",false)]=se($arr,"id","",false); ?> 
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
                                  <input type="number" name="desired_quantity[<?php se($arr,"name"); ?>]" value= <?php se($arr,$col);?> min=0 max=<?php se($arr,"stock"); ?> required>
                              </td>
                        <?php elseif($col=="name"): ?>
                            <td><a style="color:red;" href="details.php?id=<?php se($arr, "id"); ?>"><?php se($arr,$col); ?></a> </td>
                        <?php elseif($col=="unit_cost"): ?>
                            <td><?php echo "$", number_format($val/100,2); ?></td>
                        <?php else: ?>
                        <td><?php se($arr,$col) ?></td>
                        <?php endif; ?>
                    <?php endforeach;?>
                   
                    <td><?php
                    $x=se($arr,"unit_cost","",false);
                    
                    $y=se($arr,"desired_quantity","",false);
                    
                    $z=($x*$y)/100;
                    $subtotal+=$z;
                    echo "$",number_format($z,2);
                   ?>
                     </td>
                    <?php $location="removeFromCart.php?"; $location.="product_id=";$location.=se($arr,"id","",false); ?>
                    <td><a href="<?php echo $location?> " class="button">Remove item</a> </td>


                </tr>
            <?php else: ?>
                <tr>
                    <?php foreach($arr as $col=>$val): ?>  
                        <?php if(in_array($col,$ignore))continue;?>
                        <?php if($col=="desired_quantity"):?>
                            <td>
                                <input type="number" name="desired_quantity[<?php se($arr, "name"); ?>]" value= <?php se($arr,$col);?> min=0 max=<?php se($arr,"stock"); ?> required>
                             </td>  
                        <?php elseif($col=="name"):?>
                            <td><a style="color:red;" href="details.php?id=<?php se($arr, "id"); ?>"><?php se($arr,$col); ?> </a> </td>
                        <?php elseif($col=="unit_cost"): ?>  
                            <td><?php echo "$", number_format($val/100,2); ?></td>
                        <?php else:?>         
                        <td><?php se($arr,$col);?> </td>
                        <?php endif;?>
                    <?php endforeach; ?>
                    <td><?php
                    
                    $x=se($arr,"unit_cost","",false);
                    $y=se($arr,"desired_quantity","",false);
                    $z=($x*$y)/100;
                    $subtotal+=$z;
                    echo "$",number_format($z,2);
                    ?>
                     </td>
                    <?php $location="removeFromCart.php?"; $location.="product_id=";$location.=se($arr,"id","",false); ?>
                    <td><a href="<?php echo $location?> " class="button">Remove item</a> </td>
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
            <?php $loc="purchase.php?id=$id";?>
            <td><a href="<?php echo $loc?> " class="button">Purchase Items</a> </td>
            
        </div>
    </form>
    <?php $location="removeFromCart.php?product_id=all";?>
   <td><a href="<?php echo $location?> " class="button">Remove All Items</a> </td>
</div>
<?php endif;?>

<?php 
$flag=true;
if(isset($_POST["update"])){
    $id=get_user_id();
    foreach($products as $product){
        $query="";
        $productID=se($product,"id","",false);
        $quantity=se($product,"desired_quantity","",false);
        $name=se($product,"name","",false);
        $desiredQuantity=se($_POST["desired_quantity"],$name,"",false);
        if($quantity!=$desiredQuantity){
            if($desiredQuantity==0){
                $query="DELETE FROM Cart WHERE user_id=$id AND product_id=$productID";
            }
            else{
                $query="UPDATE Cart SET desired_quantity = $desiredQuantity WHERE user_id=$id AND product_id =$productID ";
            }
            $db=getDB();
            $stmt=$db->prepare($query);
            try {
                $stmt->execute();
                
            } catch (PDOException $e) {
                $flag=false;
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
        
    }
    if($flag==true){
        flash("Updated Successfully","success");
    }
}                

?>

<?php


?>












<?php
require(__DIR__ . "/../../partials/flash.php");
?>