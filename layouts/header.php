<!DOCTYPE html>
<html lang="en">
<head>
<title>Little Closet</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/bootstrap.min.css">

<link href="<?php echo base_url() ?>/public/frontend/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>/public/frontend/css/font-awesome.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/responsive.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/public/frontend/css/style.css">
</head>
<body>

<!-- Menu -->

<div class="menu">

	<!-- Search -->
	<div class="menu_search">
		<form action="#" id="menu_search_form" class="menu_search_form">
			<input type="text" class="search_input" placeholder="Search Item" required="required">
			<button class="menu_search_button"><img src="<?php echo base_url() ?>/public/frontend/img/search.png" alt=""></button>
		</form>
	</div>
	<!-- Navigation -->
	<div class="menu_nav">
		<?php 
				$category =$db->fetchAll("category");
			 ?>
		<ul>
			<?php foreach ($category as $item) { ?>
                        <li class=""><a href="danh-muc-san-pham.php?<?php echo $item['name']?>&id=<?php echo $item['id'] ?>">
                             <?php echo $item['name']?>
                        </a></li>
                    <?php } ?>
		</ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="<?php echo base_url() ?>/public/frontend/img/phone.svg" alt=""></div></div>
			<div>+1 912-252-7350</div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href=" <?php echo base_url() ?>index.php">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="<?php echo base_url() ?>/public/frontend/img/logo_1.png" alt=""></div>
						<div>Little Closet</div>
					</div>
				</a>	
			</div>
			<?php 
				$category =$db->fetchAll("category");
			 ?>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					
					
					<?php foreach ($category as $item) { ?>
                        <li class="active"><a href="danh-muc-san-pham.php?<?php echo $item['name']?>&id=<?php echo $item['id'] ?>">
                             <?php echo $item['name']?>
                        </a></li>
                    <?php } ?>
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="#" id="header_search_form">
						<input type="text" class="search_input" placeholder="Search Item" required="required">
						<button class="header_search_button"><img src="<?php echo base_url() ?>/public/frontend/img/search.png" alt=""></button>
					</form>
				</div>
				<!-- User -->
				<div class="user"><a href="#"><div><img src="<?php echo base_url() ?>/public/frontend/img/user.svg" alt="k"><div>1</div></div></a></div>
				<!-- Cart -->
				<div class="cart"><a href=""><div><img class="svg" src="<?php echo base_url() ?>/public/frontend/img/cart.svg" alt=""></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="<?php echo base_url() ?>/public/frontend/img/phone.svg" alt=""></div></div>
					<div>+1 912-252-7350</div>
				</div>
			</div>
		</div>
	</header>