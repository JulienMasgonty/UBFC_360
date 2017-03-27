<?php 

	/**
	 * masque la barre d'administration
	 */
	add_action('after_setup_theme', 'no_admin_bar');
	function no_admin_bar() {
		show_admin_bar(false);
	}

	/**
	 * ajout de fonctionnalités/supports à wordpress
	 */
	add_theme_support('html5');
	add_theme_support('menus');
	add_theme_support('post-thumbnail');

	/**
	 * liaison des css et js
	 */
	add_action('wp_enqueue_scripts', 'ubfc_styles');
	function ubfc_styles() {
		wp_enqueue_style('fa', get_stylesheet_directory_uri() . '/src/fa/css/font-awesome.min.css');
		wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css');

		wp_enqueue_script('main', get_stylesheet_directory_uri() . '/src/js/main.js', array('jquery'));
	}

	/**
	 * Déclaration des types de posts custom
	 */
	add_action('init', 'ubfc_custom_types');
	function ubfc_custom_types() {
		register_post_type('actus',
			array(
				'label' 		=> array(
					'name' => 'Actualités',
					'singular_name' => 'Actualité',
					'all_items' => 'Toutes les Actualités',
					'add_new_item' => 'Ajouter une actualité',
					'edit_item' => 'Modifier l\'actualité',
					'new_item' => 'Nouvelle actualité',
					'view_itme' => 'voir l\'actualité',
					'search_item' => 'Rechercher parmis les actualités',
					'not_found' => 'Pas d\'actualité trouvée',
					'not_found_in_trash' => 'Pas d\'actualité trouvée dans la corbeille'
				),
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'excerpt', 'thumbnail')
			)
		);

		register_post_type('events',
			// Définition des évènements
			array(
				'label' 		=> array(
					'name' 					=> 'Évènements',
					'singular_name' 		=> 'Évènement',
					'all_items' 			=> 'Tous les évènement',
					'add_new_item' 			=> 'Ajouter un évènement',
					'edit_item' 			=> 'Modifier l\'évènement',
					'new_item' 				=> 'Nouveau évènement',
					'view_item' 			=> 'Voir l\'évènement',
					'search_items' 			=> 'Rechercher parmi les évènement',
					'not_found' 			=> 'Pas d\'évènement trouvé',
					'not_found_in_trash'	=> 'Pas d\'évènement dans la corbeille'
				),
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'excerpt', 'thumbnail')
			)
		);
	} 

/**
 * Pour aider à trouver les templates à utiliser - à supprimer une fois le code terminé
 */
function debug_template() {
        global $template;
        $affiche_template = print_r( $template , true );
        $affiche_body_class = print_r(get_body_class(), true);
        $affiche_debug = <<<EOD
Fichier de template :
$affiche_template
Body class
$affiche_body_class
EOD;
        // en commentaire dans le code HTML
        echo("<!--\n$affiche_debug\n-->");
        // Par JS dans la console
        /*$json_debug = json_encode($affiche_debug);
        echo("<script>console.log($json_debug)</script>");*/
}
add_action('wp_footer','debug_template');

?>