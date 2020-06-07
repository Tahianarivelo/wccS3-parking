	<!-- Three -->
	<section id="one" class="wrapper">
		<div class="inner">
		<h2>Ireo famandrian-toerana lany daty</h2>
		<div class="flex flex-3">
				<article>
					<div class="image fit">
						<img src="<?php echo base_url(); ?>assets/accueil/images/pic01.jpg" alt="Pic 01" />
					</div>
					<header>
						<h3><i class="icon fa-star"></i></h3>
					</header>
					<p style="margin: 0px;" >Date:</p>
					<p style="margin: 0px;" >Espace entre voiture: m</p>
					<p style="margin: 0px;">Duree maximum de stationement:  h</p>
					<footer>
						<form action="<?php echo base_url(); ?>reserver/parckingTerminer" method="post">
							<input type="hidden" name="idOccupation" value="">
							</br>
							<input type="submit" class="button icon fa-times" value="Miala" style="background-color:#e84d4d;">
						</form>
					</footer>
				</article>
			</div>
		</div>
	</section>
