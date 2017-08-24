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

		$('.sub-nav li.disabled .sub-menu').slideUp('fast');

		// Gestion des sous-menus de de sous-menus
		// ==============================================================

		$('.sub-nav  li.disabled').on('mouseover', function() {
			$(this).find('.sub-menu').slideDown('250ms');
			console.log('trigger');
		});

		$('.sub-nav li.disabled').on('mouseleave', function() {
			$(this).find('.sub-menu').slideUp('250ms');
		});

		// Gestion des sous-menus
		// ==============================================================

		var listMenu = $('.block-nav');

		listMenu.each(function() {
			var idMenu = $(this).attr('class'),
				idMenu = idMenu.split(' '),
				idMenu = idMenu[1];

			if($(this).hasClass('dropdown')) {
				$(this).on('click', function(event) {
					event.preventDefault();
					if($(this).hasClass('visible')) {
						$('.block-nav:not(.'+idMenu+')').css({'display': 'inline-block'}).removeClass('hidden');
						$('.sub-nav-list').removeClass('active');
						$('#'+idMenu).removeClass('active');
						$(this).removeClass('visible');
					} else {
						$('.block-nav:not(.'+idMenu+')').addClass('hidden').delay(400).css({'display': 'none'});
						$('.sub-nav-list').addClass('active');
						$('#'+idMenu).addClass('active');
						$(this).addClass('visible');
					}
				});
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
		var bar 		= $('.filters .bar'),
			conteneur 	= $('.filters ul'),
			li 			= $('.filters li'),
			liDefault 	= $('.filters #all');

		if (bar[0] != undefined && li[0] != undefined && liDefault[0] != undefined) {
			var	current = liDefault.attr('id'),
				width 	= liDefault.width(),
				posx 	= liDefault.position().left,
				posx 	= posx+'px',
				color 	= white;
		}

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
		var listeTags 	= $('.filters li'),
			listeElm 	= $('a.elm'),
			count 		= 0;

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

		// Centrer les images de contenu (vu que wordpress le fait pas automatiquement...)
		// ==============================================================
		var imgC = $('.generic-page img, .generic-page iframe, .generic-page .aligncenter');
		
		imgC.each(function() {
			$(this).parent('p').css({'text-align': 'center'});
		});
		
		// Gestion des Pop ups de l'accueil doctoral
		// ==============================================================
		var listElm 	= $('.hotkeys .elm'),
			listPopups 	= $('.Popups .popUp'),
			listClose 	= $('.popUp .close');

		listElm.each(function() {
			$(this).on('click', function() {
				var id = $(this).attr('data-popup');
				listPopups.each(function() {
					if($(this).attr('id') == id) {
						listPopups.removeClass('active');
						$(this).addClass('active');
					}
				});
			});
		});

		listClose.each(function() {
			$(this).on('click', function() {
				$(this).parents('.popUp').removeClass('active');
			})
		});

		// Gestion de la navigation secondaire des pages Doctorat
		// ==============================================================
		var baseurl 	= $(document).location,
			listeH2 	= $('.content h2'),
			navContent 	= $('.container-content > .nav-content > ul');

		if(listeH2.length > 2) {
			/*for (var i = 0; i < listeH2.length ; i++) {
				console.log('true');
				var id 		= '#titre-'+i;
				console.log(id);
				var	contenu = listeH2[i].innerHTML;
				console.log(contenu);
				var	elm 	= '<li><a href="'+id+'">'+contenu+'</a></li>';
				console.log(elm);

				console.log(listeH2[i]);

				/*listeH2[i].attr({id: id});*/
				/*$('h2').attr('id', 'a1');
				navContent.innerHTML += elm;
			}*/
			var i = 1;
			listeH2.each(function() {
				var id = 'titre-'+i;
				var contenu = $(this)[0].innerHTML;
				var	elm = '<li><a href="#'+id+'">'+contenu+'</a></li>';

				$(this).attr('id', id);
				$(this).addClass("ancre");
				navContent.parents('.nav-content').addClass("active");
				navContent[0].innerHTML += elm;

				i++;
			});

			$(document).on('scroll', function() {
				if ($(window).scrollTop() >= 100) {
					navContent.parents('.nav-content').css({'top': '80px'});
				} else {
					navContent.parents('.nav-content').css({'top': '310px'});
				}
			});
		}
	});
})();