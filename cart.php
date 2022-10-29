<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Carrito - Estetica</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">

    <style type="text/css">
    	/* Advantages Styles */
		.container input{
	          
          border-radius: 0px;
        }
		.box {
		background: #fff;
		margin: 0 0 30px;
		border: solid 1px #e6e6e6;
		box-sizing: border-box;
		padding:20px;
		box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);


		}

		#advantages {
		text-align:center;
		}

		#advantages .box .icon {
		position: absolute;
		font-size: 120px;
		width:100%;
		text-align:center;
		top: -20px;
		left:0;
		height:100%;
		float:left;
		color:#eeeeee;
		transition: all 0.2s ease-out;
		z-index:1;
		box-sizing: border-box;

		}

		#advantages .box h3 {
		position:relative;
		margin: 0 0 20px;
		font-weight: 300;
		text-transform: uppercase;
		z-index:2;

		}

		#advantages .box h3 a:hover {
		text-decoration:none;
		}

		#advantages .box p{
		position:relative;
		color:#555555;
		z-index:2;

		}

		.shipping-header{
			
		background:#e5e5e5;
		padding:3px;
		margin-left:-7px;
		margin-right:-7px;
			
		}

		.bold{
		color:#333333;
		font-weight:bold;
			
		}

		#order-summary table th.text-muted.lead{
			font-weight:bold;
		}

		#order-summary table th input[type=radio][name=payment_method]{
		width:20px;
		height:20px;	
		}

		.wait-loader{
		cursor:wait;
		opacity:0.5;
		}

		.order-received-list{
		color:#777;
		font-size:16px;
		padding:0px;	
		}

		.order-received-list li{
		margin-left:1.3em;
		margin-bottom:0.6em;
		}

		#order-summary table th label{
			position:relative;
			top:-5px;
			margin-left:5px;
			margin-bottom:0px;
		}

		#content #cart .table tbody tr td img {
		width: 50px;
		}

		#content #cart .table tbody tr td input {
		width: 40px;
		text-align: right;

		}

		#content #cart .table tbody tr td{
		vertical-align: middle;

		}
		#content #cart .table tfoot {
		font-size:18px;
		}

		.box .box-footer {
		background: #f7f7f7;
		margin: 30px -20px -20px;
		padding:20px;
		border-top: solid 1px #eeeeee;

		}

		.box .box-footer:before,
		.box .box-footer:after {
		content:" ";
		display: table;
		}

		.box .box-footer:after {
		clear:both;
		}

		.box .box-header {
		background:#f7f7f7;
		margin:-20px -20px 20px;
		padding:20px;
		border-bottom: solid 1px #eeeeee;

		}

		#content #order-summary table {
		margin-top: 20px;

		}
		#content #order-summary table td {
		color: #999999;
		}

		#content #order-summary table tr.total td,
		 #content #order-summary table tr.total th{
		 font-size: 18px;
		 color:#555555;
		 font-weight: 700;
		 
		 }
    </style>




</head>

<body>

    <?php include("modules/header.php"); ?>


<main class="page landing-page" >




<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->



<div class="col-md-12" id="cart" style="margin-top: 40px;">

<div class="box" ><!-- box Starts -->

<form action="cart.php" method="post" enctype="multipart-form-data" ><!-- form Starts -->

<h1> Carrito de Compra </h1>

<?php

$ip_add = getRealUserIp();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

$count = mysqli_num_rows($run_cart);

?>

<p class="text-muted" > Tienes <?php echo items(); ?> elemento(s) en tu carrito. </p>

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table" ><!-- table Starts -->

<thead><!-- thead Starts -->

<tr>

<th colspan="2" >Producto</th>

<th>Cantidad</th>

<th>Precio Unitario</th>

<th colspan="2"> Sub Total </th>


</tr>

</thead><!-- thead Ends -->

<tbody id="cart-products-tbody"><!-- tbody Starts -->

<?php

$total = 0;

$total_weight = 0;

$physical_products = array();

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_qty = $row_cart['qty'];

$only_price = $row_cart['p_price'];

$get_products = "select * from products where product_id='$pro_id'";

$run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)){

$product_title = $row_products['product_title'];

$product_img1 = $row_products['product_img1'];

$sub_total = $only_price*$pro_qty;

$_SESSION['pro_qty'] = $pro_qty;

$total += $sub_total;

?>

<tr><!-- tr Starts -->

<td>

<img src="admin_area/product_images/<?php echo $product_img1; ?>" >

</td>

<td>

<a href="#" > <?php echo $product_title; ?> </a>

</td>

<td>
<input disabled  type="text" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity form-control">
</td>

<td>

$<?php echo $only_price; ?>.00

</td>


<td>

$<?php echo $sub_total; ?>.00

</td>

</tr><!-- tr Ends -->

<?php } } ?>

</tbody><!-- tbody Ends -->

<tfoot><!-- tfoot Starts -->

<tr>

<th colspan="5"> Total </th>

<th colspan="2"> <span class="subtotal-cart-price">$<?php echo $total; ?></span>.00 </th>

</tr>

</tfoot><!-- tfoot Ends -->

</table><!-- table Ends -->



</div><!-- table-responsive Ends -->


<div class="box-footer"><!-- box-footer Starts -->


<div class="pull-right"><!-- pull-right Starts -->


<a href="checkout.php" class="btn btn-primary">

Ordenar <i class="fa fa-chevron-right"></i>

</a>

</div><!-- pull-right Ends -->

</div><!-- box-footer Ends -->

</form><!-- form Ends -->


</div><!-- box Ends -->

<?php



?>

<?php

function update_cart(){

global $con;


}

echo @$up_cart = update_cart();
?>


</div><!-- col-md-9 Ends -->



</div><!-- container Ends -->
</div><!-- content Ends -->

</main>



    <?php include("modules/footer.php"); ?>

	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>

<script>

$(document).ready(function(data){

$(document).on('keyup', '.quantity', function(){

var id = $(this).data("product_id");

var quantity = $(this).val();

var shipping_type = $("input[name=shipping_type]:checked").val();

var shipping_cost = Number($("input[name=shipping_type]:checked").data("shipping_cost"));

if(quantity  != ''){

$.ajax({

url:"change.php",

method:"POST",

data:{id:id, quantity:quantity, shipping_type: shipping_type, shipping_cost: shipping_cost},

success:function(data){
	
$(".subtotal-cart-price").html(data);

$("#cart-products-tbody").load("cart_products_tbody.php");


}

});

}

});


});

</script>

</body>
</html>