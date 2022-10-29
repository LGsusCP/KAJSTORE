<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_product'])){

$edit_id = $_GET['edit_product'];

$get_p = "select * from products where product_id='$edit_id'";

$run_edit = mysqli_query($con,$get_p);

$row_edit = mysqli_fetch_array($run_edit);

$p_id = $row_edit['product_id'];

$p_title = $row_edit['product_title'];

$p_image1 = $row_edit['product_img1'];

$p_image2 = $row_edit['product_img2'];

$p_image3 = $row_edit['product_img3'];

$new_p_image1 = $row_edit['product_img1'];

$new_p_image2 = $row_edit['product_img2'];

$new_p_image3 = $row_edit['product_img3'];

$p_price = $row_edit['product_price'];

$p_desc = $row_edit['product_desc'];

              

$p_url = $row_edit['product_url'];


$p_stock = $row_edit['product_stock'];

}

?>


<!DOCTYPE html>

<html>

<head>

<title> Editar Productos </title>




</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Panel de Control / Editar Producto

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Editar Producto

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="row"><!-- row Starts -->

<div class="col-md-9"><!-- col-md-9 Starts -->



<div class="form-group" ><!-- form-group Starts -->

<label class=" control-label" > Nombre del producto </label>

<input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">

</div><!-- form-group Ends -->





<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Url del producto </label>

<input type="text" name="product_url" class="form-control" required value="<?php echo $p_url; ?>" >



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

<?php echo $p_desc; ?>

</textarea>

</div><!-- description tab-pane fade in active Ends -->





</div><!-- tab-content Ends -->


</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Precio del producto </label>

<input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>" >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Inventario </label>

<input type="text" name="product_stock" class="form-control" required value="<?php echo $p_stock; ?>" >

</div><!-- form-group Ends -->


</div><!-- col-md-9 Ends -->


<div class="col-md-3"><!-- col-md-3 Starts -->


<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Imagen de Producto 1 </label>

<input type="file" name="product_img1" class="form-control" >
<br><img src="product_images/<?php echo $p_image1; ?>" width="70" height="70" >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Imagen de Producto 2 </label>

<input type="file" name="product_img2" class="form-control" >

<br>

<?php if(empty($p_image2)){ ?>

<img src="product_images/no-image.jpg" width="70" height="70" >

<?php }else{ ?>

<img src="product_images/<?php echo $p_image2; ?>" width="70" height="70" >

<?php } ?>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class=" control-label" > Imagen de Producto 3 </label>

<input type="file" name="product_img3" class="form-control" >

<br>

<?php if(empty($p_image3)){ ?>

<img src="product_images/no-image.jpg" width="70" height="70" >

<?php }else{ ?>

<img src="product_images/<?php echo $p_image3; ?>" width="70" height="70" >

<?php } ?>

</div><!-- form-group Ends -->



</div><!-- col-md-3 Ends -->


</div><!-- row Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" ></label>

<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control" >


</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['update'])){

$product_title = mysqli_real_escape_string($con, $_POST['product_title']);

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

              
$update_product = "UPDATE products SET date='NOW()',product_title='$product_title',product_url='$product_url',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_desc='$product_desc',product_stock='$product_stock' WHERE product_id='$p_id'";

$run_product = mysqli_query($con,$update_product);

if($run_product){

echo "<script> alert('Producto Actualizado') </script>";

echo "<script>window.open('index.php?view_products','_self')</script>";

}

}

?>

<?php } ?>
