<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

$admin_email = $_SESSION['admin_email'];

$select_admin = "select * from admins where admin_email='$admin_email'";

$run_admin = mysqli_query($con,$select_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin["admin_id"];


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active">

<i class="fa fa-dashboard"></i> Panel de Control / Ordenes

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Ordenes
</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Orden No:</th>

<th>Correo del Cliente:</th>

<th>Total :</th>

<th>Status de la compra:</th>

<th>Acciones:</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$i = 0;

$select_orders = "select * from orders order by 1 desc";

$run_orders = mysqli_query($con,$select_orders);

while($row_orders = mysqli_fetch_array($run_orders)){
	
$i++;

$order_id = $row_orders["order_id"];

$customer_email = $row_orders["client_email"];

$order_total = $row_orders["order_total"];

$order_status = $row_orders["order_status"];




?>

<tr>

<td><?php echo $i; ?></td>
<td><?php echo $customer_email; ?></td>
<td><?php echo $order_total; ?></td>

<td>


<?php 

if($order_status == "pendiente"){

echo ucwords(" pago ".$order_status);
	
}else{

echo ucwords($order_status);	
	
}

?>

</td>

<td>

<div class="dropdown"><!-- dropdown Starts -->

<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">

<span class="caret"></span>

</button>

<ul class="dropdown-menu dropdown-menu-right">

<li>

<a href="index.php?view_order_id=<?php echo $order_id; ?>" target="_blank">

<i class="fa fa-pencil"></i> Ver / Editar

</a>

</li>

</ul>

</div><!-- dropdown Ends -->

</td>

</tr>

<?php 



}

?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>