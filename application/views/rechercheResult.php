
	<!-- Three -->
<?php if(isset($error)) { ?>
	<h2> <?= $error ?> </h2>
<?php } else { ?>
	<section class="wrapper special">
		<div class="inner">
			<header class="align-center">
				<h2>Toerana Aroso ho anao</h2>
			</header>
			<div class="flex flex-2">
				<article>
					<div class="image fit">
						<img src="<?php echo base_url(); ?>assets/accueil/images/pic01.jpg" alt="Pic 01" />
					</div>
					<header>
						<h3> <?= $suggestAxis->nom ?> <i class="icon fa-star"></i></h3>
					</header>
					<p> <b> Espace entre voiture: </b> <?= $suggestAxis->espace ?> metes </p>
					<p> <b> Duree maximum de stationement: </b> <?= $suggestAxis->dureemax ?> heures </p>
					<footer>
						<form action="<?php echo base_url(); ?>reserver" method="post">
							<input type="hidden" name="idAxe" value="<?= $suggestAxis->id ?>">
							<input type="hidden" name="longueurVehicule" value="<?= $carLength ?>">
							<input type="text" name="matricule" id="query" value="" placeholder="Matricule voiture">
							</br>
							<input type="submit" class="button special" style="background-color:#57b596;" value="valider" >
						</form>
					</footer>
				</article>
			</div>
		</div>
	</section>
	<?php if(count($freeAxis) > 1) { ?>
	<section id="three" class="wrapper special">
		<div class="inner">
			<header class="align-center">
				<h2>Toerana Malalaka</h2>
			</header>
			<div class="flex flex-<?php echo count($freeAxis);?>">
				<?php foreach($freeAxis as $freeAxisRow) { ?>
					<article>
						<div class="image fit">
							<img src="<?php echo base_url(); ?>assets/accueil/images/pic01.jpg" alt="Pic 01" />
						</div>
						<header>
							<h3> <?= $freeAxisRow->nom ?></h3>
						</header>
						<p> <b> Espace entre voiture: </b> <?= $freeAxisRow->espace ?> metes </p>
						<p> <b> Duree maximum de stationement: </b> <?= $freeAxisRow->dureemax ?> heures </p>
						<footer>
						<form action="<?php echo base_url(); ?>reserver" method="post">
							<input type="hidden" name="idAxe" value="<?= $freeAxisRow->id ?>">
							<input type="hidden" name="longueurVehicule" value="<?= $carLength ?>">
							<input type="text" name="matricule" id="query" value="" placeholder="Matricule voiture">
							</br>
							<input type="submit" class="button special" style="background-color:#57b596;" value="valider" >
							</form>
						</footer>
					</article>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php } ?>
<?php } ?>
	