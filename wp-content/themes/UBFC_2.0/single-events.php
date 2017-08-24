<?php get_header(); ?>

<main class="event">
	<?php while(have_posts()):the_post() ?>
		<h1><?php echo $jour ?> <?php echo $month ?> | <?php the_title(); ?></h1>
		<section class="content">
			<?php 
				$images = rwmb_meta('main-img-events', 'type=image_advanced&size=full');
				foreach($images as $image):
			?>
				<div class="img">
					<img class="img-princ" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
				</div>
			<?php endforeach; ?>
			<h3>Du <?php echo rwmb_meta('dateDebut-events', 'type=date'); ?> au <?php echo rwmb_meta('dateFin-events', 'type=date'); ?></h3>
			<?php the_content(); ?>
			<div class="gallery">
				<?php 
					$images = rwmb_meta('gallery-events', 'type=image_advanced&size=full');
					foreach($images as $image):
				?>
					<a href="<?php echo $image['url'] ?>" target='_blank'><div class="img" style="background-image: url('<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>');"></div></a>
				<?php endforeach ?>
			</div>

			<div class="planning">
				<?php echo rwmb_meta('planning-events') ?>
			</div>

		</section>
	<?php endwhile; ?>	
</main>

<?php get_footer(); ?>