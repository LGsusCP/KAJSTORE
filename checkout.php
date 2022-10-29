<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

define("review_order", TRUE);

?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mi cuenta - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">


</head>
<?php include("modules/header.php"); ?>

<body>

 





<?php


include("review_order.php");


include("modules/footer.php");

?>

</body>
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</html>

<?php

if(isset($_POST['submit'])){

$client_first_name = mysqli_real_escape_string($con, $_POST['client_first_name']);

$client_last_name = mysqli_real_escape_string($con, $_POST['client_last_name']);

$client_email = mysqli_real_escape_string($con, $_POST['client_email']);

$client_address_1 = mysqli_real_escape_string($con, $_POST['client_address_1']);

$client_state = mysqli_real_escape_string($con, $_POST['client_state']);

$client_city = mysqli_real_escape_string($con, $_POST['client_city']);

$client_postcode = mysqli_real_escape_string($con, $_POST['client_postcode']);


              
$insert_product = "INSERT INTO orders(client_email, client_first_name, client_last_name, client_address_1, client_state, client_city, client_postcode) VALUES ($client_first_name,$client_last_name,$client_email,$client_address_1,$client_state,$client_city,$client_postcode)";
echo $insert_product;

$run_product = mysqli_query($con,$insert_product);

if($run_product){

echo "<script> alert('Orden Enviada satisfactoriamente') </script>";

echo "<script>window.open('store.php','_self')</script>";

}else{
	echo "<script> alert('Eror') </script>";

}

}

?>