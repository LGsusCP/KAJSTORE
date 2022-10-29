<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

if(isset($_GET["view_order_id"])){
	
$order_id = $_GET["view_order_id"];

$select_order = "select * from orders where order_id='$order_id'";

$run_order = mysqli_query($con,$select_order);

$row_order = mysqli_fetch_array($run_order);

$client_email = $row_order['client_email'];

$client_first_name = $row_order['client_first_name'];

$order_total = $row_order["order_total"];

$order_status = $row_order["order_status"];


$order_date = $row_order["order_date"];


	
}

?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active lead" style="margin-bottom:0px;">

Usted Mira Detalles Completos de la Orden <mark>#<?php echo $order_id; ?></mark> se realizo <mark><?php echo $order_date; ?></mark> Y tiene

<mark>

<?php 

if($order_status == "pending"){

echo (" Pago Pendiente");
	
}else{

echo ("Pendiente");	
	
}

?>

</mark>

.

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-md-8"><!-- col-md-8 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Orden #<?php echo $order_id; ?> 

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body" id="order-summary"><!-- panel-body Starts -->

<h3> Detalles de Orden </h3>

<table class="table"><!-- table Starts -->

<thead>

<tr>

<th class="text-muted lead"> Producto: </th>

<th class="text-muted lead"> Total: </th>

</tr>

</thead>

<tbody>

<?php

$items_subtotal = 0;

$physical_products = array();

$select_order_items = "select * from orders_items where order_id='$order_id'";

$run_order_items = mysqli_query($con,$select_order_items);

while($row_order_items = mysqli_fetch_array($run_order_items)){
	
$product_id = $row_order_items["product_id"];

$product_qty = $row_order_items["qty"];

$product_price = $row_order_items["price"];


$sub_total = $product_price * $product_qty;

$select_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$select_product);

$row_product = mysqli_fetch_array($run_product);

$product_title = $row_product["product_title"];




$items_subtotal += $sub_total;

?>

<tr>

<td>

<a href="#" class="bold"> <?php echo $product_title; ?> </a>

<i class="fa fa-times" title="Product Qty"></i> <?php echo $product_qty; ?> 

</td>

<th>$<?php echo $sub_total; ?> </th>

</tr>


<?php } ?>

<tr>

<th class="text-muted"> Subtotal: </th>

<th> $<?php echo $items_subtotal; ?>  </th>

</tr>

<?php if(count($physical_products) > 0){ ?>

<tr>

<th class="text-muted"> Shipping: </th>

<th>

<span class="text-muted">

<i class="fa fa-truck"></i> <?php echo $shipping_type; ?>:

</span>

$<?php echo $shipping_cost; ?>

</th>

</tr>

<?php } ?>



<tr class="total">

<td> Total: </td>

<td>$<?php echo $order_total; ?></td>

</tr>

</tbody>

</table><!-- table Ends -->

<h3> Detalles del cliente </h3>

<table class="table"><!-- table Starts -->

<tbody>

<tr>

<th class="text-muted"> Nombre: </th>

<th> <?php echo $client_first_name; ?> </th>

</tr>

<tr>

<th class="text-muted"> Correo: </th>

<th> <?php echo $client_email; ?> </th>

</tr>

</tbody>

</table><!-- table Ends -->

<div class="row"><!-- row Starts -->


</div><!-- row Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-md-8 Ends -->

<div class="col-md-4"><!-- col-md-4 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Acciones sobre la orden

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<h4 class="text-success">

El estatus de la orden, actualmente es : 

<?php 

if($order_status == "pending"){

echo ( " Pago pendiente");
	
}else{

echo ("pendiente");	
	
}

?>

</h4>

<form method="post"><!-- form Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Cambiar Estatus de la orden </label>

<select name="order_status" class="form-control" required>

<option value="pendiente"> Pago Pendiente </option>

<option value="procesando"> Procesando </option>

<option value="en Espera"> En espera </option>

<option value="cancelado"> Cancelado </option>

<option value="rembolzado"> Reembolzo </option>

<option value="completo"> Completo </option>

</select>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<input type="submit" name="update_order_status" value="Actualizar" class="btn btn-success form-control" >

</div><!-- form-group Ends -->

</form><!-- form Ends -->

<?php

if(isset($_POST["update_order_status"])){
	
$order_status = $_POST["order_status"];

$update_order_status = "update orders set order_status='$order_status' where order_id='$order_id'";

$run_update_order_status = mysqli_query($con,$update_order_status);

if($run_update_order_status){

echo "

<script>

alert('El estado de la orden se actualizo.');

window.open('index.php?view_order_id=$order_id','_self');

</script>

";	
	
}
	
}

?>

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-md-4 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>