<!DOCTYPE HTML>
<!--
	Theory by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<head>
	<title>Generic - Theory by TEMPLATED</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/accueil/assets/css/main.css" />
</head>

<body class="subpage">

	<!-- Header -->
	<header id="header">
		<div class="inner">
			<a href="<?php echo base_url(); ?>" class="logo">Theory</a>
			<nav id="nav">
				<a href="<?php echo base_url(); ?>">Home</a>
				<a href="reservation">Mes Places</a>
			</nav>
			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
		</div>
	</header>

	<!-- Three -->
	<section id="three" class="wrapper special">
		<div class="inner">
			<header class="align-center">
				<h2>Nunc Dignissim</h2>
				<p>Aliquam erat volutpat nam dui </p>
			</header>
			<div class="flex flex-2">
					<article>
						<div class="image fit">
							<img src="<?php echo base_url(); ?>assets/accueil/images/pic01.jpg" alt="Pic 01" />
						</div>
						<header>
							<h3>Praesent placerat magna <i class="icon fa-star"></i></h3>

						</header>
						<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor lorem ipsum.</p>
						<footer>
						<form action="<?php echo base_url(); ?>reserver" method="post">
							<input type="hidden" name="idAxe" value="1">
							<input type="hidden" name="longueurVehicule" value="23">
							<input type="text" name="matricule" id="query" value="" placeholder="Matricule voiture">
							</br>
							<input type="submit" class="button special" value="valider" >
							</form>
						</footer>
					</article>
				
					<article>
						<div class="image fit">
							<img src="<?php echo base_url(); ?>assets/accueil/images/pic01.jpg" alt="Pic 01" />
						</div>
						<header>
							<h3>Praesent placerat magna <i class="icon fa-star"></i></h3>

						</header>
						<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor lorem ipsum.</p>
						<footer>
						<form action="<?php echo base_url(); ?>reserver" method="post">
							<input type="hidden" name="idAxe" value="2">
							<input type="hidden" name="longueurVehicule" value="23">
							<input type="text" name="matricule" id="query" value="" placeholder="Matricule voiture">
							</br>
							<input type="submit" class="button special" value="valider" >
							</form>
						</footer>
					</article>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<footer id="footer">
		<div class="inner">
			<div class="flex">
				<div class="copyright">
					&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
				</div>
				<ul class="icons">
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
					<li><a href="#" class="icon fa-pinterest-p"><span class="label">Pinterest</span></a></li>
					<li><a href="#" class="icon fa-vimeo"><span class="label">Vimeo</span></a></li>
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