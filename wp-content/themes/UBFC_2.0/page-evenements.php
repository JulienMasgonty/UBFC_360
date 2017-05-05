<?php get_header(); ?>

<main class="listing-page">
	<?php while(have_posts()):the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<section class="content">	
			<?php the_content(); ?>	
			<div class="colors-bar bottom">
				<div class="blue"></div><!--
				--><div class="orange"></div><!--
				--><div class="green"></div><!--
				--><div class="lightblue"></div><!--
				--><div class="gray"></div><!--
				--><div class="purple"></div>
			</div>		
		</section>
	<?php endwhile; ?>
		<section class="liste-actus">
			<nav class="filters">
				<ul>
					<li id="all" data-color="#fff">Tout</li>
					<?php 
						$args = array(
							'post_type' => 'etablissement',
							'order'		=> 'ASC'
						);
						$query = new WP_query($args);

						while($query->have_posts()):$query->the_post() ?>
						<?php 
							$url = get_the_permalink();
							$url = explode('/', $url);
						?>
						<li data-color="<?php echo rwmb_meta('col-etablissement', 'type=colorpicker'); ?>" id="<?php echo $url[5] ?>"><?php echo rwmb_meta('sigle-etablissement', 'type=text'); ?></li>
						<?php endwhile; ?>
					<span class="bar"></span>
				</ul>
			</nav>
			<?php 
				$args = array(
					'post_type'	=> 'events',
					'order'		=> 'DESC'
				);
				$query = new WP_query($args);

				while($query->have_posts()):$query->the_post()
			?>
				<?php
					// On récupère l'établissement et sa couleur à partir de la taxonomie, afin de les réutiliser en html et css
					$etablissement = wp_get_object_terms($post->ID, 'etablissement')[0]->slug;
					$postCustom = get_page_by_path( $etablissement, OBJECT, 'etablissement' );
					$color = get_post_meta($postCustom->ID, 'col-etablissement', true);

					// On formate la date
					$date = rwmb_meta( 'dateDebut-events', 'type=datetime&size=full' );
					$date = split('-', $date);
					$jour = $date[0];
					switch ($date[1]) {
						case '01':
							$month = 'Jan';
							break;

						case '02':
							$month = 'Fev';
							break;

						case '03':
							$month = 'Mar';
							break;

						case '04':
							$month = 'Avr';
							break;

						case '05':
							$month = 'Mai';
							break;

						case '06':
							$month = 'Juin';
							break;

						case '07':
							$month = 'Juil';
							break;

						case '08':
							$month = 'Aou';
							break;

						case '09':
							$month = 'Sept';
							break;

						case '10':
							$month = 'Oct';
							break;

						case '11':
							$month = 'Nov';
							break;

						case '12':
							$month = 'Dec';
							break;
					}
				?>
				<a class="<?php echo 'elm '.$etablissement.' active' ?>" href="<?php the_permalink(); ?>">
				<style>
					.elm.<?php echo $etablissement ?>:after { border-bottom: 10px solid <?php echo $color ?> !important; }
				</style>
					<div>
						<div class="container-date">
							<div class="date"><?php echo $jour ?><span class="month"><?php echo $month ?></span></div>
						</div>
						<div class="desc">
							<h3><?php the_title(); ?></h3>
							<p>
								<?php 
									$content = strip_tags(get_the_content());
									$max_length = 180;
									if (strlen($content)>$max_length) {    
										// Séléction du maximum de caractères
										$content = substr($content, 0, $max_length);
										// Récupération de la position du dernier espace (afin déviter de tronquer un mot)
										$position_espace = strrpos($content, " ");    
										$content = substr($content, 0, $position_espace);    
										// Ajout des "..."
										$content = $content."...";
									}
									echo "$content";
								?>
							</p>
						</div>
					</div>
				</a>
			<?php endwhile; ?>
			<div class="message"></div>
		</section>
</main>

<?php get_footer(); ?>