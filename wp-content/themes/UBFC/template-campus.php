<?php
/*
Template Name: Campus
 */
?>

<?php
get_header();?>

<main>

	<section class="banniere campus">
	        <h1 class="blanc">Campus</h1>
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