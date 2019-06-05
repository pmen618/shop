<!-- FEATURED -->
    <div class="features">
            <div class="container">
                <div class="row">
                    
                    <!-- Feature -->
                    <div class="col-lg-4 feature_col">
                        <div class="feature d-flex flex-row align-items-start justify-content-start">
                            <div class="feature_left">
                                <div class="feature_icon"><img src="<?php echo base_url() ?>/public/frontend/img/icon_1.svg" alt=""></div>
                            </div>
                            <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                                <div class="feature_title">Thanh toán nhanh chóng</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature -->
                    <div class="col-lg-4 feature_col">
                        <div class="feature d-flex flex-row align-items-start justify-content-start">
                            <div class="feature_left">
                                <div class="feature_icon ml-auto mr-auto"><img src="<?php echo base_url() ?>/public/frontend/img/icon_2.svg" alt=""></div>
                            </div>
                            <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                                <div class="feature_title">Sản phẩm chất lượng</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature -->
                    <div class="col-lg-4 feature_col">
                        <div class="feature d-flex flex-row align-items-start justify-content-start">
                            <div class="feature_left">
                                <div class="feature_icon"><img src="<?php echo base_url() ?>/public/frontend/img/icon_3.svg" alt=""></div>
                            </div>
                            <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                                <div class="feature_title">Miễn phí giao hàng</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>

<!-- Footer -->

		<footer class="footer">
			<div class="footer_content">
				<div class="container">
					<div class="row">
						
						<!-- About -->
						<div class="col-lg-4 footer_col">
							<div class="footer_about">
								<div class="footer_logo">
									<a href="#">
										<div class="d-flex flex-row align-items-center justify-content-start">
											<div class="footer_logo_icon"><img src="<?php echo base_url() ?>/public/frontend/img/logo_2.png" alt=""></div>
											<div>Little Closet</div>
										</div>
									</a>		
								</div>
								<div class="footer_about_text">
									<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Fusce venenatis vel velit vel euismod.</p>
								</div>
							</div>
						</div>

						<!-- Footer Links -->
						<div class="col-lg-4 footer_col">
							<div class="footer_menu">
								<div class="footer_title">Support</div>
								<ul class="footer_list">
									<li>
										<a href="#"><div>Customer Service<div class="footer_tag_1">online now</div></div></a>
									</li>
									<li>
										<a href="#"><div>Return Policy</div></a>
									</li>
									<li>
										<a href="#"><div>Size Guide<div class="footer_tag_2">recommended</div></div></a>
									</li>
									<li>
										<a href="#"><div>Terms and Conditions</div></a>
									</li>
									<li>
										<a href="#"><div>Contact</div></a>
									</li>
								</ul>
							</div>
						</div>

						<!-- Footer Contact -->
						<div class="col-lg-4 footer_col">
							<div class="footer_contact">
								<div class="footer_title">Stay in Touch</div>
								<div class="newsletter">
									<form action="#" id="newsletter_form" class="newsletter_form">
										<input type="email" class="newsletter_input" placeholder="Subscribe to our Newsletter" required="required">
										<button class="newsletter_button">+</button>
									</form>
								</div>
								<div class="footer_social">
									<div class="footer_title">Social</div>
									<ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer_bar">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
								<div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href=" <?php echo base_url() ?>/index.php ?> " target="_blank">Men</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
								<nav class="footer_nav ml-md-auto order-md-2 order-1">
									<?php 
										$category =$db->fetchAll("category");
									 ?>
									<ul class="d-flex flex-row align-items-center justify-content-start">
										<?php foreach ($category as $item) { ?>
					                        <li class=""><a href="danh-muc-san-pham.php?<?php echo $item['name']?>&id=<?php echo $item['id'] ?>">
					                             <?php echo $item['name']?>
					                        </a></li>
					                    <?php } ?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
		
</div>

<script src="<?php echo base_url() ?>/public/frontend/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/js/popper.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/plugins/easing/easing.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/plugins/progressbar/progressbar.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/js/custom.js"></script>
</body>
</html>