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
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <style type="text/css">
        .container button{
          
          border-radius: 0px;
        }
        a {
          color: #7F7F80;
          text-decoration: none;
        }

        a:hover {
          color: #545455;
          text-decoration: none;
        }
        #options .product-options a {
        font-size: 20px;
        display: inline-block;
        background: rgba(0, 123, 255, 0.7);
        color: #fff;
        line-height: 1;
        padding: 8px 0;
        margin-right: 6px;
        border-radius: 50%;
        text-align: center;
        width: 36px;
        height: 36px;
        transition: 0.3s;
      }


      #options .product-options a:hover {
        background: rgba(0, 123, 255, 0.5);
        color: #00000;
        text-decoration: none;
      }

        .single-team {
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            color: #515656;
            text-align: center;
            position: relative;
            -webkit-box-shadow: 0 5px 30px -10px rgba(0, 0, 0, 0.3);
            box-shadow: 0 5px 30px -10px rgba(0, 0, 0, 0.3);
            -webkit-transform: translateY(0);
            transform: translateY(0);
            -webkit-transition: 0.3s;
            transition: 0.3s
        }

        .single-team:hover {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px)
        }

        .single-team .team-photo {
            margin-bottom: 20px;
            padding-top: 20px;
            overflow: hidden;
            max-height: 300px;
        }

        .single-team .team-photo img {
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }

        .single-team:hover .team-photo img {
            -webkit-transform: scale(1.1);
            transform: scale(1.1)
        }

        .single-team h4 {
            text-transform: uppercase;
        }

        .single-team h6 {
            margin-bottom: 20px;
        }

        .single-team .social-menu {
            -webkit-transition: 0.3s;
            transition: 0.3s;
            position: absolute;
            bottom: -100px;
            left: 0;
            width: 100%;
            padding: 23px 10px;
            background-color: #fff;
        }
        .social-menu button{
          width: 100%;
          
        }

        .single-team:hover .social-menu {
            bottom: 0;
        }
        .product_price
        {
          font-size: 16px;
          color: #EE3668;
          font-weight: 600;
        }
        .product_price span
        {
          font-size: 12px;
          margin-left: 10px;
          color: #b5aec4;
          text-decoration: line-through;
        }


    </style>
    
</head>

<body>


    
    <?php include("modules/header.php"); ?>



    <main class="page landing-page" style="min-height: 1000px;">       
        <section class="clean-block dark">
            <div class="container-fluid">
            <div class="row">
                
                <!--------------------------------------------------PRODUCTOS------------------------------------------------ -->

                <div class="col-md-12">
                    <div class="container-fluid" style="padding-top: 60px;">
                        <div class="row" id="Products">

                            <?php getProducts(); ?>
                            
                            <div class="col-md-12" style="margin-top: 50px;">
                              
                              <nav arial-label="Page ">
                                <ul class="pagination justify-content-center">
                                  <?php getPaginator(); ?>
                                </ul>
                              </nav>
                            </div>
                            

                        </div>
                        
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