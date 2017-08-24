<?php get_header(); ?>

<main class="generic-page">
	<?php while(have_posts()):the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<div class="container-content">
			<div class="nav-content">
				<ul>
					<!-- généré par JS -->
				</ul>
			</div>
			<section class="content">
				<?php the_content(); ?>
			</section>
		</div>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>