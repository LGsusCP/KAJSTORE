<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




$admin_session = $_SESSION['admin_email'];

$get_admin = "select * from admins  where admin_email='$admin_session'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];


$get_products = "select * from products";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);


?>


<!DOCTYPE html>
<html>

<head>

<title>Admin Panel</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >

<script src="js/jquery.min.js"></script>

<script src="js/jquery-ui.min.js"></script>
<style type="text/css">
	body{
		color: #343D46;
	}
	.panel-body table{
		color: #343D46;
	}
	.panel-body label{
		color: #343D46;
	}
	.form-group input{
          
          border-radius: 0px;
        }



	.abs-center{
		justify-content: center;
		text-align: center;
		align-items: center;
		color: #fff;
	}
	.rounded-circle {
	  border-radius: 50% !important;
	}

	.panel {
	color:  #E1E1E1;
	
	
	
	}
	.tile:hover .tile-text span{ color: #3F51B5; }
	.tile:hover .tile-icon{
		color: rgba(0,191,238,.3);
		transform: scale(1.5) translate(-10px, -10px);
	}
	.tile-text{
		display: block;
		height: 140px;
		width: 100%;
		box-sizing: border-box;
	}
	.tile-text span,
	.tile-icon{
		position: absolute;
		color: rgba(0,0,0,.3);
		transition: all .3s ease-in-out;
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	.tile-text span{
		top: 50%;
		left: 10px;
		transform: translateY(-50%);
		display: block;
		font-size: 27px;
		z-index: 2;
	}
	.tile-icon{
		bottom: 9px;
		right: 4px;
		font-size: 90px;
		line-height: 67px;
		z-index: 1;
	}

</style>
</style>

</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->






<?php

if(isset($_GET['dashboard'])){

include("dashboard.php");

}

if(isset($_GET['insert_product'])){

include("insert_product.php");

}

if(isset($_GET['view_products'])){

include("view_products.php");

}

if(isset($_GET['delete_product'])){

include("delete_product.php");

}

if(isset($_GET['edit_product'])){

include("edit_product.php");

}


if(isset($_GET['edit_slide'])){

include("edit_slide.php");

}


if(isset($_GET['view_customers'])){

include("view_customers.php");

}

if(isset($_GET['customer_delete'])){

include("customer_delete.php");

}


if(isset($_GET['view_orders'])){

include("view_orders.php");

}

if(isset($_GET['order_delete'])){

include("order_delete.php");

}

if(isset($_GET['view_order_id'])){

include("view_order_id.php");

}

if(isset($_GET['view_payments'])){

include("view_payments.php");

}

if(isset($_GET['payment_delete'])){

include("payment_delete.php");

}

if(isset($_GET['insert_user'])){

include("insert_user.php");

}

if(isset($_GET['view_users'])){

include("view_users.php");

}


if(isset($_GET['user_delete'])){

include("user_delete.php");

}



if(isset($_GET['user_profile'])){

include("user_profile.php");

}



if(isset($_GET['insert_term'])){

include("insert_term.php");

}

if(isset($_GET['view_terms'])){

include("view_terms.php");

}

if(isset($_GET['delete_term'])){

include("delete_term.php");

}

if(isset($_GET['edit_term'])){

include("edit_term.php");

}


if(isset($_GET['insert_coupon'])){

include("insert_coupon.php");

}

if(isset($_GET['view_coupons'])){

include("view_coupons.php");

}

if(isset($_GET['delete_coupon'])){

include("delete_coupon.php");

}


if(isset($_GET['edit_coupon'])){

include("edit_coupon.php");

}

if(isset($_GET['view_events'])){

include("view_events.php");

}


if(isset($_GET['edit_contact_us'])){

include("edit_contact_us.php");

}

/*
if(isset($_GET['insert_enquiry'])){

include("insert_enquiry.php");

}


if(isset($_GET['view_enquiry'])){

include("view_enquiry.php");

}

if(isset($_GET['delete_enquiry'])){

include("delete_enquiry.php");

}

if(isset($_GET['edit_enquiry'])){

include("edit_enquiry.php");

}
*/

if(isset($_GET['edit_about_us'])){

include("edit_about_us.php");

}


if(isset($_GET['insert_service'])){

include("insert_service.php");

}

if(isset($_GET['view_services'])){

include("view_services.php");

}

if(isset($_GET['delete_service'])){

include("delete_service.php");

}

if(isset($_GET['edit_service'])){

include("edit_service.php");

}


if(isset($_GET['insert_shipping_type'])){

include("insert_shipping_type.php");

}

if(isset($_GET['view_shipping_types'])){

include("view_shipping_types.php");

}

if(isset($_GET['edit_shipping_type'])){

include("edit_shipping_type.php");

}

if(isset($_GET['delete_shipping_type'])){

include("delete_shipping_type.php");

}


?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/bootstrap.min.js"></script>


</body>


</html>


<?php } ?>