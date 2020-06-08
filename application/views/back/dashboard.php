<section class="wrapper special">
		<div class="inner">
			<header class="align-center">
				<h2>Add axe</h2>
			</header>
			<div class="flex flex-2">
				<article>
                    <form action="<?php echo base_url(); ?>Back/AddAxe" method="post">
                        <label style="margin: 0px 0px" >Nom:</label>
                        <input type="text" name="nom" value="" placeholder="Nom de l'axe"><br>
                        <label style="margin: 0px 0px" >Longueur(metre):</label>
                        <input type="text" name="longueur" value="0" min="0" placeholder="Longueur de l'axe"><br>
                        <label style="margin: 0px 0px" >Espace entre les voitures(metre):</label>
                        <input type="text" name="espace" value="0" min="0" placeholder="espace entre les voitures"><br>
                        <label style="margin: 0px 0px" >Duree max(heure):</label>
                        <input type="text" name="duree" value="0" min="0" placeholder="duree de stationnement">
                        </br></br>
                        <input type="submit" class="button special" style="background-color:#57b596;" value="Add" >
                    </form>
				</article>
			</div>
		</div>
	</section>