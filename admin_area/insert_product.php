<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>



<!DOCTYPE html>

<html>

<head>

<title> Edit Products </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Panel de Control / Agregar Producto

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Agregar Producto

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="row"><!-- row Starts -->

<div class="col-md-9"><!-- col-md-9 Starts -->



<div class="form-group" ><!-- form-group Starts -->

<label class=" control-label" > Nombre del producto </label>

<input type="text" name="product_title" class="form-control" required >

</div><!-- form-group Ends -->





<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Url del producto </label>

<input type="text" name="product_url" class="form-control" required  >



<p style="font-size:15px; font-weight:bold;">

Ejemplo de URL de producto: Kit-De-Brochas

</p>
<br>
</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->


<ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->

<li class="active">

<a data-toggle="tab" href="#description"> Descripcion del producto </a>

</li>



</ul><!-- nav nav-tabs Ends -->

<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

<br>

<textarea name="product_desc" class="form-control" rows="15" id="product_desc">


</textarea>

</div><!-- description tab-pane fade in active Ends -->





</div><!-- tab-content Ends -->


</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Precio del producto </label>

<input type="text" name="product_price" class="form-control" required  >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Inventario </label>

<input type="text" name="product_stock" class="form-control" required  >

</div><!-- form-group Ends -->


</div><!-- col-md-9 Ends -->


<div class="col-md-3"><!-- col-md-3 Starts -->


<
<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Imagen de Producto 1 </label>

<input type="file" name="product_img1" class="form-control" >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Imagen de Producto 2 </label>

<input type="file" name="product_img2" class="form-control" >

<br>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class=" control-label" > Imagen de Producto 3 </label>

<input type="file" name="product_img3" class="form-control" >

<br>

</div><!-- form-group Ends -->



</div><!-- col-md-3 Ends -->


</div><!-- row Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" ></label>

<input type="submit" name="submit" value="Agregar Producto" class="btn btn-primary form-control" >


</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['submit'])){

$product_title = mysqli_real_escape_string($con, $_POST['product_title']);

$cat = mysqli_real_escape_string($con, $_POST['cat']);

$product_price = mysqli_real_escape_string($con, $_POST['product_price']);

$product_url = mysqli_real_escape_string($con, $_POST['product_url']);

$product_stock = mysqli_real_escape_string($con, $_POST['product_stock']);

$product_desc = mysqli_real_escape_string($con, $_POST['product_desc']);


$status = "product";

$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];

$allowed = array('jpeg','jpg','gif','png');

$product_img1_extension = pathinfo($product_img1, PATHINFO_EXTENSION);

$product_img2_extension = pathinfo($product_img2, PATHINFO_EXTENSION);

$product_img3_extension = pathinfo($product_img3, PATHINFO_EXTENSION);

if(empty($product_img1)){

$product_img1 = $new_p_image1;

}else{
	
if(!in_array($product_img1_extension,$allowed)){

echo "<script> alert('Imagen de producto 1 no soportada.'); </script>";

$product_img1 = "";

}else{

move_uploaded_file($temp_name1,"product_images/$product_img1");
	
}
	
}


if(empty($product_img2)){

$product_img2 = $new_p_image2;

}else{

if(!in_array($product_img2_extension,$allowed)){

echo "<script> alert('Imagen de producto 2 no soportada.'); </script>";

$product_img1 = "";

}else{

move_uploaded_file($temp_name2,"product_images/$product_img2");
	
}
	
}

if(empty($product_img3)){

$product_img3 = $new_p_image3;

}else{

if(!in_array($product_img3_extension,$allowed)){

echo "<script> alert('Imagen de producto 3 no soportada.'); </script>";

$product_img1 = "";

}else{

move_uploaded_file($temp_name3,"product_images/$product_img3");
	
}
	
}


move_uploaded_file($temp_name1,"product_images/$product_img1");
move_uploaded_file($temp_name2,"product_images/$product_img2");
move_uploaded_file($temp_name3,"product_images/$product_img3");

              
$insert_product = "insert into products(date, product_title, product_url, product_img1, product_img2, product_img3, product_price, product_desc, status, product_stock) values( NOW(),'$product_title','$product_url','$product_img1','$product_img2','$product_img3',$product_price,'$product_desc','$status',$product_stock)";
echo $insert_product;

$run_product = mysqli_query($con,$insert_product);

if($run_product){

echo "<script> alert('Producto agregado satisfactoriamente') </script>";

echo "<script>window.open('index.php?view_products','_self')</script>";

}

}

?>

<?php } ?>
