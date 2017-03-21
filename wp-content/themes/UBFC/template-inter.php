<?php
/*
Template Name: International
 */
?>

<?php
get_header();?>

<main>

	<section class="banniere international">
        <h1 class="blanc">International</h1>
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