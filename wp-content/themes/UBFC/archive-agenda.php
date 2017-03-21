<?php

get_header();
?>

   <section class="banniere actus">
	        <h1 class="blanc">Agenda</h1>
	</section>

    <section class="principale">

        <h2 class="orange">Liste des Evenements</h2>
        <?php
        while (have_posts()):the_post(); ?>
        <div class="archive">
            <p><a href="<?php the_permalink(); ?>"><span class="orange gras"><?php the_field('date');?></span><span class="gras"><?php the_title(); ?></span></p>
                <p><?php the_excerpt(); ?></p></a>
        </div>


        <?php endwhile; ?>
    </section>
<?php
get_footer();

?>