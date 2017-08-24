<?php get_header(); ?>

<main>
	<?php while(have_posts()):the_post(); ?>
		<h1><?php the_title(); ?></h1>
	<?php endwhile; ?>
	<section class="liste-services">
		<?php $args = array(
				'post_type'	=> 'services',
				'order'		=> 'DESC',
				'posts_per_page' => 200
			);
			$query = new WP_query($args);
			while($query->have_posts()):$query->the_post()
		?>

			<?php 
				$fichiers = rwmb_meta('fichiers-service');
				if(empty($fichiers)):
			?>
				<a href="<?php echo rwmb_meta('url-service'); ?>" class="elm" target="_blank">
					<?php 
						$images = rwmb_meta('logo-service', 'type=image_advanced&size=full');
						foreach($images as $image):
					?>
						<div class="img-service" style="background-image: url('<?php echo $image['url'] ?>')"></div>
					<?php endforeach; ?>
					<div class="text">
						<h3><?php echo rwmb_meta('nom-service'); ?></h3>
					</div>
				</a>
			<?php  elseif(!empty($fichiers)): ?>
				<div class="elm">	
					<div class="block-fichiers">
						<?php foreach($fichiers as $fichier): ?>
							<a target="_blank" href="<?php echo $fichier['url'] ?>"><i class="ion-document-text"></i> <?php echo $fichier['title']; ?></a>
						<?php endforeach; ?>
					</div>
					<div class="text">
						<h3><?php echo rwmb_meta('nom-service'); ?></h3>
					</div>
				</div>
			<?php endif; ?>

			
		<?php endwhile; ?>
	</section>
</main>

<?php get_footer(); ?>