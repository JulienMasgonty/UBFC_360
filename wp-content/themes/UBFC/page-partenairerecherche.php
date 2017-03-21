<?php get_header(); ?>
<main>
<section class="banniere formation">
        <h1 class="blanc">Formation - Recherche</h1>
    </section> 

    <article class="principale">
        <h2 class="bleu-clair">Partenaire de recherche</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi consequatur culpa debitis
            dignissimos dolores, earum expedita facilis harum illo, laudantium magnam non odio odit officiis qui quod
            repudiandae voluptates.</p>

        <div class="containerx3">

         <?php

                $args = array(
                    'post_type' => 'partenairerecherche'
                );

                $query = new WP_Query($args);


                while ($query->have_posts()):$query->the_post(); ?>

            <div>
                <a href="">
                    <figure>
                        <?php the_post_thumbnail(); ?>
                        <figcaption>
                            <h3 class="blanc"><?php the_title();?></h3>
                            <p class="blanc"><?php the_excerpt(); ?></p>
                        </figcaption>
                    </figure>
                </a>
            </div>
         <?php endwhile; ?>

        </div>
    </article>
</main>
    <?php get_footer(); ?>