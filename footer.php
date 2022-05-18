<footer id="footer">
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">About Us</h3>
						<ul class="footer-links">
							<li><a href="#"><i class="fa fa-map-marker"></i>Address</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>9813246534</a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i>myonlineshop@gmail.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 text-center" style="margin-top:80px;">
					<ul class="footer-payments">
						<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
						<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
					</ul>
					<span class="copyright">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
					</span>
				</div>
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Categories</h3>
						<ul class="footer-links">
							<li><a href="#">Electronics</a></li>
							<li><a href="#">Ladies wear</a></li>
							<li><a href="#">Men wear</a></li>
							<li><a href="#">Kids wear</a></li>
							<li><a href="#">Furnitures</a></li>
							<li><a href="#">Home appliances</a></li>
							<li><a href="#">Electronics gadgets</a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix visible-xs"></div>
			</div>
		</div>
	</div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="js/actions.js"></script>
<script src="js/sweetalert.min"></script>
<script src="js/jquery.payform.min.js" charset="utf-8"></script>
<script src="js/script.js"></script>
<script>
	var c = 0;
    function menu(){
      	if(c % 2 == 0) {
        	document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu active";    
        	document.querySelector('.cont_icon_trg').className = "cont_icon_trg active";    
        	c++; 
    	}
		else{
        	document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu disable";        
        	document.querySelector('.cont_icon_trg').className = "cont_icon_trg disable";        
        	c++;
        }
    }
</script>
<script type="text/javascript">
	$('.block2-btn-addcart').each(function(){
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function(){
			swal(nameProduct, "is added to cart !", "success");
		});
	});
	$('.block2-btn-addwishlist').each(function(){
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function(){
			swal(nameProduct, "is added to wishlist !", "success");
		});
	});
</script>