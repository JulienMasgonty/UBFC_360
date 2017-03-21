<?php get_header(); ?>

<section class="ubfc banniere">
        <h1 class="blanc">UBFC</h1>
    </section>

    <article class="principale">
        <h2 class="bleu-fonce">La direction</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi culpa deserunt dignissimos dolore doloremque earum, eligendi enim eos est facilis mollitia necessitatibus perspiciatis praesentium quas reprehenderit rerum sapiente sint?</p>
        <div class="containerx2">


        <?php

                $args = array(
                    'post_type' => 'direction'
                );

                $query = new WP_Query($args);


                while ($query->have_posts()):$query->the_post(); ?>


            <div class="fiche">
                <h4 class="bleu-fonce"><?php the_field('nom');?> <?php the_field('prenom');?></h4>
                <div>
                    <?php the_post_thumbnail(); ?>
                </div>
                <p class="noir"><?php the_excerpt(); ?></p>
                <!--<a href="<?php //the_permalink(); ?>" class="savoir-plus noir">Voir la fiche complète</a>-->
            </div>
            <?php endwhile; ?>
        </div>
    </article>

    <?php get_footer(); ?>