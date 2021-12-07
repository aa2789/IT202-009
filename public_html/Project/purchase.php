<?php
require(__DIR__ . "/../../partials/nav.php");
?>



<?php  /* 
    <input id="payment" type="text" name="payment" required><br>
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
    <input type="submit" value="Add Item" name="submit"/>  */ ?>
<h1> Checkout Form </h1>
<form method="POST">  
    <label for="payment">Payment Method: </label>
    <select id="payment" name="payment">
    <option value="cash" selected>Cash</option>
    <option value="visa">Visa</option>
    <option value="mastercard">Mastercard</option>
    <option value="amex">Amex</option>
    </select>
    <br>
    <label for="amount"> Enter Amount to Pay </label>
    <input id="amount" min="0" type="number" name="amount" ><br>
    <label for="firstname"> First Name</label>
    <input id="firstname" type="text" name="firstname" required><br>
    <label for="lastname"> Last Name</label>
    <input id="lastname" type="text" name="lastname" required><br>
    <label for="address">Address</label>
    <input id="address" type="text" name="address" required><br>
    <label for="apartment">Apartment,suite,etc </label>
    <input id="apartment" type="text" name="apartment"><br>
    <label for="city">City</label>
    <input id="city" type="text" name="city" required><br>
    <label for="state">State</label>
    <input id="state" type="text" name="state" required><br>
    <label for="country">Country</label>
    <input id="country" type="text" name="country" required><br>
    <label for="zip">Zip Code</label>
    <input id="zip" type="text" name="zip" required><br>
<input type="submit" value="Submit " name="submit"/>
</form>
<?php 
if(isset($_POST["submit"])){
 $id=get_user_id();
$products=[];
$query="SELECT Products.name, Products.stock, Products.id, Cart.unit_cost,Cart.desired_quantity 
FROM Cart JOIN Products ON Products.id=Cart.product_id where Cart.user_id=$id";

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
$subtotal=0;
foreach($products as $arr){
    $x=se($arr,"unit_cost","",false);
    $y=se($arr,"desired_quantity","",false);
    $subtotal+=($x*$y);
}
$pay=se($_POST,"amount","",false)*100;
$address=se($_POST,"address","",false);
$payment=se($_POST,"payment","",false);
$flag=false;


if($pay>=$subtotal){
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO Orders (user_id, total_price, address, payment_method) VALUES(:user_id, :total_price, :address, :payment_method)");
    try {
        $stmt->execute([":user_id" => $id, ":total_price" => $pay, ":address" => $address,":payment_method"=>$payment]);
        $flag=true;
    } catch (Exception $e) {
        flash("There was a problem adding the order","danger");
        flash("<pre>" . var_export($e, true) . "</pre>");
        
    }
    if($flag==true){
        $flag2=false;
        $row=[];
        $query="SELECT id FROM Orders ORDER BY id DESC LIMIT 1";
        $db=getDB();
        $stmt=$db->prepare($query);
        try {
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $orderID=se($row,"id","",false);
            $flag2=true;
        } catch (PDOException $e) {
            
            flash(var_export($e->errorInfo, true), "danger");
        }

    }
    if($flag2==true){
        $flag3=false;
        foreach($products as $arr){
            $productID=se($arr,"id","",false);
            $quantity=se($arr,"desired_quantity","",false);
            $unitPrice=se($arr,"unit_cost","",false);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO OrderItems (order_id, product_id, quantity, unit_price) VALUES(:order_id, :product_id, :quantity, :unit_price)");
        try {
        $stmt->execute([":order_id" => $orderID, ":product_id" => $productID, ":quantity" => $quantity,":unit_price"=>$unitPrice]);
        $flag3=true;
        } catch (Exception $e) {
        flash("There was a problem adding the order","danger");
        flash("<pre>" . var_export($e, true) . "</pre>");
       
    }
        }


    }
    if($flag3==true){
        $flag4=false;
        foreach($products as $arr){
            $productID=se($arr,"id","",false);
            $stock=se($arr,"stock","",false);
            $desiredQuantity=se($arr,"desired_quantity","",false);
            $newStock=$stock-$desiredQuantity;
            $query="UPDATE Products SET stock =$newStock where id=$productID";
            $db=getDB();
            $stmt=$db->prepare($query);
            try {
                $stmt->execute();
                $flag4=true;
                } catch (Exception $e) {
                flash("There was a problem updating the product DB","danger");
                flash("<pre>" . var_export($e, true) . "</pre>");
             
            }

        }
    }
    if($flag4==true){
        $flag5=false;
        $query="DELETE from Cart where user_id=$id";
        $db=getDB();
        $stmt=$db->prepare($query);
        try{
            $stmt->execute();
            $flag5=true;
        }
        catch (Exception $e) {
            flash("There was a problem clearing the cart","danger");
            flash("<pre>" . var_export($e, true) . "</pre>");
         
        }

    }
    if($flag5==true){
        header("Location: orderConfirmation.php");

    }


}




}
?>




<?php
require(__DIR__ . "/../../partials/flash.php");
?>