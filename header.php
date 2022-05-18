<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Shopping System</title>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Custom stlylesheet -->
	<!--link type="text/css" rel="stylesheet" href="css/style.css"/-->
	<link type="text/css" rel="stylesheet" href="css/decor.css"/>
</head>	
<body>
	<header>
		<div id="header">
			<div class="container">
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
                                <img src="img/shoplogo.png" alt="" width="120px" height="70px">
							</a>
						</div>
					</div>
					<!-- /LOGO -->
					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<input class="input" id="search" type="text" placeholder="Search here">
								<button type="submit" id="search_btn" class="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->
					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="badge qty">0</div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list" id="cart_product"></div>
									<div class="cart-btns">
										<a href="cart.php" style="width:100%;"><i class="fa fa-edit"></i>  edit cart</a>
									</div>
								</div>
							</div>
							<!-- /Cart -->
							<ul class="header-links pull-right">
								<li><?php include "db.php";
                    			    if(isset($_SESSION["uid"])){
                    			        $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
                    			        $query = mysqli_query($con,$sql);
                    			        $row=mysqli_fetch_array($query);
									
                    			        echo '<div class="dropdownn">
                    			          	 <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> HI '.$row["first_name"].'</a>
                    			          	 <div class="dropdownn-content">
                    			             <a href="" data-toggle="modal" data-target="#profile"><i class="fa fa-user-circle" aria-hidden="true" ></i>My Profile</a>
                    			             <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                    			          	 </div>
                    			        	 </div>';
									}
									else{ 
                    			        echo '<div class="dropdownn">
                    			             <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> My Account</a>
                    			          	 <div class="dropdownn-content">
                    			             <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Login</a>
                    			             <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                    			             </div>
                    			             </div>';
                    			    } ?>
                    			</li>				
							</ul>
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
			</div>
		</div>
	</header>
	<nav id='navigation'>
        <div class="container" id="get_category_home"></div>				
	</nav>
	<div class="modal fade" id="Modal_login" role="dialog">
        <div class="modal-dialog">
          	<div class="modal-content">
            	<div class="modal-header">
            		<button type="button" class="close" data-dismiss="modal">&times;</button>
            	</div>
            	<div class="modal-body">
            		<?php
            	    	include "login_form.php"
            		?>
            	</div>
        	</div>
        </div>
    </div>
    <div class="modal fade" id="Modal_register" role="dialog">
        <div class="modal-dialog" style="">
        	<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                        include "register_form.php";
                    ?>
                </div>
            </div>
        </div>
	</div>
</body>
</html>		