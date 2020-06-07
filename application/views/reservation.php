
	<!-- Three -->
	<section id="one" class="wrapper">
		<div class="inner">
		<h2>Vos reservation</h2>
		<div class="flex flex-<?php echo count($value); ?>">
		<?php $limit=2; $compteur=0;//permet d'afficher les resultat par 3 ?>
		<?php if(($status == 'OK') && (count($value) != 0)){ for($i=0; $i<count($value); $i++){ ?>
				<article>
					<div class="image fit">
						<img src="<?php echo base_url(); ?>assets/accueil/images/pic01.jpg" alt="Pic 01" />
					</div>
					<header>
						<h3><?php echo $value[$i]->nomaxe; ?><i class="icon fa-star"></i></h3>
					</header>
					<p style="margin: 0px;" >Date: <?php echo date('d M Y', strtotime($value[$i]->date)); ?></p>
					<p style="margin: 0px;" >Espace entre voiture: <?php echo $value[$i]->espace; ?> m</p>
					<p style="margin: 0px;">Duree maximum de stationement: <?php echo $value[$i]->dureemax; ?> h</p>
					<footer>
						<form action="<?php echo base_url(); ?>reserver/parckingTerminer" method="post">
							<input type="hidden" name="idOccupation" value="<?php echo $value[$i]->id; ?>">
							</br>
							<input type="submit" class="button icon fa-times" value="Miala" style="background-color:#e84d4d;">
						</form>
					</footer>
				</article>
		<?php }
			}else{ echo $message; } ?>
			</div>
		</div>
	</section>
