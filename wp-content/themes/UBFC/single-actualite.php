<?php
get_header();
?>

    <section class="actus banniere">
        <h1 class="blanc">Actualités</h1>
    </section>

    <article class="principale">
	    <?php

			while (have_posts()):the_post();
	    ?>

        <h2 class="orange"><?php the_title();?></h2>
        <?php the_post_thumbnail(); ?>
        <p><?php the_content();?></p>

        <?php endwhile;?>
    </article>





<?php

get_footer();

?>