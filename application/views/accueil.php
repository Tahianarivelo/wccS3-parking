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
		<script src="<?php echo base_url();?>assets/index/assets/js/chart.js"></script>
	</head>
	<style>
		.chart-container{
			height:400px; 
			width:500px;
			margin-bottom: 10px;
		}
		@media screen and (max-width:540px){
			.chart-container{
				height:300px; 
				width:300px;
			}
		}
	</style>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1>Aiza kia no hijanonako</h1>
				<br />
				<p style="margin-bottom: 0px;">
				Ampidiro eto ny Halavan'ny fiaranao(metatra)</p>
				
				<p><?php echo $estimation[0]['axe']; ?>: <?php echo $estimation[0]['reste']; ?> fiara eo ho eo sisa,
				<?php echo $estimation[1]['axe']; ?>: <?php echo $estimation[1]['reste']; ?> fiara eo ho eo sisa,
				<?php echo $estimation[2]['axe']; ?>: <?php echo $estimation[2]['reste']; ?> fiara eo ho eo sisa</p>
				<div class="chart-container" >
					<canvas id="chart"></canvas>
				</div>
				<p style="display:none;" id="<?php echo $estimation[0]['axe']; ?>"><?php echo $estimation[0]['reste']; ?></p>
				<p style="display:none;" id="<?php echo $estimation[1]['axe']; ?>"><?php echo $estimation[1]['reste']; ?></p>
				<p style="display:none;" id="<?php echo $estimation[2]['axe']; ?>"><?php echo $estimation[2]['reste']; ?></p>
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
			
			<script>
var ctx = document.getElementById('chart');
var a = document.getElementById('A');
var b = document.getElementById('B');
var c = document.getElementById('C');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['A', 'B', 'C'],
        datasets: [{
            label: 'Ireo toerana',
            data: [parseInt(a.textContent),parseInt(b.textContent), parseInt(c.textContent)],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                },display:false
            }]
		},
		responsive:true,
    	maintainAspectRatio:false
    }
});
</script>
	</body>
</html>
