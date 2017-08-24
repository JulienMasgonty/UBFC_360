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
		<section class="liste-temoignages">
			<?php 
				$args = array (
					'post_type'	=> 'temoignage',
					'order'		=> 'DESC'
				);
				$query = new WP_Query($args);

				// NOT WORKING
				// =====================
				while($query->have_posts()):$query->the_post() 
			?>

				<?php 
					$url = rwmb_meta('url-tem');
					$contenu = rwmb_meta('content-tem'); 

					if(empty($contenu)):
				?>
					<a href="<?php echo $url ?>" target="_blank" class="temoignage externe">
						<?php 
							$images = rwmb_meta('img-tem', 'type=image_advanced&size=full');
							foreach($images as $image): 
						?>
							<div class="img" style="background-image: url('<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>');"></div>
						<?php endforeach; ?>
						<h3><?php the_title(); ?></h3>
					</a>
				<?php 
					endif; 
					if(!empty($contenu)):
				?>
					<a href="<?php echo $url ?>" target="_blank" class="temoignage texte">
						<?php 
							$images = rwmb_meta('img-tem', 'type=image_advanced&size=full');
							foreach($images as $image): 
						?>
								<div class="img" style="background-image: url('<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>');"></div>
						<?php endforeach; ?>
						<div class="txt">
							<h3><?php the_title(); ?></h3>
							<p>
								<?php echo $contenu; ?>
							</p>
						</div>
					</a>
				<?php endif; ?>


			<?php endwhile; ?>
		</section>
</main>

<?php get_footer(); ?>