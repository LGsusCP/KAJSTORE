<?php

session_start();

include("includes/db.php");                       

include("functions/functions.php");                

?>

<?php


$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

echo "<script> window.open('index.php','_self') </script>";

}
else{



$row_product = mysqli_fetch_array($run_product);


$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_price = $row_product['product_price'];

$pro_desc = $row_product['product_desc'];

$pro_img1 = $row_product['product_img1'];

$pro_img2 = $row_product['product_img2'];

$pro_img3 = $row_product['product_img3']; 

$pro_type = $row_product['product_type'];

$status = $row_product['status'];

$pro_url = $row_product['product_url'];




?>

<!DOCTYPE html>
<html>

<head>

<title> <?php echo $pro_title; ?> </title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">

</head>

<body>

<?php include("modules/header.php"); ?>

<main class="page landing-page">
        
        <section class="clean-block clean-info " style="padding-top: 50px;">
            <div class="container">

<?php 


if(isset($_POST['add_cart'])){

$ip_add = getRealUserIp();

$p_id = $pro_id;

$product_qty = $_POST['product_qty'];



$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

$run_check = mysqli_query($con,$check_product);

if(mysqli_num_rows($run_check)>0){

echo "<script>alert('Este Producto ya esta en tu carrito de compras')</script>";

echo "<script>window.open('$pro_url','_self')</script>";

}
else {

$get_price = "select * from products where product_id='$p_id'";

$run_price = mysqli_query($con,$get_price);

$row_price = mysqli_fetch_array($run_price);

$pro_price = $row_price['product_price'];


$query = "insert into cart (p_id,ip_add,qty,p_price) values ('$p_id','$ip_add','$product_qty','$pro_price')";

$run_query = mysqli_query($db,$query);

echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                   Producto agregado al carrito con éxito. <a class='alert-link' href='cart.php'>Ver carrito</a>
                  <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times</span></button>
                </div>";

}

}?><!--------END ADD CART-------->

<?php

                        if(isset($_POST['add_wishlist'])){

                        if(!isset($_SESSION['customer_email'])){

                        echo "<script>alert('Inicia sesion para agregar a tu lista de deseos')</script>";

                        echo "<script>window.open('checkout.php','_self')</script>";

                        }
                        else{

                        $customer_session = $_SESSION['customer_email'];

                        $get_customer = "select * from customers where customer_email='$customer_session'";

                        $run_customer = mysqli_query($con,$get_customer);

                        $row_customer = mysqli_fetch_array($run_customer);

                        $customer_id = $row_customer['customer_id']; 

                        $select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

                        $run_wishlist = mysqli_query($con,$select_wishlist);

                        $check_wishlist = mysqli_num_rows($run_wishlist);

                        if($check_wishlist == 1){

                        echo "<script>alert('Este producto ya esta en tu lista de Deseos ')</script>";

                        echo "<script>window.open('$pro_url','_self')</script>";

                        }
                        else{

                        $insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

                        $run_wishlist = mysqli_query($con,$insert_wishlist);

                        if($run_wishlist){


                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                           Producto guardado en tu lista de deseos con éxito. <a class='alert-link' href='customer/my_account.php?my_wishlist'>Ver Lista de Deseos</a>
                          <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times</span></button>
                        </div>";

                        }

                        }

                        }

                        }

                        ?>

                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="carousel slide" data-ride="carousel" id="carousel-1">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                	<img class="w-100 d-block" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Slide Image">
                                </div>
                                <?php if(!empty($pro_img2)){ ?>

                                <div class="carousel-item">
                                	<img class="w-100 d-block" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Slide Image">
                                </div>
                                <?php } ?>

								<?php if(!empty($pro_img3)){ ?>
                                <div class="carousel-item">
                                	<img class="w-100 d-block" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Slide Image">
                                </div>
                                <?php } ?>
                            </div>
                            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                                    data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                <?php if(!empty($pro_img2)){ ?>
                                <li data-target="#carousel-1" data-slide-to="1"></li>
                                <?php } ?>
                                <?php if(!empty($pro_img3)){ ?>
                                <li data-target="#carousel-1" data-slide-to="2"></li>
                                <?php } ?>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4> <?php echo $pro_title; ?> </h4>
                        <br>
                        <br>
                        <h5>Precio: $ <?php echo $pro_price; ?> </h5>
                        <br>
                        
                        <div class="getting-started-info text-center " style="margin-top: 25px;">
                        	<form action="" method="post" class="form-horizontal " >
                            <div class="row form-group"><!-- form-group Starts -->

                                    <label class="col-md-5 control-label" >Seleccione la cantidad </label>

                                    <div class="col-md-7" ><!-- col-md-7 Starts -->

                                        <select name="product_qty" class="form-control" required>

                                            


                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>

                                        </select>

                                    </div><!-- col-md-7 Ends -->

                            </div><!-- form-group Ends -->
                        
                        </div>
                        <br><br>
                        <button class="btn btn-outline-primary " type="submit" name="add_cart"> <i class="icon-basket-loaded" ></i> Agregar</button>
                        
                        </form>
                </div>
                <div class="col-md-12"  style="margin-top: 40px;">
                        <div class="card text-center">
                            <div class="card-header">
                                Descripcion del producto
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $pro_desc; ?></p>
                            </div>


                        </div>
                    </div>
            </div>
        </section>
       
    </main>



<?php include("modules/footer.php"); ?>

</body>
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</html>

<?php } ?>
