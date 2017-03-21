<?php
/*
Template Name: UBFC
 */
?>

<?php
get_header();?>

<main>

	<section class="ubfc banniere">
	        <h1 class="blanc">UBFC</h1>
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