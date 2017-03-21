<?php
/*
Template Name: Actualité
 */
?>

<?php
get_header();?>

<main>

	<section class="banniere actus">
	        <h1 class="blanc">Actualités</h1>
	</section>

	<?php
	while (have_posts()):the_post();
	    the_content();
	endwhile;
	?>

</main>

<?php
get_footer();
?>