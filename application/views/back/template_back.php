<!DOCTYPE HTML>
<!--
	Theory by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<head>
	<title>Back</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/accueil/assets/css/main.css" />
</head>
<style>
	h2,h3{
		color:#16363e;
	}
</style>
<body class="subpage">

	<!-- Header -->
	<header id="header" style="background-color:#16363e;">
		<div class="inner">
			<a href="<?php echo base_url(); ?>GetReservation/back" class="logo">Back</a>
			<nav id="nav">
				<a href="<?php echo base_url(); ?>Back/Home">Home</a>
				<a href="<?php echo base_url(); ?>Back/LanyDaty">Lany daty</a>
			</nav>
			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
		</div>
    </header>
    <?php include $view.'.php'; ?>
    <!-- Footer -->
	<footer id="footer">
		<div class="inner">
			<div class="flex">
				<div class="copyright">
					&copy; Bio,Ngam,Pata
				</div>
				<ul class="icons">
					<li><a href="#" class="icon fa-facebook" style="color:#57b596;"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-twitter" style="color:#57b596;"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-linkedin" style="color:#57b596;"><span class="label">linkedIn</span></a></li>
					<li><a href="#" class="icon fa-pinterest-p" style="color:#57b596;"><span class="label">Pinterest</span></a></li>
					<li><a href="#" class="icon fa-vimeo" style="color:#57b596;"><span class="label">Vimeo</span></a></li>
				</ul>
			</div>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="<?php echo base_url(); ?>assets/accueil/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/accueil/assets/js/skel.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/accueil/assets/js/util.js"></script>
	<script src="<?php echo base_url(); ?>assets/accueil/assets/js/main.js"></script>

</body>

</html>