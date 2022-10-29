<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/login.css" >

</head>

<body>

<div class="container" ><!-- container Starts -->

<form class="form-login" action="" method="post" ><!-- form-login Starts -->

<h2 class="form-login-heading" >Acesso a panel de Administrador</h2>

<input type="text" class="form-control" name="admin_email" placeholder="Correo" required >

<input type="password" class="form-control" name="admin_pass" placeholder="Contraseña" required >

<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" >

Entrar

</button>

<h4 class="forgot-password">

<a href="forgot_password.php">

Recordar Contraseña

</a>

</h4>

</form><!-- form-login Ends -->

</div><!-- container Ends -->



</body>

</html>

<?php

if(isset($_POST['admin_login'])){

$admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);

$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

$get_admin = "select * from admins where admin_email='$admin_email'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$hash_password = $row_admin['admin_pass'];

$decrypt_password = password_verify($admin_pass, $hash_password);

if($decrypt_password != 0){

$_SESSION['admin_email']=$admin_email;

echo "<script>alert('Bienvenido')</script>";

echo "<script>window.open('index.php?view_orders','_self')</script>";	
	
}else{
	
echo "<script>alert('Datos Erroneos')</script>";	
	
}






}

?>