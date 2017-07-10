<?php get_header(); ?>

<main>
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
		<section class="liste-archives">
			<?php $args = array(
					'post_type'	=> 'archives',
					'order'		=> 'DESC',
					'posts_per_page' => 200
				);
				$query = new WP_query($args);
				while($query->have_posts()):$query->the_post()
			?>
				<?php $custom_fields = get_post_custom(); ?>

				<?php if ( rwmb_meta('type-conseil') == 2 ) { ?>
					<div class="elm">
						<h3><?php echo rwmb_meta('lib-archive'); ?></h3>
						<?php 
							$files = rwmb_meta( 'archive-conseil' );


							if ( !empty( $files ) ) {
							    foreach ( $files as $file ) { ?>
									<h4><a target="_blank" href="<?php echo $file['url']; ?>"><i class="ion-document-text"></i> <?php echo $file['title']; ?></a></h4>
							    <?php }
							} 
						?>
					</div>
				<?php } ?>
				
			<?php endwhile; ?>
		</section>
</main>

<?php get_footer(); ?>