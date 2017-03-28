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
	 * Permet de supprimer certains liens de l'administration
	 * Il suffit d'ajouter les clés correspondantes au menus que vous
	 * souhaitez supprimer dans la variable $restricted
	 */
	add_action('admin_menu', 'remove_menu_items');
	function remove_menu_items() {
		global $menu;
		$restricted = array(__('Posts'), __('Comments'));
		end ($menu);
		while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
			  unset($menu[key($menu)]);
			}
		}
	}

	/**
	 * Déclaration des types de posts custom
	 * Éviter les identifiants trop longs, car ils ne sont pas pris en compte par wordpress et 
	 * ne s'afficheront pas dans l'admin
	 * Ex : "partenaires" fonctionne, "partenaires-recherche" ne fonctionne pas
	 */
	add_action('init', 'ubfc_custom_types');
	function ubfc_custom_types() {
		register_post_type('actus',
			array(
				'label' 		=> 'Actualité',
				'labels' 		=> array(
					'name' 					=> 'Actualités',
					'singular_name' 		=> 'Actualité',
					'all_items' 			=> 'Toutes les Actualités',
					'add_new_item' 			=> 'Ajouter une actualité',
					'edit_item' 			=> 'Modifier l\'actualité',
					'new_item' 				=> 'Nouvelle actualité',
					'view_itme' 			=> 'voir l\'actualité',
					'search_item' 			=> 'Rechercher parmis les actualités',
					'not_found' 			=> 'Pas d\'actualité trouvée',
					'not_found_in_trash' 	=> 'Pas d\'actualité trouvée dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-format-aside',
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')
			)
		);

		register_post_type('events',
			array(
				'label' 		=> 'Évènements',
				'labels' 		=> array(
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
				'menu_icon'		=> 'dashicons-calendar-alt',
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')
			)
		);

		register_post_type('equipes-search',
			array(
				'label' 		=> 'Équipes de recherche',
				'labels' 		=> array(
					'name' 					=> 'Équipes de recherche',
					'singular_name' 		=> 'Équipe de recherche',
					'all_items' 			=> 'Toutes les équipes',
					'add_new_item' 			=> 'Ajouter une équipe',
					'edit_item' 			=> 'Modifier l\'équipe',
					'new_item' 				=> 'Nouvelle équipe',
					'view_item' 			=> 'Voir l\'équipe',
					'search_items' 			=> 'Rechercher parmis les équipes',
					'not_found' 			=> 'Pas d\'équipe trouvée',
					'not_found_in_trash' 	=> 'Pas d\'équipe dans la corbeille'
				),
				'menu_icon' 	=> 'dashicons-groups',
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')
			)
		);

		register_post_type('partenaires-search',
			array(
				'label' 		=> 'Partenaires de recherche',
				'labels' 		=> array(
					'name' 					=> 'Partenaires de recherche',
					'singular_name' 		=> 'Partenaire de recherche',
					'all_items' 			=> 'Tous les partenaires',
					'add_new_item' 			=> 'Ajouter un partenaire',
					'edit_item' 			=> 'Modifier le partenaire',
					'new_item' 				=> 'Nouveau partenaire',
					'view_item' 			=> 'Voir le partenaire',
					'search_items' 			=> 'Rechercher parmis les partenaires',
					'not_found' 			=> 'Pas de partenaire trouvée',
					'not_found_in_trash' 	=> 'Pas de partenaire dans la corbeille'
				),
				'menu_icon' 	=> 'dashicons-awards',
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')
			)
		);

		register_post_type('master',
			array(
				'label' 		=> 'Master internationaux',
				'labels' 		=> array(
					'name' 					=> 'Master internationaux',
					'singular_name' 		=> 'Master international',
					'all_items' 			=> 'Tous les Master',
					'add_new_item' 			=> 'Ajouter un Master',
					'edit_item' 			=> 'Modifier le Master',
					'new_item' 				=> 'Nouveau Master',
					'view_item' 			=> 'Voir le Master',
					'search_items' 			=> 'Rechercher parmis les Master',
					'not_found' 			=> 'Pas de Master trouvé',
					'not_found_in_trash' 	=> 'Pas de Master dans la corbeille'
				),
				'menu_icon' 	=> 'dashicons-welcome-learn-more',
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')
			)
		);

		register_post_type('etablissement',
			array(
				'label' 		=> 'Établissements',
				'labels' 		=> array(
					'name' 					=> 'Établissements',
					'singular_name' 		=> 'Établissement',
					'all_items' 			=> 'Tous les établissements',
					'add_new_item' 			=> 'Ajouter un établissement',
					'edit_item' 			=> 'Modifier le établissement',
					'new_item' 				=> 'Nouveau établissement',
					'view_item' 			=> 'Voir le établissement',
					'search_items' 			=> 'Rechercher parmis les établissements',
					'not_found' 			=> 'Pas de établissement trouvé',
					'not_found_in_trash' 	=> 'Pas de Mastétablissementer dans la corbeille'
				),
				'menu_icon' 	=> 'dashicons-admin-multisite',
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')
			)
		);


		register_post_type('personnel',
			array(
				'label' 		=> 'Membres du personnel',
				'labels' 		=> array(
					'name' 					=> 'Membres du personnel',
					'singular_name' 		=> 'Membre du personnel',
					'all_items' 			=> 'Tous les membres du personnel',
					'add_new_item' 			=> 'Ajouter un membre',
					'edit_item' 			=> 'Modifier le membre',
					'new_item' 				=> 'Nouveau membre',
					'view_item' 			=> 'Voir le membre',
					'search_items' 			=> 'Rechercher parmis les membres',
					'not_found' 			=> 'Pas de membre trouvé',
					'not_found_in_trash' 	=> 'Pas de membre dans la corbeille'
				),
				'menu_icon' 	=> 'dashicons-businessman',
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')
			)
		);

		register_post_type('archives',
			array(
				'label'			=> 'Archives des conseils',
				'labels'		=> array(
					'name' 					=> 'Archives des conseils',
					'singular_name' 		=> 'Archive',
					'all_items' 			=> 'Toutes les archives',
					'add_new_item' 			=> 'Ajouter une archive',
					'edit_item' 			=> 'Modifier l\'archive',
					'new_item' 				=> 'Nouvellle archive',
					'view_item' 			=> 'Voir l\'archive',
					'search_items' 			=> 'Rechercher parmis les archives',
					'not_found' 			=> 'Pas d\'archive trouvée',
					'not_found_in_trash' 	=> 'Pas d\'archive dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-book-alt',
				'public'		=> true,
				'has_archive'	=> true,
				'supports'		=> array('title', 'excerpt', 'revisions')
			)
		);

		// Décommenter cette ligne si les modifications sur les custom posts types ne sont pas prises en compte 
		// flush_rewrite_rules(false);
	} 

	/**
	 * Déclaration des métabox : champs custom afin de compléter l'administration wordpress
	 * définition d'un préfix afin de ne pas entrer en conflit avec d'éventuels autres scripts
	 */
	$prefix = 'ubfc_';
	add_action('rwmb_meta_boxes', 'ubfc_metaboxes');
	function ubfc_metaboxes($meta_boxes) {
		$meta_boxes[] = array(
			'title' 	=> 'Informations générales',
			'pages' 	=> array('personnel'),
			'fields' 	=> array(
				array(
					'name' 		=> 'Nom',
					'type' 		=> 'text',
					'id' 		=> $prefix.'nom-personnel',
					'required' 	=> true
				),
				array(
					'name' 		=> 'Prénom',
					'type' 		=> 'text',
					'id' 		=> $prefix.'prenom-personnel',
					'required' 	=> true
				),
				array(
					'name' 			=> 'Fonction',
					'type' 			=> 'select_advanced',
					'placeholder' 	=> 'Sélectionner un champs',
					'options' 		=> array('Direction', 'Conseil Académique', 'Conseil d\'administration', 'Conseil des membres'),
					'id' 			=> $prefix.'fonction-personnel',
					'required' 		=> true
				)
			)
		);

		$meta_boxes[] = array(
			'title'		=> 'Gallerie',
			'pages' 	=> array('actus'),
			'fields'	=> array(
				array(
					'name'		=> 'Image principale',
					'type'		=> 'image_advanced',
					'id'		=> $prefix.'main-img',
					'required'	=> true,
					'desc'		=> "L'image principale est celle qui sera affichée en haut de l'article. Elle servira également de vignette."
				),
				array(
					'type' => 'divider'
				),
				array(
					'name'		=> 'Gallerie',
					'type'		=> 'image_advanced',
					'id'		=> $prefix.'gallery',
					'required'	=> true,
					'clone'		=> true
				)
			)
		);

		$meta_boxes[] = array(
			'title'		=> 'Détails de l\'évènement',
			'pages' 	=> array('events'),
			'fields'	=> array(
				array(
					'name' 			=> 'Date de début',
					'type' 			=> 'datetime',
					'id' 			=> $prefix.'dateDebut',
					'js_options' 	=> array(
						'dateFormat' => 'dd-mm-yy'
					),
					'required' 		=> true
				),
				array(
					'name' 			=> 'Date de fin',
					'type' 			=> 'datetime',
					'id' 			=> $prefix.'dateFin',
					'js_options' 	=> array(
						'dateFormat' => 'dd-mm-yy'
					),
					'required' 		=> true
				),
				array(
					'type' => 'divider'
				),
				array(
					'name'		=> 'Image principale',
					'type'		=> 'image_advanced',
					'id'		=> $prefix.'main-img',
					'required'	=> true,
					'desc'		=> "L'image principale est celle qui sera affichée en haut de l'article. Elle servira également de vignette."
				),
				array(
					'type' => 'divider'
				),
				array(
					'name'		=> 'Gallerie',
					'type'		=> 'image_advanced',
					'id'		=> $prefix.'gallery',
					'required'	=> true,
					'clone'		=> true
				),
				array(
					'type' => 'divider'
				),
				array(
					'name'	=> 'Planning',
					'type'	=> 'heading'
				),
				array(
					'name'		=> 'Entrée du planning',
					'type'		=> 'textarea',
					'id'		=> $prefix.'planning',
					'required'	=> true,
					'clone'		=> true,
				)
			)
		);

		$meta_boxes[] = array(
			'title' 	=> 'Archives PDF',
			'pages' 	=> array('archives'),
			'fields'	=> array(
				array(
					'name'			=> 'type de conseil',
					'desc'			=> "Sélectionner le type de conseil approprié",
					'type'			=> 'select',
					'id'			=> $prefix.'type_conseil',
					'placeholder'	=> 'Sélectionner un conseil',
					'options'		=> array('Conseil des membres', 'Conseil d\'administration', 'Conseil académique'),
					'required'		=> true
				),
				array(
					'type'	=> 'divider'
				),
				array(
					'name'		=> 'PDF',
					'desc'		=> "Lier le ou les fichier(s) PDF correspondant à la réunion tenue",
					'type'		=> 'file_advanced',
					'id'		=> $prefix.'archive',
					'required'	=> true,
					'clone'		=> true
				)
			)
		);

		return $meta_boxes;
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