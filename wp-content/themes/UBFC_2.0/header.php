<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale= 1.0, shrink-to-fit= no, minimum-scale=1.0, user-scalable=no">
	<title><?php wp_title("|",true,"right") ?><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700,800" rel="stylesheet">
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
			<div class="logo-nav">
				
			</div>
			<div class="socials">
				<ul>
					<li><a class="fb" target="_blank" href="https://www.facebook.com/pages/Université-Bourgogne-Franche-Comté/717011205019459?fref=ts" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><!--
					--><li><a class="tw" target="_blank" href="https://twitter.com/univ_bfc?lang=fr" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><!--
					--><li><a class="yt" target="_blank" href="https://www.youtube.com/channel/UCE1eeKLhNl8cUHEyuEqgurw" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="socials-mobile">
				<i class="ion-android-share-alt"></i>
				<ul>
					<li><a class="fb" target="_blank" href="https://www.facebook.com/pages/Université-Bourgogne-Franche-Comté/717011205019459?fref=ts" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><!--
					--><li><a class="tw" target="_blank" href="https://twitter.com/univ_bfc?lang=fr" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><!--
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
							<span class="titre"><span class="txt">Accueil<i class="down ion-arrow-right-b"></i></span></span>
						</div><!--
						--><div class="block-nav ubfc dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>Ubfc<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav recherche dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>Recherche & Formation<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav doctorale">
							<span class="titre"><span class="txt">Écoles Doctorales<i class="down ion-arrow-right-b"></i></span></span>
						</div><!--
						--><div class="block-nav isite">
							<span class="titre"><span class="txt">ISITE BFC<i class="down ion-arrow-right-b"></i></span></span>
						</div><!--
						--><div class="block-nav pepite">
							<span class="titre"><span class="txt">Entreprenariat Étudiant - PEPITE<i class="down ion-arrow-right-b"></i></span></span>
						</div><!--
						--><div class="block-nav international dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>International<i class="down ion-arrow-down-b"></i></span></span>
						</div><!--
						--><div class="block-nav etudiant dropdown">
							<span class="titre"><span class="txt"><i class="left ion-arrow-left-b"></i>Vie Étudiante<i class="down ion-arrow-down-b"></i></span></span>
						</div>
					</div>
				</div>
			</div>
			<div class="sub-nav-list">
				<div class="container">
					<nav id="ubfc" class="sub-nav">
						<ul>
							<li><a href="">Présentation</a></li>
							<li><a href="">Le président et son équipe</a></li>
							<li><a href="">Conseil d'administration</a></li>
							<li><a href="">Conseil académique</a></li>
							<li><a href="">Conseil des membres</a></li>
							<li><a href="">Venir en Bourgogne Franche-Comté</a></li>
							<li><a href="">Actualités</a></li>
							<li><a href="">Événements</a></li>
						</ul>
					</nav>
					<nav id="recherche" class="sub-nav">
						<ul>
							<li><a href="">Équipes de recherche</a></li>
							<li><a href="">Partenaires de recherche</a></li>
							<li><a href="">Master internationaux</a></li>
							<li><a href="">Établissements</a></li>
							<li><a href="">Culture Scientifique</a></li>
						</ul>
					</nav>
					<nav id="international" class="sub-nav">
						<ul>
							<li><a href="">Partir à l'étranger</a></li>
							<li><a href="">Venir en Bourgogne Franche-Comté</a></li>
						</ul>
					</nav>
					<nav id="etudiant" class="sub-nav">
						<ul>
							<li><a href="">Schéma directeur de la vie étudiante</a></li>
							<li><a href="">Carte européenne</a></li>
							<li><a href="">Mon campus</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</nav>
	</header>