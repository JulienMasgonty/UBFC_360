<?php get_header(); ?>

    <section class="banniere actus">
	        <h1 class="blanc">Actualités</h1>
	</section>

<article class="principale">

    <h2 class="orange">Liste des actualités</h2>

    <article class="principale">
        <h2 class="orange centre">À la une</h2>
        <div class="col-2-img">
            <div class="containerx2">
            <?php

                $args = array(
                    'post_type' => 'actualite',
                    'posts_per_page' => 4
                );

                $query = new WP_Query($args);


                while ($query->have_posts()):$query->the_post(); ?>
                <div>
                    <a href="<?php the_permalink(); ?>">
                        <figure>
                            <?php the_post_thumbnail(); ?>
                            <figcaption>
                                <h3 class="blanc"><?php the_title(); ?></h3>
                                <p class="blanc"><?php the_excerpt(); ?></p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
            <div>
                <a class="twitter-timeline" data-height="400" data-link-color="#E95F28"
                   href="https://twitter.com/Univ_BFC">Tweets by Univ_BFC</a>
                <script async src="http://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </article>

<article class="principale">
        <h2 class="orange">Archives des actualités</h2>
        <div>
        <?php while (have_posts()):the_post(); ?>
            <div class="archive">
                <p><span class="gras orange"><?php the_title(); ?></span><?php the_excerpt(); ?><a href="<?php the_permalink(); ?>" class="savoir-plus">En savoir plus</a></p>
            </div>
        <?php endwhile; ?>
        </div>
</article>


<?php
get_footer();

?>