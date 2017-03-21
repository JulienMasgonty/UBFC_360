<?php get_header(); ?>
<style>
/*================ Section Logo =============*/
section.section-logo{
    background: url("<?php echo get_stylesheet_directory_uri() ?>/image-contenu/img/background.svg") no-repeat;
    background-size: cover;
    padding: 50px;
    height: 100vh;
}

section.section-logo > p.image-logo{
    display: block;
    text-indent: -999999px;
    height: 180px;
    width: 500px;
    background: url('<?php echo get_stylesheet_directory_uri() ?>/image-contenu/img/logo.svg') no-repeat;
    background-size: auto;
}

html, body{
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

main{
    position: relative;
    width: 100%;
    height: auto;
    overflow: hidden;
}

 header,
 header * {
    z-index: 200;
}

body {
    overflow: auto;
    -webkit-perspective: 1px;
    perspective: 1px;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
}
body, body main * {
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
}

button {
    padding: 1em;
    margin-right: 1em;
    border-bottom: 3px solid #078ACC;
    border-top: none;
    border-left: none;
    border-right: none;

}


article:first-of-type {
    padding-top: 500px;
    padding-bottom: 500px;

}

article:nth-of-type(2) {
    padding-top: 200px;
    padding-bottom: 300px;
}

article:nth-of-type(3) {
    padding-top: 400px;
    padding-bottom: 300px;
}

article:nth-of-type(4) {
    padding-top: 300px;
    padding-bottom: 300px;
}
.container {
    padding: 10%;
    max-width: 960px;
    margin: auto;
}

#violet {
    -webkit-transform: translateZ(-0.8px) scale(3);
    transform: translateZ(-0.8px) scale(3);
    z-index: -800;
    position: absolute;
    top: 100px;
    left: 0;
}

#vert {
    -webkit-transform: translateZ(-2px) scale(6);
    transform: translateZ(-2px) scale(6);
    z-index: -1000;
    position: absolute;
    top: 1000px;
    left: -1000px;
}

#bleuc {
    -webkit-transform: translateZ(-1px) scale(4);
    transform: translateZ(-1px) scale(4);
    z-index: -980;
    position: absolute;
    top: 3800px;
    left: 800px;
}

#orange {
    -webkit-transform: translateZ(-0.2px) scale(2.5);
    transform: translateZ(-0.2px) scale(2.5);
    z-index: -990;
    position: absolute;
    top: 4500px;
    left: 300px;
}

.parallax-border a {
    position: relative;
}

.parallax-border a::before {
    content: "";
    transform: translateZ(-0.2px) scale(1);
    position: absolute;
    border: 2px solid #DC931A;
    padding: 18px 60px;
    top: 0;
    left: -70px;
}


main p, main h2, main a {
    color: #000;
}
.fleche-centre {
    display: flex;
    justify-content: center;
    padding-top:50vh;
}

@media screen and (max-width: 980px){
    #violet {
        -webkit-transform: translateZ(-2px) scale(8);
        transform: translateZ(-2px) scale(8);
        z-index: -800;
        position: absolute;
        top: 100px;
        left: 0;
    }

    #vert {
        -webkit-transform: translateZ(-0.5px) scale(5);
        transform: translateZ(-0.5px) scale(5);
        z-index: -1000;
        position: absolute;
        top: 700px;
        left: -400px;
    }

    #bleuc {
        -webkit-transform: translateZ(-1.5px) scale(7);
        transform: translateZ(-1.5px) scale(7);
        z-index: -980;
        position: absolute;
        top: 2800px;
        left: 800px;
    }

    #orange {
        -webkit-transform: translateZ(-2px) scale(10);
        transform: translateZ(-2px) scale(10);
        z-index: -990;
        position: absolute;
        top: 2500px;
        left: -300px;
    }

    article:first-of-type {
        padding-top: 300px;
        padding-bottom: 200px;

    }

    article:nth-of-type(2) {
        padding-top: 50px;
        padding-bottom: 100px;
    }

    article:nth-of-type(3) {
        padding-top: 200px;
        padding-bottom: 200px;
    }

    article:nth-of-type(4) {
        padding-top: 50px;
        padding-bottom: 100px;
    }

    section.section-logo{
        background: url("<?php echo get_stylesheet_directory_uri() ?>/image-contenu/img/background.svg") no-repeat;
        padding: 50px;
        width: 100%;
        height: auto;
    }

    section.section-logo > p.image-logo{
        display: block;
        text-indent: -999999px;
        height: 150px;
        width: 300px;
        background: url('<?php echo get_stylesheet_directory_uri() ?>/image-contenu/img/logo.svg') no-repeat;
        background-size: auto;
    }

    .barres {
        padding-bottom:15px;
    }

    nav {
        height:55px;
    }

    .fleche-centre img {
        display: none;
    }


}
</style>
<main class="accueil">
     <section class="section-logo">
        <p class="image-logo">Logo Ubfc</p>
        <div class="fleche-centre">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/image-interface/fleche.svg" id="fleche" alt="Descendez pour découvrir le site">
        </div>
    </section>

    <img id="violet" src="<?php echo get_stylesheet_directory_uri() ?>/image-contenu/img/violet.svg" alt="ligne violet">
    <article class="principale lisible">
        <h2 class="gris lg-top">Actualités</h2>
        <p>Voici un petit tour d’horizons de notre COMUE !</p>
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
    </article>

    <img id="vert" src="<?php echo get_stylesheet_directory_uri() ?>/image-contenu/img/vert.svg" alt="ligne verte">
    <article class="principale">

        <h2 class="gris lg-top">Agenda</h2>
        <p>Suivez les évènements d'UBFC grâce à l'agenda</p>
        <div class="containerx2">
        <?php
        $args = array(
                    'post_type' => 'agenda',
                    'posts_per_page' => 4
                );

                $query = new WP_Query($args);?>
            <?php while ($query->have_posts()):$query->the_post(); ?>
            <div>
                <p><a href="<?php the_permalink(); ?>"><span class="orange gras"><?php the_field('date');?></span><span class="gras"><?php the_title(); ?></span></p>
                <p><?php the_excerpt(); ?></p></a>
            </div>
    <?php endwhile; ?>
        </div>
        <a href="<?php echo get_post_type_archive_link( 'agenda' ); ?>" class="savoir-plus">Accéder à tout les évènements</a>
        </div>
    </article>

    <img id="bleuc" src="<?php echo get_stylesheet_directory_uri() ?>/image-contenu/img/bleuc.svg" alt="ligne bleu">
    <article class="principale">
        <h2 class="gris lg-top">Focus sur</h2>
        <div class="col-2-txt">
            <div class="parallax-border">
                <p>Venez découvrir étudiants ou enseignants partageant leurs expériences au sein de l’UBFC !</p>
                <a href="" class="savoir-plus">En savoir plus</a>
            </div>
            <div>
                <img src="" alt="#">
            </div>
        </div>
    </article>

    <img id="orange" src="<?php echo get_stylesheet_directory_uri() ?>/image-contenu/img/orange.svg" alt="ligne orange">
    <article class="principale">
        <div class="col-2-txt">
            <div>
                <h2 class="gris lg-top">Contact</h2>
                <p>Des questions ? Des suggestions ? Ou tout simplement l’envie de nous faire un petit coucou ?
                    N’hésitez pas à nous contacter !</p>
            </div>
            <div>
                <h4 class="centre">Rejoignez UBFC sur les réseaux sociaux !</h4>
                <div class="reseaux">
                    <a class="facebook">facebook</a>
                    <a class="twitter">twitter</a>
                    <a class="youtube">youtube</a>
                </div>
                <h4 class="centre">Abonnez vous à la newsletter</h4>
                <form method="post" action="traitement.php">
                    <input type="text" name="mail" id="mail" placeholder="Ex : mail@gmail.fr" size="30"
                           maxlength="10"/>
                    <button class="btn btn-1 centre">
                        Valider
                    </button>
                </form>
            </div>
        </div>
    </article>
</main>

<?php get_footer(); ?>
