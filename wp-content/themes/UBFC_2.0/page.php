<?php get_header(); ?>

<main>
	<?php while(have_posts()):the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<div class="container-content">
			<section class="content">
				<?php the_content(); ?>
			</section>
		</div>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>