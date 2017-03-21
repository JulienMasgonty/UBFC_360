<?php
/*
Template Name: Recherche
 */
?>

<?php
get_header();?>

<main>

	<section class="banniere recherche">
        <h1 class="blanc">Recherche - Formation</h1>
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