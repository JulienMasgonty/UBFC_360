<?php
/*
Template Name: Formation
 */
?>

<?php
get_header();?>

<main>

	<section class="banniere formation">
            <h1 class="blanc">Formation - Recherche</h1>
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