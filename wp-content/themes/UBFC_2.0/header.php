<!DOCTYPE html>
<html lang="fr"> <!-- à prévoir : changement auto de l'attribut lang en fonction de la langue choisie -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale= 1.0, shrink-to-fit= no, minimum-scale=1.0, user-scalable=no">
	<title><?php wp_title("|",true,"right") ?><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500,900,900i" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<nav class="nav-bar">
			<div class="menu">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</div>
			<span class="menu">Menu</span>
			<div class="logo-nav">

			</div>
			<div class="socials">
				<ul>
					<li><a class="tw" target="_blank" href="https://twitter.com/univ_bfc?lang=fr" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><!--
					--><li><a class="yt" target="_blank" href="https://www.youtube.com/channel/UCE1eeKLhNl8cUHEyuEqgurw" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="socials-mobile">
				<i class="ion-android-share-alt"></i>
				<ul>
					<li><a class="tw" target="_blank" href="https://twitter.com/univ_bfc?lang=fr" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><!--
					--><li><a class="yt" target="_blank" href="https://www.youtube.com/channel/UCE1eeKLhNl8cUHEyuEqgurw" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>					
				</ul>
			</div>
		</nav>
		<nav class="main-nav">
			<div class="container">
				<div class="arrow">
					<i class="icon ion-ios-close-outline"></i><span>Retour au site</span>
				</div>
				<div class="liste-nav">
					<div class="container">
						<div class="block-nav accueil">
							<a class="titre" href="<?php echo esc_url(home_url()); ?>"><span class="txt">Accueil<i class="down ion-arrow-right-b"></i></span></a>
						</div><!--
						--><div class="block-nav ubfc dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i><strong>Bienvenue à UBFC</strong><i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav recherche dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>Recherche & Formation<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav master">
							<a class="titre" href="<?php echo get_permalink(get_page_by_title('Masters internationaux')); ?>"><span class="txt">Masters internationaux<i class="down ion-arrow-right-b"></i></span></a>
						</div><!--
						--><div class="block-nav doctorat dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>Doctorat<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav isite dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>ISITE-BFC<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav pepite dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>Entrepreneuriat Étudiant<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav etudiant dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>Vie Étudiante<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav international dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>International<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav hdr dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>HDR<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav services">
							<?php
								// test de l'appartenance au sous-réseau
								// =================================================
								$remote_ip = ip2long($_SERVER['REMOTE_ADDR']) ;
								$mask = ip2long('255.255.255.192') ;
								$network = ip2long('193.55.69.126') ;

								if(($remote_ip & $mask) == ($network & $mask))
								{ ?>
									<a class="titre" href="<?php echo get_permalink(get_page_by_title('Outils numériques')); ?>"><span class="txt">Outils numériques<i class="down ion-arrow-right-b"></i></span></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="sub-nav-list">
				<div class="container">
					<nav id="ubfc" class="sub-nav">
						<?php wp_nav_menu(array('menu' => 'UBFC', 'container' => false)); ?>
					</nav>
					<nav id="recherche" class="sub-nav">
						<?php wp_nav_menu(array('menu' => 'recherche-et-formation', 'container' => false)); ?>
					</nav>
					<nav id="doctorat" class="sub-nav">
						<?php wp_nav_menu(array('menu' => 'doctorat', 'container' => false)); ?>
					</nav>
					<nav id="international" class="sub-nav">
						<?php wp_nav_menu(array('menu' => 'international', 'container' => false)); ?>
					</nav>
					<nav id="etudiant" class="sub-nav">
						<?php wp_nav_menu(array('menu' => 'vie-etudiante', 'container' => false)); ?>
					</nav>
					<nav id="hdr" class="sub-nav">
						<?php wp_nav_menu(array('menu' => 'hdr', 'container' => false)); ?>
					</nav>
					<nav id="isite" class="sub-nav">
						<?php wp_nav_menu(array('menu' => 'isite', 'container' => false)); ?>
					</nav>
					<nav id="pepite" class="sub-nav">
						<?php wp_nav_menu(array('menu' => 'pepite', 'container' => false)); ?>
					</nav>
				</div>
			</div>
		</nav>
	</header>

	