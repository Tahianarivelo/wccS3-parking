<!DOCTYPE HTML>
<!--
	Eventually by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Eventually by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/index/assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1>Aiza kia no hijanonako</h1>
				<br />
				<p style="margin-bottom: 0px;">
				Ampidiro eto ny Halavan'ny fiaranao(metatra)</p>
				<p>A: 3 fiara eo ho eo, B: 3 fiara eo ho eo, C: 3 fiara eo ho eo</p>
			</header>

		<!-- Signup Form -->
			<form id="signup-form" method="post" action="<?= base_url(); ?>welcome/recherche">
				<input type="text" name="longueur" id="email" placeholder="Oh:23" required />
				<input type="submit" value="Mitady" />
			</form>
				<?php if(isset($error)) { ?>
					<p style="color:#d21818;"> <?= $error ?> </p>
				<?php } ?>

		<!-- Footer
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
				</ul>
			</footer> -->

		<!-- Scripts -->
			<script src="<?php echo base_url();?>assets/index/assets/js/main.js"></script>

	</body>
</html>
