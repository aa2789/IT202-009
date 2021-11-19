<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<?php 
$query="SELECT name,description,category,stock,unit_price FROM Products WHERE id=:id";
$params=[":id"=>$_GET["id"]];
$db=getDB();
$stmt=$db->prepare($query);
$column=[];
try{
    $stmt->execute($params);
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
    if($results){
        $column=$results;
    }
    else{
        flash("No Products Found","warning");
    }
}
catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");

}

?>
<h1>Product Information for <?php se($column,"name")?></h1>
<?php foreach($column as $index=>$value) : ?>
      <tr>
          <td><b><?php echo $index ,":" ?></b></td>
          <?php if($index=="unit_price") : ?>
                <?php $priceConversion = $value/100;?>
                <td> <?php echo "$", number_format($priceConversion,2) ?></td>
          <?php else :?>
          <td><?php echo $value ?></td>  
          <?php endif;?>
      </tr>
      <br>

<?php endforeach;  ?>


<?php
require(__DIR__ . "/../../partials/flash.php");
?>