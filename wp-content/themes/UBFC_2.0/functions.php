<?php 
	
	/**
	 * Au cas où Metabox serait désactivé, empêche l'erreur 'undefined function rwmb_meta()'
	 */
	if ( ! function_exists( 'rwmb_meta' ) ) {
		function rwmb_meta( $key, $args = '', $post_id = null ) {
			return false;
		}
	}

	/**
	 * masque la barre d'administration
	 */
	add_action('after_setup_theme', 'no_admin_bar');
	function no_admin_bar() {
		show_admin_bar(false);
	}

	/**
	 * Ajout de tailles d'images perso
	 */
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'thumb-gall', 300, 200, array(center, center) );
	}

	/**
	 * Ajout de ces tailles d'images aux options de média de wordpress
	 */
	add_filter('image_size_names_choose', 'add_custom_thumb');
	function add_custom_thumb($sizes) {
		$addsizes = array(
			"thumb-gall" => __( "Vignette gallerie")
		);
		$newsizes = array_merge($sizes, $addsizes);
		return $newsizes;
	}

	/* Autoriser les fichiers SVG */
	function wpc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'wpc_mime_types');

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
		// General news - now merged with events
		// ============================================
		// 
		/*register_post_type('actus',
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
				'supports' 		=> array('title', 'editor', 'thumbnail', 'revisions')
			)
		);
*/

		register_post_type('focus',
			array(
				'label' 		=> 'Focus',
				'labels' 		=> array(
					'name' 					=> 'Focus',
					'singular_name' 		=> 'Focus',
					'all_items' 			=> 'Tous les focus',
					'add_new_item' 			=> 'Ajouter un focus',
					'edit_item' 			=> 'Modifier le focus',
					'new_item' 				=> 'Nouveau focus',
					'view_item' 			=> 'Voir le focus',
					'search_items' 			=> 'Rechercher parmi les focus',
					'not_found' 			=> 'Pas de focus trouvé',
					'not_found_in_trash'	=> 'Pas de focus dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-admin-post',
				'public' 		=> true,
				'has_archive' 	=> true,
				'supports' 		=> array('title', 'editor', 'thumbnail', 'revisions')
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
				'supports' 		=> array('title', 'editor', 'thumbnail', 'revisions')
			)
		);

		register_post_type('actus-doctorat',
			array(
				'label'		=> 'Actualités doctorale',
				'labels'	=> array(
					'name' 					=> 'Actualités doctorales',
					'singular_name' 		=> 'Actualité doctorale',
					'all_items' 			=> 'Toutes les Actualités doctorales',
					'add_new_item' 			=> 'Ajouter une actualité doctorale',
					'edit_item' 			=> 'Modifier l\'actualité doctorale',
					'new_item' 				=> 'Nouvelle actualité doctorale',
					'view_itme' 			=> 'voir l\'actualité doctorale',
					'search_item' 			=> 'Rechercher parmis les actualités doctorales',
					'not_found' 			=> 'Pas d\'actualité trouvée doctorale',
					'not_found_in_trash' 	=> 'Pas d\'actualité doctorale trouvée dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-welcome-write-blog',
				'public'		=> true,
				'has_archive'	=> true,
				'supports'		=> array('title')
			)
		);

		/*register_post_type('equipes-search',
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
				'supports' 		=> array('title', 'editor', 'thumbnail', 'revisions')
			)
		);*/

		/*register_post_type('partenaires-search',
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
				'supports' 		=> array('title', 'editor', 'thumbnail', 'revisions')
			)
		);*/

		/*register_post_type('master',
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
				'supports' 		=> array('title', 'editor', 'thumbnail', 'revisions')
			)
		);*/

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
				'supports' 		=> array('title', 'revisions')
			)
		);


		/*register_post_type('personnel',
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
				'supports' 		=> array('title', 'revisions')
			)
		);*/

		register_post_type('archives',
			array(
				'label'			=> 'Archives des conseils',
				'labels'		=> array(
					'name' 					=> 'Archives des conseils',
					'singular_name' 		=> 'Archive',
					'all_items' 			=> 'Toutes les archives',
					'add_new_item' 			=> 'Ajouter une archive',
					'edit_item' 			=> 'Modifier l\'archive',
					'new_item' 				=> 'Nouvelle archive',
					'view_item' 			=> 'Voir l\'archive',
					'search_items' 			=> 'Rechercher parmis les archives',
					'not_found' 			=> 'Pas d\'archive trouvée',
					'not_found_in_trash' 	=> 'Pas d\'archive dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-book-alt',
				'public'		=> true,
				'has_archive'	=> true,
				'supports'		=> array('title', 'revisions')
			)
		);

		register_post_type('services',
			array(
				'label'			=> 'Services',
				'labels'		=> array(
					'name' 					=> 'Services',
					'singular_name' 		=> 'Service',
					'all_items' 			=> 'Touts les services',
					'add_new_item' 			=> 'Ajouter un service',
					'edit_item' 			=> 'Modifier le service',
					'new_item' 				=> 'Nouveau service',
					'view_item' 			=> 'Voir le service',
					'search_items' 			=> 'Rechercher parmis les services',
					'not_found' 			=> 'Pas de service trouvée',
					'not_found_in_trash' 	=> 'Pas de service dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-welcome-widgets-menus',
				'public'		=> true,
				'has_archive'	=> true,
				'supports'		=> array('title', 'revisions')
			)
		);

		register_post_type('recherche',
			array(
				'label'			=> 'Laboratoires de Recherche entrepreneuriat',
				'labels'		=> array(
					'name'					=> 'Laboratoires',
					'singular_name'			=> 'Laboratoire',
					'all_item'				=> 'Tous les labratoires',
					'add_new_item'			=> 'Ajouter un laboratoire',
					'edit_item'				=> 'Modifier le service',
					'new_item'				=> 'Nouveau laboratoire',
					'view_item'				=> 'Voir le laboratoire',
					'view_item'				=> 'Rechercher parmis les laboratoires',
					'not_found'				=> 'Pas de laboratoire trouvé',
					'not_found_in_trash'	=> 'Pas de laboratoire trouvé dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-search',
				'public'		=> true,
				'has_archive'	=> true,
				'supports'		=> array('title', 'revisions')
			)
		);

		register_post_type('temoignage',
			array(
				'label'			=> 'Témoignages',
				'labels'		=> array(
					'name'					=> 'Témoignages',
					'singular_name'			=> 'Témoignage',
					'all_item'				=> 'Tous les témoignages',
					'add_new_item'			=> 'Ajouter un témoignage',
					'edit_item'				=> 'Modifier le témoignage',
					'new_item'				=> 'Nouveau témoignage',
					'view_item'				=> 'Voir le témoignage',
					'view_item'				=> 'Rechercher parmis les témoignages',
					'not_found'				=> 'Pas de témoignage trouvé',
					'not_found_in_trash'	=> 'Pas de témoignage trouvé dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-format-chat',
				'public'		=> true,
				'has_archive'	=> true,
				'supports'		=> array('title', 'revisions')
			)
		);

		register_post_type('box-doctorat',
			array(
				'label'			=> 'Box doctorat',
				'labels'		=> array(
					'name'					=> 'Box doctorat',
					'singular_name'			=> 'Box doctorat',
					'all_item'				=> 'Toutes les box',
					'add_new_item'			=> 'Ajouter une box',
					'edit_item'				=> 'Modifier la box',
					'new_item'				=> 'Nouvelle box',
					'view_item'				=> 'Voir la box',
					'view_item'				=> 'Rechercher parmis les box',
					'not_found'				=> 'Pas de box trouvée',
					'not_found_in_trash'	=> 'Pas de box trouvée dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-screenoptions',
				'public'		=> true,
				'has_archive'	=> true,
				'supports'		=> array('title', 'revisions')
			)
		);

		register_post_type('mode-emploi',
			array(
				'label'			=> 'Mode d\'emploi',
				'labels'		=> array(
					'name'					=> 'Modes d\'emploi',
					'singular_name'			=> 'Mode d\'emploi',
					'all_item'				=> 'Tous les modes d\'emploi',
					'add_new_item'			=> 'Ajouter un Modes d\'emploi',
					'edit_item'				=> 'Modifier le Modes d\'emploi',
					'new_item'				=> 'Nouveau Modes d\'emploi',
					'view_item'				=> 'Voir le Modes d\'emploi',
					'view_item'				=> 'Rechercher parmis les Modes d\'emploi',
					'not_found'				=> 'Pas de Modes d\'emploi trouvée',
					'not_found_in_trash'	=> 'Pas de Modes d\'emploi trouvée dans la corbeille'
				),
				'menu_icon'		=> 'dashicons-media-archive',
				'public'		=> true,
				'has_archive'	=> true,
				'supports'		=> array('title', 'revisions')
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
		/*$meta_boxes[] = array(
			'title' 	=> 'Informations générales',
			'pages' 	=> array('personnel'),
			'fields' 	=> array(
				array(
					'name'		=> 'Photo',
					'type'		=> 'image_advanced',
					'id'		=> $prefix.'img-personnel',
					'required'	=> true
				),
				array(
					'name' 		=> 'Nom',
					'type' 		=> 'text',
					'id' 		=> $prefix.'nom-personnel',
					'required' 	=> true
				),
				array(
					'name' 		=> 'Fonction',
					'type' 		=> 'text',
					'id' 		=> $prefix.'fonction-personnel',
					'required' 	=> true
				),
				array(
					'name'		=> 'mail',
					'type'		=> 'text',
					'id'		=> $prefix.'mail-personnel',
					'required'	=> true
				)
			)
		);*/

		$meta_boxes[] = array(
			'title'		=> 'Image',
			'pages'		=> array('focus'),
			'fields'	=> array(
				array(
					'name'			=> 'Image',
					'type'			=> 'image_advanced',
					'id'			=> $prefix.'img-focus',
					'required'		=> true,
					'max_file_uploads'	=> 1
				)
			)
		);

		$meta_boxes[] = array(
			'title'		=> 'infos',
			'pages'		=> array('actus-doctorat'),
			'fields'	=> array(
				array(
					'name'		=> 'Date',
					'type'		=> 'date',
					'id'		=> $prefix.'date-actu-doct',
					'required'	=> true,
					'desc'		=> 'Date de l\'évènement'
				),
				array(
					'name'		=> 'Actualité',
					'type'		=> 'text',
					'id'		=> $prefix.'content-actu-doct',
					'required'	=> true
				)
			)
		);
		// General News - now merged with events
		// =============================================
		// 
/*		$meta_boxes[] = array(
			'title'		=> 'Infos',
			'pages' 	=> array('actus'),
			'fields'	=> array(
				array(
					'name'			=> 'Image principale',
					'type'			=> 'image_advanced',
					'id'			=> $prefix.'main-img-actus',
					'required'		=> true,
					'desc'			=> "L'image principale est celle qui sera affichée en haut de l'article. Elle servira également de vignette.",
					'max_file_uploads'	=> 1
				),
				array(
					'type' 	=> 'divider'
				),
				array(
					'name'		=> 'Gallerie',
					'type'		=> 'image_advanced',
					'id'		=> $prefix.'gallery-actus',
					'required'	=> true
				),
				array(
					'type'	=> 'divider'
				)
			)
		);*/

		$meta_boxes[] = array(
			'title'		=> 'Détails de l\'Établissement',
			'pages'		=> array('etablissement'),
			'fields'	=> array(
				array(
					'name'		=> 'Sigle',
					'type'		=> 'text',
					'id'		=> $prefix.'sigle-etablissement',
					'required'	=> true
				),
				array(
					'type'		=> 'divider'
				),
				array(
					'name'			=> 'Logo',
					'type'			=> 'image_advanced',
					'id'			=> $prefix.'logo-etablissement',
					'required'		=> true,
					'max_file_uploads'	=> 1
				),
				array(
					'type'		=> 'divider'
				),
				array(
					'name'		=> 'Couleur représentative',
					'type'		=> 'color',
					'id'		=> $prefix.'col-etablissement',
					'required'	=> false
				),
				array(
					'type'		=> 'divider'
				),
				array(
					'name'		=> 'URL',
					'type'		=> 'url',
					'id'		=> $prefix.'link-etablissement',
					'required'	=> true
				),
				array(
					'name'		=> 'Lien vers la liste de formations',
					'type'		=> 'url',
					'id'		=> $prefix.'link-formations-etablissement',
					'required'	=> true
				),
				array(
					'type'		=> 'divider'
				),
				array(
					'name'		=> 'Lien entrepreneuriat',
					'type'		=> 'url',
					'id'		=> $prefix.'lien-entr',
					'required'	=> false
				),
				array(
					'name'		=> 'Description entrepreneuriat',
					'type'		=> 'WYSIWYG',
					'id'		=> $prefix.'desc-entr',
					'required'	=> false,
				)
			)
		);

		$meta_boxes[] = array(
			'title'		=> 'Détails de l\'évènement',
			'pages' 	=> array('events'),
			'fields'	=> array(
				array(
					'name' 			=> 'Date de début',
					'type' 			=> 'date',
					'id' 			=> $prefix.'dateDebut-events',
					'js_options' 	=> array(
						'dateFormat' => 'dd MM yy'
					),
					'required' 		=> true
				),
				array(
					'name' 			=> 'Date de fin',
					'type' 			=> 'date',
					'id' 			=> $prefix.'dateFin-events',
					'js_options' 	=> array(
						'dateFormat' => 'dd MM yy'
					),
					'required' 		=> true
				),
				array(
					'type' => 'divider'
				),
				array(
					'name'			=> 'Image principale',
					'type'			=> 'image_advanced',
					'id'			=> $prefix.'main-img-events',
					'required'		=> true,
					'desc'			=> "L'image principale est celle qui sera affichée en haut de l'article. Elle servira également de vignette.",
					'max_file_uploads'	=> 1
				),
				array(
					'type' => 'divider'
				),
				array(
					'name'		=> 'Gallerie',
					'type'		=> 'image_advanced',
					'id'		=> $prefix.'gallery-events',
					'required'	=> true
				),
				array(
					'type' => 'divider'
				),
				array(
					'name'		=> 'Entrée du planning',
					'type'		=> 'WYSIWYG',
					'id'		=> $prefix.'planning-events',
					'required'	=> false
				)
			)
		);

		$meta_boxes[] = array(
			'title' 	=> 'Archives PDF',
			'pages' 	=> array('archives'),
			'fields'	=> array(
				array(
					'name'			=> 'intitulé',
					'type'			=> 'text',
					'id'			=> $prefix.'lib-archive',
					'required'		=> true
				),
				array(
					'type'			=> 'divider'
				),
				array(
					'name'			=> 'type de conseil',
					'desc'			=> "Sélectionner le type de conseil approprié",
					'type'			=> 'select_advanced',
					'id'			=> $prefix.'type-conseil',
					'placeholder'	=> 'Sélectionner un conseil',
					'options'		=> array('Conseil des membres', 'Conseil d\'administration', 'Conseil académique'),
					'required'		=> true
				),
				array(
					'type'	=> 'divider'
				),
				array(
					'name'		=> 'Ancien mandat',
					'desc'		=> 'Uniquement si le conseil d\'Administration date de l\'ancien mandat',
					'type'		=> 'checkbox',
					'id'		=>$prefix.'ancien-mandat',
				),
				array(
					'type'	=> 'divider'
				),
				array(
					'name'		=> 'PDF',
					'desc'		=> "Lier le ou les fichier(s) PDF correspondant à la réunion tenue",
					'type'		=> 'file_advanced',
					'id'		=> $prefix.'archive-conseil',
					'required'	=> true
				)
			)
		);

		$meta_boxes[] = array(
			'title' 	=> 'Infos du service',
			'pages'		=> array('services'),
			'fields'	=> array(
				array(
					'name'		=> 'Logo',
					'type'		=> 'image_advanced',
					'id'		=> $prefix.'logo-service',
					'required'	=> false,
					'desc'		=> 'Si lien externe (pas de fichiers)'
				),
				array(
					'name'		=> 'Nom',
					'type'		=> 'text',
					'id'		=> $prefix.'nom-service',
					'required'	=> true
				),
				array(
					'name'		=> 'Url',
					'type'		=> 'url',
					'id'		=> $prefix.'url-service',
					'required'	=> false,
					'desc'		=> 'Si lien externe (pas de fichiers)'
				),
				array(
					'name'				=> 'Fichiers (pdf)',
					'type'				=> 'file_advanced',
					'id'				=> $prefix.'fichiers-service',
					'require'			=> false,
					'desc'				=> 'Ajout de PDFs (optionnel)',
					'max_file_uploads'	=> 5
				)
			)
		);

		$meta_boxes[] = array(
			'title'		=> 'Infos du témoignage',
			'pages'		=> array('temoignage'),
			'fields'	=> array(
				array(
					'name'			=> 'Photo',
					'type'			=> 'image_advanced',
					'id'			=> $prefix.'img-tem',
					'required'		=> true,
					'max_file_uploads'	=> 1
				),
				array(
					'name'		=> 'URL',
					'type'		=> 'url',
					'id'		=> $prefix.'url-tem',
					'required'	=> false,
					'desc'		=> 'Optionnel'
				),
				array(
					'name'		=> 'Contenu',
					'type'		=> 'WYSIWYG',
					'id'		=> $prefix.'content-tem',
					'required'	=> false,
					'desc'		=> 'Optionnel'
				)
			)
		);

		$meta_boxes[] = array(
			'title'		=> 'Infos du Laboratoire',
			'pages'		=> array('recherche'),
			'fields'	=> array(
				array(
					'name'				=> 'Logo',
					'type'				=> 'image_advanced',
					'id'				=> $prefix.'img-lab',
					'required'			=> true,
					'max_file_uploads'	=> 1
				),
				array(
					'name'		=> 'URL',
					'type'		=> 'url',
					'id'		=> $prefix.'url-lab',
					'required'	=> false,
					'desc'		=> 'Optionnel, si pas de contenu'
				)
			)
		);

		$meta_boxes[] = array(
			'title'		=> 'Contenu de la box',
			'pages'		=> array('box-doctorat'),
			'fields'	=> array(
				array(
					'name'		=> 'Contenu',
					'type'		=> 'WYSIWYG',
					'id'		=> $prefix.'contenu-box',
					'required'	=> true	
				)
			)
		);

		$meta_boxes[] = array(
			'title'		=> 'Infos',
			'pages'		=> array('mode-emploi'),
			'fields'	=> array(
				array(
					'name'		=> 'titre',
					'type'		=> 'text',
					'id'		=> $prefix.'titre-m-emploi',
					'required'	=> true
				),
				array(
					'name'				=> 'Image',
					'type'				=> 'image_advanced',
					'id'				=> $prefix.'img-m-emploi',
					'required'			=> true,
					'max_file_uploads'	=> 1
				),
				array(
					'name'				=> 'Document',
					'type'				=> 'file_advanced',
					'id'				=> $prefix.'pdf-m-emploi',
					'required'			=> true,
					'max_file_uploads'	=> 1
				)
			)
		);

		return $meta_boxes;
	}

//CSS Admin
function css_admin() {
	$siteurl = get_bloginfo('template_url');
	$url = $siteurl . '/style-admin.css';
	echo "		<link rel='stylesheet' type='text/css' href='$url' />\n";
}
add_action('admin_head', 'css_admin');

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
        $json_debug = json_encode($affiche_debug);
        echo("<script>console.log($json_debug)</script>");
}
add_action('wp_footer','debug_template');

?>