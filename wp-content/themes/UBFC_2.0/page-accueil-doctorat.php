<?php get_header(); ?>

<main class="doctorat">
	<section class="main-block">	
		<?php while(have_posts()):the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<section class="content">
				<?php the_content(); ?>
				<div class="colors-bar bottom">
					<!-- Affichage d'une bande de couleur pour chaque établissement - ajout de commentaires pour supprimer les espaces blans -->
					<?php 
						$args = array(
							'post_type' 	=> 'etablissement',
							'order' 		=> 'ASC',
							'numberposts' 	=> -1
						);
						$listEtab = get_posts($args);
						for($i=0; $i <= (count($listEtab)); $i++):
							$custom_fields = get_post_custom($listEtab[$i]->ID); 
							if($i == 0): ?>
								<div class="bar" style="width: calc(100% / <?php echo count($listEtab) ?>); background-color: <?php echo $custom_fields['col-etablissement'][0]?>;"></div><!--
							<?php endif ?>
							<?php if($i < count($listEtab)-1 && $i != 0): ?>
								--><div class="bar" style="width: calc(100% / <?php echo count($listEtab) ?>); background-color: <?php echo $custom_fields['col-etablissement'][0]?>;"></div><!--
							<?php endif ?>
							<?php if($i == count($listEtab)-1): ?>
								--><div class="bar" style="width: calc(100% / <?php echo count($listEtab) ?>); background-color: <?php echo $custom_fields['col-etablissement'][0]?>;"></div>
							<?php endif ?>
						<?php endfor?>
				</div>		
			</section>
		<?php endwhile; ?>

		<aside class="secondary">
			<section class="actus-doctorat">
				<div class="content">
					<h4>Actualités</h4>
					<ul>
						<?php 
							$args = array(
								'post_type'	=> 'actus-doctorat',
								'order'		=> 'DESC',
								'orderby'	=> 'meta_value',
								'meta_key'	=> 'date-actu-doct',
								'meta_type'	=> 'DATE'
							);
							$query = new WP_Query($args);
							while($query->have_posts()):$query->the_post();
						?>
							<li class="actu">
								<span class="date"><?php echo rwmb_meta('date-actu-doct', 'type=date'); ?></span><!--
								--><span class="contenu"><?php echo rwmb_meta('content-actu-doct', 'type=text'); ?></span></li>
						<?php endwhile; ?>
					</ul>
				</div>
			</section><!--
			--><section class="hotkeys">
				<ul>
					<li class="elm" data-popup="ecoles"><span>Écoles doctorales</span></li><!--
					--><li class="elm" data-popup="adum"><span>Mon espace personnel ADUM</span></li><!--
					--><li class="elm" data-popup="formations"><span>Catalogue de Formations transversales</span></li><!--
					--><li class="elm" data-popup="procedures"><span>Procédures et formulaires</span></li><!--
					--><li class="elm" data-popup="insertion"><span>Insertion professionnelle</span></li><!--
					--><li class="elm" data-popup="contacts"><span>Contacts</span></li>
				</ul>
			</section>
		</aside>
	</section>
	<aside class="FAQ">
		<?php 
			$args = array(
				'post_type' => 'actus-doct',
				'order'		=> 'ASC'
			); 
			$query = new WP_Query($args); 

			while($query->have_posts()):$query->the_post();
		?>
			<span class="faq-entry"><?php echo rwmb_meta('faq-entry', 'type=text') ?></span>
		<?php endwhile; ?>
	</aside>

	<div class="Popups">
		div.popup#ecoles
	</div>

</main>

<?php get_footer(); ?>