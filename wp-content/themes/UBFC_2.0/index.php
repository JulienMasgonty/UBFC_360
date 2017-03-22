
<?php get_header(); ?>

<main>
	<h1>UBFC 2.0</h1>

	<?php while(have_posts()):the_post() ?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p><?php the_content(); ?></p>
	<?php endwhile ?>
</main>

<?php get_footer(); ?>