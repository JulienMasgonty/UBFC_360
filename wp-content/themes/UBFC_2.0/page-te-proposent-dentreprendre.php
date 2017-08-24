<?php get_header(); ?>

<main class="listing-page">
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
		<section class="liste-etab-entreprendre">
			<?php 
				$args = array (
					'post_type'	=> 'etablissement',
					'orderby'	=> 'title'
				);
				$query = new WP_Query($args);

				while($query->have_posts()):$query->the_post();
			?>
				<?php 
					$url = rwmb_meta('lien-entr');
					
					if(!empty($url)):
				?>
					<a target="_blank" href="<?php echo $url ?>" class="etab">
						<?php 
							$images = rwmb_meta('logo-etablissement', 'type=image_advanced&size=full');
							foreach($images as $image):
						?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						<?php endforeach; ?>
						<p>
							<?php echo rwmb_meta('desc-entr'); ?>
						</p>
					</a>
				<?php endif; ?>
			<?php endwhile; ?>
		</section>
</main>

<?php get_footer(); ?>