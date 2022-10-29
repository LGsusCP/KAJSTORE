<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['user_profile'])){

$edit_id = $_GET['user_profile'];

$get_admin = "select * from admins where admin_id='$edit_id'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_pass = $row_admin['admin_pass'];

$admin_image = $row_admin['admin_image'];

$new_admin_image = $row_admin['admin_image'];

$admin_country = $row_admin['admin_country'];

$admin_job = $row_admin['admin_job'];

$admin_contact = $row_admin['admin_contact'];

$admin_about = $row_admin['admin_about'];



}



?>


<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Panel de Control / Editar Perfil

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Editar Perfil

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Nombre: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Correo: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">País: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_country" class="form-control" required value="<?php echo $admin_country; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Puesto: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_job" class="form-control" required value="<?php echo $admin_job; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Telefono Contact0: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="tel" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Informacion: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<textarea name="admin_about" class="form-control" rows="3"> <?php echo $admin_about; ?> </textarea>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Imagen: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="file" name="admin_image" class="form-control" >
<br>
<img src="admin_images/<?Php echo $admin_image; ?>" width="70" height="70" >

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<hr>

<h3>

Cambiar Contraseña <span class="text-muted h6"> Si usted no quiere cambiar la contraseña, deje los campos vacios. </span>

</h3>

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Nueva Contraseña: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_pass" class="form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Confirmar Contraseña: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="confirm_admin_pass" class="form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="submit" name="update" value="Actualizar Usuario" class="btn btn-primary form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$admin_name = $_POST['admin_name'];

$admin_email = $_POST['admin_email'];

$admin_country = $_POST['admin_country'];

$admin_job = $_POST['admin_job'];

$admin_contact = $_POST['admin_contact'];

$admin_about = $_POST['admin_about'];


$admin_image = $_FILES['admin_image']['name'];

$temp_admin_image = $_FILES['admin_image']['tmp_name'];

move_uploaded_file($temp_admin_image,"admin_images/$admin_image");

if(empty($admin_image)){

$admin_image = $new_admin_image;

}

$admin_pass = $_POST['admin_pass'];

$confirm_admin_pass = $_POST['confirm_admin_pass'];

if(!empty($admin_pass) or !empty($confirm_admin_pass)){

if($admin_pass !== $confirm_admin_pass){

echo "<script> alert('Su Contraseña No Coincide, por Favor Haga Otro Intento.'); </script>";	
	
}else{

$encrypted_password = password_hash($admin_pass, PASSWORD_DEFAULT);

$update_admin_pass = "update admins set admin_pass='$encrypted_password' where admin_id='$admin_id'";

$run_update_admin_pass = mysqli_query($con, $update_admin_pass);
	
}

	
}

$update_admin = "update admins set admin_name='$admin_name',admin_email='$admin_email',admin_image='$admin_image',admin_contact='$admin_contact',admin_country='$admin_country',admin_job='$admin_job',admin_about='$admin_about' where admin_id='$admin_id'";

$run_admin = mysqli_query($con,$update_admin);

if($run_admin){

echo "<script>alert('Usuario actualizado con exito, inicie sesion nuevamente.')</script>";

echo "<script>window.open('login.php','_self')</script>";

session_destroy();

}

}


?>



<?php }  ?>