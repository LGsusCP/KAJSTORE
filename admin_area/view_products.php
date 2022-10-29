<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<div class="row"><!--  1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard"></i> Panel de Control /  Productos

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Productos

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>Producto ID</th>
<th>Nombre</th>
<th>Imagen</th>
<th>Preco</th>
<th>Ordenado</th>
<th>Existencias</th>
<th>Fecha de Registro</th>
<th>Eliminar Producto</th>
<th>Editar Producto</th>



</tr>

</thead>

<tbody>

<?php

$i = 0;

$get_pro = "select * from products where status='product'";

$run_pro = mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){

$pro_id = $row_pro['product_id'];

$pro_title = $row_pro['product_title'];

$pro_image = $row_pro['product_img1'];

$pro_price = $row_pro['product_price'];

			$pro_stock = $row_pro['product_stock'];

$pro_date = $row_pro['date'];

$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $pro_title; ?></td>

<td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>

<td>$ <?php echo $pro_price; ?></td>

<td>
<?php

$order_sold = 0;

$select_order_items = "select * from orders_items where product_id='$pro_id'";

$run_order_items = mysqli_query($con,$select_order_items);

while($row_order_items = mysqli_fetch_array($run_order_items)){
	
$qty = $row_order_items["qty"];

$order_sold += $qty;
	
}

echo $order_sold;

?>
</td>

			<td> <?php echo $pro_stock; ?> </td>

<td><?php echo $pro_date; ?></td>

<td>

<a href="index.php?delete_product=<?php echo $pro_id; ?>">

<i class="fa fa-trash-o"> </i> Eliminar

</a>

</td>

<td>

<a href="index.php?edit_product=<?php echo $pro_id; ?>">

<i class="fa fa-pencil"> </i> Editar

</a>

</td>

</tr>

<?php } ?>


</tbody>


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>