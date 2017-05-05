(function() {
	jQuery(function($) { // permet l'utilisation du sélecteur $ dans wordpress

		// Définition des variables de BASE
		// ==============================================================
		var blue 		= '#0465ac',
			lightblue 	= '#2e8fc4',
			green		= '#b6c628',
			orange		= '#dd9117',
			purple		= '#a40078',
			gray 		= '#5b6268',
			lightgray	= '#efefef',
			black 		= '#010101',
			white		= '#fefefe';

		// à priori, ça sert plus à rien. Je les laisse quand même pour l'instant, on sait jamais :)
		// ========================
		// /!\ LE BLANC SERT !! /!\
		// ========================

		// Gestionnaire d'évènements
		// ==============================================================
		$(document)
			.on('click', '.arrow', function() {
				$('.main-nav').removeClass('active');
			})
			.on('click', '.menu', function() {
				$('.main-nav').addClass('active');
			});

		// Gestionnaire d'évènements mobile
		// ==============================================================
		if($(window).width() <= 992) {
			$(document)
				.on('click', '.socials-mobile > i', function() {
					$('.socials-mobile ul').toggleClass('active');
				})
				.on('click', '.arrow-left', function() {
					$('.text').addClass('active');
				})
				.on('click', '.arrow-right', function() {
					$('.text').removeClass('active');
				});
		}

		// Gestion des sous-menu
		// ==============================================================
		
		$('.block-nav.ubfc').on('click', function(event) {
			event.preventDefault();
			if($(this).hasClass('visible')) {
				$('.block-nav:not(.ubfc)').css('display', 'inline-block').removeClass('hidden');
				$('.sub-nav-list').removeClass('active');
				$('#ubfc').removeClass('active');
				$(this).removeClass('visible');
			} else {
				$('.block-nav:not(.ubfc)').addClass('hidden').delay(400).css('display', 'none');
				$('.sub-nav-list').addClass('active');
				$('#ubfc').addClass('active');
				$(this).addClass('visible');
			}
		});
		
		$('.block-nav.recherche').on('click', function(event) {
			event.preventDefault();
			if($(this).hasClass('visible')) {
				$('.block-nav:not(.recherche)').css('display', 'inline-block').removeClass('hidden');
				$('.sub-nav-list').removeClass('active');
				$('#recherche').removeClass('active');
				$(this).removeClass('visible');
			} else {
				$('.block-nav:not(.recherche)').addClass('hidden').delay(400).css('display', 'none');
				$('.sub-nav-list').addClass('active');
				$('#recherche').addClass('active');
				$(this).addClass('visible');
			}
		});
		
		$('.block-nav.international').on('click', function(event) {
			event.preventDefault();
			if($(this).hasClass('visible')) {
				$('.block-nav:not(.international)').css('display', 'inline-block').removeClass('hidden');
				$('.sub-nav-list').removeClass('active');
				$('#international').removeClass('active');
				$(this).removeClass('visible');
			} else {
				$('.block-nav:not(.international)').addClass('hidden').delay(400).css('display', 'none');
				$('.sub-nav-list').addClass('active');
				$('#international').addClass('active');
				$(this).addClass('visible');
			}
		});
		
		$('.block-nav.etudiant').on('click', function(event) {
			event.preventDefault();
			if($(this).hasClass('visible')) {
				$('.block-nav:not(.etudiant)').css('display', 'inline-block').removeClass('hidden');
				$('.sub-nav-list').removeClass('active');
				$('#etudiant').removeClass('active');
				$(this).removeClass('visible');
			} else {
				$('.block-nav:not(.etudiant)').addClass('hidden').delay(400).css('display', 'none');
				$('.sub-nav-list').addClass('active');
				$('#etudiant').addClass('active');
				$(this).addClass('visible');
			}
		});

		// Apparition au scroll du logo dans la barre de nav
		// ==============================================================
		
		if($('body').attr('class').indexOf('home') != -1) {	
			$(window).scroll(function() {
				if($(this).scrollTop() > 50) {
					$('.logo-nav').addClass('visible');
				} else {
					$('.logo-nav').removeClass('visible');
				}

			});
		} else if($('body').attr('class').indexOf('home') == -1) {
			$('.logo-nav').addClass('visible');
		}

		// Gestion du hover des filtres (Actualités - Evenements - etc)
		// ==============================================================
		var bar = $('.filters .bar'),
			conteneur = $('.filters ul'),
			li = $('.filters li'),
			liDefault = $('.filters #all'),
			current = liDefault.attr('id'),
			width = liDefault.width(),
			posx = liDefault.position().left,
			posx = posx+'px',
			color = white;

		bar.css({'left': posx, 'width': width, 'color': color});

		li.each(function() {
			$(this).on('mouseover', function() {
				current = $(this).attr('id');
				count++;
				var width = $(this).width(),
					posx = $(this).position().left,
					posx = posx+'px';
				bar.css({'left': posx, 'width': width, 'background-color': $(this).attr('data-color')});

				if($(this)[0] == $('.filters li:last-of-type()')[0]) {
					bar.css({'left': posx, 'width': width+20, 'background-color': $(this).attr('data-color')});
				} 
			});
		});

		// Gestion des filtres (actus, events, etc)
		// ==============================================================
		var listeTags = $('.filters li'),
			listeElm = $('a.elm'),
			count = 0;

		listeTags.each(function() {
			$(this).on('click', function() {
				var tag = $(this).attr('id');
				count = 0;

				console.log(tag);
					
				listeElm.removeClass('active');
				listeElm.each(function() {
					var classEtab = $(this).attr('class'),
						classEtab = classEtab.split(' ');
						classEtab = classEtab[1];

					if(classEtab == tag) {
						$(this).addClass('active');
						count++;
					} else if (tag == 'all') {
						if(!($(this).hasClass('active'))) {
							$(this).addClass('active');
							count++;
						}
					}
				});


				if(count == 0) {
					$('.message').empty().append('Pas d\'actualités pour cet établissement.');
				} else if (count != 0) {
					$('.message').empty();
				}
			});
		});

	});
})();