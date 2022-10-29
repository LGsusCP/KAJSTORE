<?php

if(!defined("review_order")){
	
echo "<script> window.open('checkout.php','_self'); </script>";	
	
}

?>
<section class="clean-block clean-info dark" >
	<div class="container" style="padding-top: 120px;">
<div class="row container"><!-- row Starts -->

<?php

$ip_add = getRealUserIp();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

$count = mysqli_num_rows($run_cart);

if($count == 0){

?>

<div class="col-md-12"><!-- col-md-12 Starts -->

<div class="box text-center"><!-- box text-center Starts -->

<p class="lead"> Carrito de Compras no disponible. </p>

<a href="shop.php" class="btn btn-primary btn-lg"> Ir a la tienda </a>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
Procesos no disponible, su carrito es vacio, <a href="shop.php" class="alert-link"> ir a la tienda </a>
<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>
</div>

</div><!-- box text-center Ends -->

</div><!-- col-md-12 Ends -->

<?php }else{ ?>

<div class="col-md-8"><!-- col-md-8 Starts -->

<div class="box"><!-- box Starts -->
<div class="alert alert-primary alert-dismissible fade show" role="alert">
Por favor comprueve sus datos de envio.
<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>
</div>

<?php

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);



?>


<form method="post" enctype="multipart/form-data" id="shipping-billing-details-form"><!-- shipping-billing-details-form Starts -->

<h2> Detalles de envio </h2>

<div class="row"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Nombre: </label>

<input type="text" name="client_first_name" class="form-control" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Apellidos: </label>

<input type="text" name="client_last_name" class="form-control"  required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

</div><!-- row Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Correo: </label>

<input type="email" name="client_email" class="form-control">

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Direccion 1: </label>

<input type="text" name="client_address_1" class="form-control"  required>

</div><!-- form-group Ends -->


<div class="row"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Estado /condado:</label>

<input type="text" name="client_state" class="form-control"  required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Ciudad /pueblo: </label>

<input type="text" name="client_city" class="form-control"  required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

</div><!-- row Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Codigo postal / Zip</label>

<input type="text" name="client_postcode" class="form-control" required>

</div><!-- form-group Ends -->


<input type="submit" name="submit" id="offline-submit" class="btn btn-success btn-lg" style="border-radius:0px;">

</form><!-- shipping-client-details-form Ends -->

</div><!-- box Ends -->

</div><!-- col-md-8 Starts -->

<div class="col-md-4"><!-- col-md-4 Starts -->

<div class="box" id="order-summary"><!-- box Starts -->

<div class="box-header"><!-- box-header Starts -->

<h3> Resumen del pedido </h3>

</div><!-- box-header Ends -->

<table class="table"><!-- table Starts -->

<thead>

<tr>

<th class="text-muted lead"> Productos: </th>

<th class="text-muted lead"> Total: </th>

</tr>

</thead>

<tbody id="checkout-tbody-reload"><!-- tbody Starts -->

<?php

$total = 0;


$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$product_id = $row_cart['p_id'];

$product_price = $row_cart['p_price'];

$product_qty = $row_cart['qty'];


$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$row_product = mysqli_fetch_array($run_product);

$product_title = $row_product['product_title'];

$sub_total = $product_price * $product_qty;

$total += $sub_total;

?>

<tr>

<td>

<a href="#" class="bold"> <?php echo $product_title; ?> </a>

<i class="fa fa-times" title="Product Qty"></i> <?php echo $product_qty; ?> 


</td>

<th>$<?php echo $sub_total; ?> </th>

</tr>

<?php } ?>

<tr class="total">

<td>Total</td>

<th class="total-cart-price">$<?php echo $total; ?>.00</th>


</tr>


<td id="payment-method-forms-td" colspan="2"><!-- payment-method-forms-td Starts -->

<form id="offline-form"  method="post" enctype="multipart/form-data"><!-- offline-form Starts -->



</form><!-- offline-form Ends -->


<?php

$i = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$product_id = $row_cart['p_id'];

$product_qty = $row_cart['qty'];

$product_price = $row_cart['p_price'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$row_product = mysqli_fetch_array($run_product);

$product_title = $row_product["product_title"];

$i++;

?>

<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>">

<input type="hidden" name="item_nubmer_<?php echo $i; ?>" value="<?php echo $i; ?>">

<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $product_price; ?>">

<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $product_qty; ?>">

<?php
} ?>



</td><!-- payment-method-forms-td Ends -->

</tr>

</tbody><!-- tbody Ends -->

</table><!-- table Ends -->

</div><!-- box Ends -->

</div><!-- col-md-4 Starts -->

<?php } ?>

</div><!-- row Ends -->

<script>



</script>
</div>
</section>

<?php

if(isset($_POST['submit'])){

$client_first_name = mysqli_real_escape_string($con, $_POST['client_first_name']);

$client_last_name = mysqli_real_escape_string($con, $_POST['client_last_name']);

$client_email = mysqli_real_escape_string($con, $_POST['client_email']);

$client_address_1 = mysqli_real_escape_string($con, $_POST['client_address_1']);

$client_state = mysqli_real_escape_string($con, $_POST['client_state']);

$client_city = mysqli_real_escape_string($con, $_POST['client_city']);

$client_postcode = mysqli_real_escape_string($con, $_POST['client_postcode']);


              
$insert_order = "INSERT INTO orders(client_email, client_first_name, client_last_name, client_address_1, client_state, client_city, client_postcode, order_total, order_status,order_date) VALUES ('$client_email','$client_first_name','$client_last_name','$client_address_1','$client_state','$client_city','$client_postcode',$total,'pendiente',NOW())";
echo $insert_order;

$run_order = mysqli_query($con,$insert_order);

$select_order_id = "SELECT  max(order_id)  FROM orders WHERE client_email = '$client_email' AND client_first_name = '$client_first_name' AND client_last_name = '$client_last_name' AND client_address_1 = '$client_address_1' AND client_state = '$client_state' AND client_city = '$client_city' AND client_postcode = '$client_postcode'";
echo $select_order_id;
$row_order_id = mysqli_query($con,$select_order_id);
$row_order = mysqli_fetch_array($row_order_id);
$order_id = $row_order['max(order_id)'];


$i = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$product_id = $row_cart['p_id'];

$product_qty = $row_cart['qty'];

$product_price = $row_cart['p_price'];

$insert_order = "INSERT INTO orders_items(order_id, product_id, price, qty) VALUES ('$order_id','$product_id','$product_price','$product_qty')";

$run_order = mysqli_query($con,$insert_order);


$i++;


} 

if($run_order){

session_destroy();

$delete_cart = "DELETE FROM cart where ip_add='$ip_add'";

$run_delete_cart = mysqli_query($con,$delete_cart);
echo "<script> alert('Orden Enviada satisfactoriamente') </script>";

echo "<script>window.open('shop.php','_self')</script>";

}else{
	echo "<script> alert('Eror') </script>";

}

}



?>