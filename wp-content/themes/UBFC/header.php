<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php wp_title("|",true,"right") ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header>
    <nav class="hidden">
        <!--Reseau sociaux-->
        <ul class="reseau-sociaux">
            <li><a href="http://facebook.com" class="image-nav facebook">facebook</a></li>
            <li><a href="https://twitter.com/univ_bfc?lang=fr" class="image-nav twitter">twitter</a></li>
            <li><a href="https://www.youtube.com/channel/UCE1eeKLhNl8cUHEyuEqgurw" class="image-nav youtube">youtube</a></li>
        </ul>
        <!--Menu-->

        <div class="barres">
            <span class="barre"></span>
            <span class="barre"></span>
            <span class="barre"></span>
        </div>

        <!--Menu caché-->
        <div class="menucache">
            <div class="barre1">
                <h1 class="blanc"><a class="blanc" href="<?php echo esc_url(home_url()); ?>">Accueil</a></h1>
                <div class="champs">
                    <input type="search" placeholder="Recherche" name="search"><i class="fa fa-search"
                                                                                  aria-hidden="true"></i>
                </div>
            </div>
            <div class="barre2">
                <?php wp_nav_menu( array(
                    'menu'   => 'menu UBFC',
                    'container' => false
                ) ); ?>
                <?php wp_nav_menu( array(
                    'menu'   => 'menu formationrecherche',
                    'container' => false
                ) ); ?>
                <?php wp_nav_menu( array(
                    'menu'   => 'menu ecolesdoctorales',
                    'container' => false
                ) ); ?>
                <ul class="menu">
                    <li><a href="http://www.ubfc.fr/projet-i-site/">ISITE - BFC</a></li>
                </ul>
                <ul class="menu">
                    <li><a href="http://www.ubfc.fr/pepite/">Entreprenariat étudiant - PEPITE</a></li>
                </ul>
                <?php wp_nav_menu( array(
                    'menu'   => 'menu international',
                    'container' => false
                ) ); ?>
                <?php wp_nav_menu( array(
                    'menu'   => 'menu vieetudiante',
                    'container' => false
                ) ); ?>
            </div>
        </div>
    </nav>
</header>