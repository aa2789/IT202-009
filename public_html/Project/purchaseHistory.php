<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<?php  
$id=get_user_id();
$results_per_page=10;
$ratings=[];
$query="SELECT * FROM Orders WHERE user_id=$id";
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

$counter=1;
$query="SELECT * FROM Orders WHERE user_id =$id";
if(isset($_POST["filter"])){
    if(isset($_POST["price"])&&!empty($_POST["price"])){

        $query.=" ORDER BY total_price ASC";
    }
    else if(isset($_POST["datePurchased"])&&!empty($_POST["datePurchased"])){
        $query.=" ORDER BY created ASC";

    }
    else if(isset($_POST["startRange"])&&!empty($_POST["startRange"])&&isset($_POST["endRange"])&&!empty($_POST["endRange"])){
         $start=$_POST["startRange"];
         $end=$_POST["endRange"];
         
         $query.=" AND created BETWEEN '$start' AND '$end' ";
    }
}
$query.=" LIMIT $this_page_first_result,$results_per_page";
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
        <td>  Orders </td>
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
<h4> Select Page </h4>
<?php
 for($page=1;$page<=$number_of_pages;$page++){
    
    $loc="purchaseHistory.php?page=$page";
    echo "<a href=$loc>$page </a>";
}
?>

<h2>Filter Purchase History</h2>
<form method="POST">
    <label for="price"><b>Sort by Total Cost</b></label>
    <input id="price" type="checkbox" name="price" value="yes">
    <br>
    <label for="datePurchased"><b>Sort by Date Purchased</b></label>
    <input id="datePurchased" type="checkbox" name="datePurchased" value="yes">
    <br>
    <label for="start"><b> Date Start Range:</b></label>
    <input type="date" id="start" name="startRange">
    <br>
    <label for="end"><b> Date End Range:</b></label>
    <input type="date" id="end" name="endRange">
    <br>
    <input type="submit" name="filter" value="filter" />
    <br>
   
</form>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>