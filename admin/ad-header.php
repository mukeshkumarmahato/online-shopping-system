<?php 
    session_start();
    require('../db.php');
    require('function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to administration panel</title>

    <!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <!--********* for icon *********-->
    <link rel="stylesheet" href="css/font-awesome.min.css" class="rel">
    <!--********* for styling *********-->
    <link rel="stylesheet" href="css/style.css" class="rel">
    <script src="js/jquery.js"></script>

</head>
<body>
    <div class="container">
        <div class="logo"><img src="img/shop.png" alt="">
            <div class="account"><a href=""><?php echo strtoupper("welcome"." ".htmlentities($_SESSION["name"]));?></a></div>
        </div>
    </div>
    <div class="sidebar">
        <header>My menu</header>
        <ul class="main-nav-ul">
            <li><a class="active" href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li><a href="categories.php"><i class="fa fa-bars"></i><span class="sub-arrow">Categories</span></a></li>
            <li><a href="brands.php"><i class="fa fa-bar-chart-o fa-fw"></i><span class="sub-arrow">Brands</span></a></li>
            <li><a href="#"><i class="fa fa-product-hunt"></i><span class="sub-arrow">Products</span></a>
                <ul class="sub-menu">
                    <li><a href="add_product.php">Add product</a></li>
                    <li><a href="product.php">Products details</a></li>
                </ul>
            </li>
            <li><a href="order.php"><i class="fa fa-copy"></i><span class="sub-arrow">Orders</span></a></li>
            <li><a href="users.php"><i class="fa fa-address-card"></i><span class="sub-arrow">Users</span></a></li>
            <li><a href="subscribe.php"><i class="fa fa-users"></i><span class="sub-arrow">Subscribers</span></a></li>
            <li><a href="changepassword.php"><i class="fa fa-key"></i><span class="sub-arrow">Change password</span></a></li>
            <li><a href="logout.php"><i class="fa fa-lock"></i><span class="sub-arrow">log out</span></a></li>
        </ul>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>