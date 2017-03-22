(function() {
	jQuery(function($) { // permet l'utilisation du sélecteur $ dans wordpress
		$(document)
			.on('click', '.arrow', function() {
				$('.main-nav').removeClass('active');
			})
			.on('click', '.menu', function() {
				$('.main-nav').addClass('active');
			})

			// Gestion des sous-menu
			// ===========================================
			
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


	});
})();