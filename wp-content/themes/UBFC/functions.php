<?php

add_action('after_setup_theme', 'plus_admin_bar');
function plus_admin_bar () {
    show_admin_bar(false);
}

add_theme_support('html5');
add_theme_support('menus');
add_theme_support('post-thumbnails');

/* Champs personalisé */

add_action('wp_enqueue_scripts', 'ubfc_styles');
function ubfc_styles() {
    wp_enqueue_style('fa', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('accueil', get_stylesheet_directory_uri() . '/css/accueil.css');
    wp_enqueue_style('general', get_stylesheet_directory_uri() . '/css/general.css');
    wp_enqueue_style('headerfooter', get_stylesheet_directory_uri() .'/css/header-footer.css');
    wp_enqueue_style('animation' , get_stylesheet_directory_uri() . '/css/animations.css');
    wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery-3.1.1.min.js');
    wp_enqueue_script('menu', get_stylesheet_directory_uri() . '/js/menu.js')   ;
}

add_action( 'init', 'ubfc_post_type' );


function ubfc_post_type() {
    register_post_type( 'actualite',
        array(
            'label' => 'Actualité',
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'excerpt' , 'editor', 'thumbnail' ),
        )
    );

    register_post_type( 'agenda',
        array(
            'label' => 'Agenda',
            'labels' => array(
                  'name' => 'Evènement',
                  'singular_name' => 'Evènement',
                  'all_items' => 'Tous les évènement',
                  'add_new_item' => 'Ajouter un évènement',
                  'edit_item' => 'Éditer l\'évènement',
                  'new_item' => 'Nouveau évènement',
                  'view_item' => 'Voir l\'évènement',
                  'search_items' => 'Rechercher parmi les évènement',
                  'not_found' => 'Pas d\'évènement trouvé',
                  'not_found_in_trash'=> 'Pas d\'évènement dans la corbeille'
                  ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'excerpt','editor','thumbnail', 'revisions'),
        )
    );

    register_post_type( 'equiperecherche',
        array(
            'label' => 'Equipe de recherche',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'excerpt','editor','thumbnail', 'revisions'),
        )

    );

    register_post_type( 'partenairerecherche',
        array(
            'label' => 'Partenaire de recherche',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'excerpt','editor','thumbnail', 'revisions'),
        )

    );

    register_post_type( 'masterinter',
        array(
            'label' => 'Master Internationaux',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'excerpt','editor','thumbnail', 'revisions'),
        )

    );

    register_post_type( 'etablissement',
        array(
            'label' => 'Etablissements',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'excerpt','editor','thumbnail', 'revisions'),
        )

    );

    register_post_type( 'direction',
        array(
            'label' => 'Le président et son équipe',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'excerpt','editor','thumbnail', 'revisions'),
        )

    );

    register_post_type( 'conseilaca',
        array(
            'label' => 'Membre conseil académique',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'excerpt','editor','thumbnail', 'revisions'),
        )

    );

    register_post_type( 'conseiladmin',
        array(
            'label' => 'Membre conseil d\'administration',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'excerpt','editor','thumbnail', 'revisions'),
        )

    );

    register_post_type( 'conseilmembres',
        array(
            'label' => 'Membre conseil des membres',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'excerpt','editor','thumbnail', 'revisions'),
        )

    );
   flush_rewrite_rules( false );
}