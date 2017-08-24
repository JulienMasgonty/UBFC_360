	<footer>
		<section class="foot-contact">
			<h2 class="blue">Nous contacter : </h2>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5416.754845788597!2d5.991501200000011!3d47.24832260000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478d63ae7c78c61d%3A0x85414d4b70476e13!2sUniversit%C3%A9+de+Bourgogne+Franche-Comt%C3%A9!5e0!3m2!1sfr!2sfr!4v1490275504878" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div><!--
			--><div class="infos">
				<p class="nom">Université de Bourgogne Franche-Comté</h3>
				<div class="block">
					<i class="map-ico fa fa-map-marker"></i>
					<div class="adresse">
						<p>32 Avenue de l'observatoire</p>
						<p>25000 Besançon</p>
						<p>France</p>
					</div>
				</div>
				<div class="block">
					<i class="fa fa-phone"></i>
					<div class="tel">
						<!-- <p>tel : 03 63 08 26 35</p> -->
						<p>tel : 03 63 08 26 50</p>
					</div>
				</div>
				<div class="block">
					<i class="fa fa-envelope"></i>
					<div class="mail">
						<p>mail: secretariat@ubfc.fr</p>
					</div>
				</div>
			</div>
		</section>
		<section class="foot-partenaires">
			<ul>
				<?php 
					$args = array(
						'post_type'	=> 'etablissement',
						'order'		=> 'ASC'
					);
					$query = new WP_Query($args);

					while($query->have_posts()):$query->the_post();
						$images = rwmb_meta('logo-etablissement', 'type=image_advanced&size=full');
				?>
					<li>
						<a target="_blank" href="<?php echo rwmb_meta('link-etablissement') ?>">
							<?php foreach ($images as $image): ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>">
							<?php endforeach; ?>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<ul class="princ">
				<li><a target="_blank" href="https://www.bourgognefranchecomte.fr"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Logo-regionCMJN.png" alt="Bourgogne - Franche-Comté"></a></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logoubfcBONNE_VERSION.png" alt="Université Bourgogne Franche-Comté"></li>
			</ul>
		</section>
		<section class="foot-legacy">
			<a href="">Mentions légales</a>
		</section>
	</footer>

	<?php wp_footer(); ?>

	<script type="text/javascript">
		//<![CDATA[
		if (typeof newsletter_check !== "function") {
		window.newsletter_check = function (f) {
		    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
		    if (!re.test(f.elements["ne"].value)) {
		        alert("L'adresse email est incorrecte");
		        return false;
		    }
		    for (var i=1; i<20; i++) {
		    if (f.elements["np" + i] && f.elements["np" + i].required && f.elements["np" + i].value == "") {
		        alert("");
		        return false;
		    }
		    }
		    if (f.elements["ny"] && !f.elements["ny"].checked) {
		        alert("You must accept the privacy statement");
		        return false;
		    }
		    return true;
		}
		}
		//]]>
	</script>
</body>
</html>