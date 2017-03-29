<?php get_header(); ?>

<main>
	<?php while(have_posts()):the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<section class="content">
			<?php the_content(); ?>			
		</section>
	<?php endwhile; ?>
		<section class="liste-actus">
			<?php 
				$args = array(
					'post_type'	=> 'actus',
					'order'		=> 'DESC'
				);
				$query = new WP_query($args);

				while($query->have_posts()):$query->the_post()
			?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php endwhile; ?>
		</section>
</main>

<?php get_footer(); ?>