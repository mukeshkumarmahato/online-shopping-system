<?php
include "header.php";
?>
<!-- /BREADCRUMB -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
			});
		});
</script>
<!-- SECTION -->
<div class="section main main-raised">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product main img -->
				<?php 
					include 'db.php';
					$product_id = $_GET['p'];
					
					$sql = " SELECT * FROM products ";
					$sql = " SELECT * FROM products WHERE product_id = $product_id";
					if (!$con) {
						die("Connection failed: " . mysqli_connect_error());
					}
					$result = mysqli_query($con, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while($row = mysqli_fetch_assoc($result)) {
						echo '
                    		<div class="col-md-5 col-md-push-2">
                                <div id="product-main-img">
                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

									<div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-md-2  col-md-pull-5">
                                <div id="product-imgs">
                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'g" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>
                                </div>
                            </div>';
							?>
							<!-- FlexSlider -->
							<?php 
								echo '
                    				<div class="col-md-5">
										<div class="product-details">
											<h2 class="product-name">'.$row['product_title'].'</h2>
										<div>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<a class="review-link" href="#review-form">10 Review(s) | Add your review</a>
									</div>
									<div>
										<h3 class="product-price">$ '.$row['product_price'].'</h3>
									</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<div class="add-to-cart">
										<div class="btn-group" style="margin-left: 25px; margin-top: 15px">
											<button class="add-to-cart-btn" pid="'.$row['product_id'].'"  id="product" ><i class="fa fa-shopping-cart"></i> add to cart</button>
                                		</div>
									</div>
									<ul class="product-links">
										<li>Category:</li>
										<li><a href="#">Headphones</a></li>
										<li><a href="#">Accessories</a></li>
									</ul>

									<ul class="product-links">
										<li>Share:</li>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-envelope"></i></a></li>
									</ul>

								</div>
							</div>
							<div class="col-md-12">
								<div id="product-tab">
									<ul class="tab-nav">
										<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
										<li><a data-toggle="tab" href="#tab2">Details</a></li>
										<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
									</ul>
									<div class="tab-content">
										<!-- tab1  -->
										<div id="tab1" class="tab-pane fade in active">
											<div class="row">
												<div class="col-md-12">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												</div>
											</div>
										</div>
										<div id="tab2" class="tab-pane fade in">
											<div class="row">
												<div class="col-md-12">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												</div>
											</div>
										</div>
										<div id="tab3" class="tab-pane fade in">
											<div class="row">
												<!-- Rating -->
												<div class="col-md-3">
													<div id="rating">
														<div class="rating-avg">
															<span>4.5</span>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
															</div>
														</div>
														<ul class="rating">
															<li>
																<div class="rating-stars">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																</div>
																<div class="rating-progress">
																	<div style="width: 80%;"></div>
																</div>
																<span class="sum">3</span>
															</li>
															<li>
																<div class="rating-stars">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																</div>
																<div class="rating-progress">
																	<div style="width: 60%;"></div>
																</div>
																<span class="sum">2</span>
															</li>
															<li>
																<div class="rating-stars">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																</div>
																<div class="rating-progress">
																	<div></div>
																</div>
																<span class="sum">0</span>
															</li>
															<li>
																<div class="rating-stars">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																</div>
																<div class="rating-progress">
																	<div></div>
																</div>
																<span class="sum">0</span>
															</li>
															<li>
																<div class="rating-stars">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																</div>
																<div class="rating-progress">
																	<div></div>
																</div>
																<span class="sum">0</span>
															</li>
														</ul>
													</div>
												</div>
												<div class="col-md-6">
													<div id="reviews">';?>
														<ul class="reviews">
														<?php
            											//pagination
            											include "pagination/rpaging.php";
            											$page = (int) (!isset($_GET['p']) ? 1 : $_GET['p']);
            											$limit = 3; //if you want to dispaly 5 records per page then you have to change here
            											$startpoint = ($page * $limit) - $limit;
            											$statement = "reviews ORDER BY review_id asc"; //you have to pass your query over here
														$res = mysqli_query($con,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
														
														while($data=mysqli_fetch_array($res)){?>

															<li>
																<div class="review-heading">
																	<h5 class="name" style="text-transform: uppercase;"><?php echo $data["name"];?></h5>
																	<p class="date"><?php echo $data["rdate"];?></p>
																	<div class="review-rating">
																	<?php
																		if($data["rating"]==5){
																			echo '																		<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>';
																		}
																		else if($data["rating"]==4){
																			echo '																		<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star-o empty"></i>';
																		}
																		else if($data["rating"]==3){
																			echo '																		<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star-o empty"></i>
																			<i class="fa fa-star-o empty"></i>';
																		}
																		else if($data["rating"]==2){
																			echo '																		<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star-o empty"></i>
																			<i class="fa fa-star-o empty"></i>
																			<i class="fa fa-star-o empty"></i>';
																		}
																		else{
																			echo '																		<i class="fa fa-star"></i>
																			<i class="fa fa-star-o empty"></i>
																			<i class="fa fa-star-o empty"></i>
																			<i class="fa fa-star-o empty"></i>
																			<i class="fa fa-star-o empty"></i>';
																		}
																	?>
																	</div>
																</div>
																<div class="review-body">
																	<p><?php echo $data["review"];?></p>
																</div>
															</li>
															<?php } 
																echo '<div id="pagingg">';
																echo rpaging($statement,$limit,$page);
																echo '</div>';
															?>														
														</ul>
													</div>
												</div>
												<?php
												echo '
												<div class="col-md-3 mainn">
													<div id="review-form">
														<form class="review-form" action="review.php" method="POST">
															<input class="input" type="text" name="name" placeholder="Your Name">
															<input class="input" type="email" name="mail" placeholder="Your Email">
															<input class="input" type="datetime-local" name="revdate" >
															<textarea class="input" name="review" placeholder="Your Review"></textarea>
															<div class="input-rating">
																<span>Your Rating: </span>
																<div class="stars">
																	<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
																	<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
																	<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
																	<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
																	<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
																</div>
															</div>
															<input class="primary-btn" type="submit" value="Submit" name="submit">
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section main main-raised">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title text-center">
									<h3 class="title">Related Products</h3>
								</div>
							</div>';
							
							$_SESSION['product_id'] = $row['product_id'];
								}
							} ?>	
							<?php
                    			include 'db.php';
								$product_id = $_GET['p'];
                    
								$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN $product_id AND $product_id+3";
                				$run_query = mysqli_query($con,$product_query);
                				if(mysqli_num_rows($run_query) > 0){

                    				while($row = mysqli_fetch_array($run_query)){
                        				$pro_id    = $row['product_id'];
                        				$pro_cat   = $row['product_cat'];
                        				$pro_brand = $row['product_brand'];
                        				$pro_title = $row['product_title'];
                        				$pro_price = $row['product_price'];
                        				$pro_image = $row['product_image'];
                        				$cat_name = $row["cat_title"];

                        				echo "
                                			<div class='col-md-3 col-xs-6'>
												<a href='product.php?p=$pro_id'>
													<div class='product'>
														<div class='product-img'>
															<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
															<div class='product-label'>
																<span class='sale'>-30%</span>
																<span class='new'>NEW</span>
															</div>
														</div></a>
														<div class='product-body'>
															<p class='product-category'>$cat_name</p>
															<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
															<h4 class='product-price header-cart-item-info'>$ $pro_price</h4>
															<div class='product-rating'>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
															</div>
														</div>
														<div class='add-to-cart'>
															<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
														</div>
													</div>
                                				</div>";
											};}
										?>
									</div>
								</div>
							</div>
<?php
	include "newslettter.php";
	include "footer.php";
?>