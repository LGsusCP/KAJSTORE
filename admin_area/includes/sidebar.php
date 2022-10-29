<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgba(43, 43, 44, .9);"><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?view_orders" >Admin Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"> </i>

</a>

</li><!-- li Ends -->

<li><!-- dropdown Starts -->

<a href="index.php?user_profile=<?php echo $admin_id; ?>" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $admin_name; ?> 

</a><!-- dropdown-toggle Ends -->



</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse" style=""><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- Products li Starts -->

<a href="#" data-toggle="collapse" data-target="#products">

<i class="fa fa-fw fa-table"></i> Productos

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="products" class="collapse">

<li>
<a href="index.php?insert_product"> Inserar Productos </a>
</li>

<li>
<a href="index.php?view_products"> Ver Productos </a>
</li>


</ul>

</li><!-- Products li Ends -->





<li>

<a href="index.php?view_orders">

<i class="fa fa-fw fa-list"></i> Ordenes

</a>

</li>


<li><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#users">

<i class="fa fa-fw fa-gear"></i> Usuarios

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="users" class="collapse">

<li>
<a href="index.php?insert_user"> Agregar Usuarios </a>
</li>

<li>
<a href="index.php?view_users"> Ver Usuarios </a>
</li>

<li>
<a href="index.php?user_profile=<?php echo $admin_id; ?>"> Editar Perfil </a>
</li>

</ul>

</li><!-- li Ends -->



</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>