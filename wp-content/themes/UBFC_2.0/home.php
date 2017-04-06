
<?php get_header(); ?>

<main>
	<h1 class="logo">Universités de Bourgogne Franche-Comté</h1>
	
	<section class="focus">
		<img class="focus-media" src="<?php echo get_stylesheet_directory_uri(); ?>/img/focus.jpg" alt="generic focus picture">
		<h2 class="block-title">Focus sur...</h2>
		<div class="text">
			<div class="contain-txt">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque reprehenderit reiciendis debitis, deleniti fugit incidunt sint. Magnam, odit, ea...
					<span class="plus"><i class="fa fa-plus"></i></span>
					<span class="arrow arrow-left"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
					<span class="arrow arrow-right"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
				</p>
			</div>
		</div>
	</section>

	<section class="actus">
		<div class="scroll-down">
			<div class="container">
				<i class="ion-chevron-down"></i>
			</div>
		</div>
		<article class="actualites">
			<h2 class="green">Actualités<a class="green" href="<?php echo get_page_by_title('Actualités')->guid; ?>">- Voir tout</a></h2>
			<ul class="list-actus">
				<?php 
					$args = array(
						'post_type'		=> 'actus',
						'posts_per_page'	=> 4,
						'order'			=> 'DESC'
					);
					$query = new WP_query($args);
				?>
				<?php while($query->have_posts()):$query->the_post() ?>
					<?php $custom = get_post_custom(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php $images = rwmb_meta( 'main-img-actus', 'type=image_advanced&size=full' );
							foreach ( $images as $image ) {
							    echo "<div class='vignette'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' /></div><div class='plus'><i class='ion-plus'></i></div>";
							} ?>
							<div class="text">
								<h3><?php the_title(); ?></h3>
								<p>
									<?php 
										$content = strip_tags(get_the_content());
										$max_length = 70;
										if (strlen($content)>$max_length)
										{    
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
						</a>
					</li>
				<?php endwhile;  ?>
			</ul>
		</article><!--
		--><article class="evenements">
			<h2 class="green">Événements<a class="green" href="<?php echo get_page_by_title('Évènements')->guid; ?>">- Voir tout</a></h2>
			<ul class="list-events">

				<?php 
					$args = array(
						'post_type'		=> 'events',
						'posts_per_page'	=> 4,
						'order'			=> 'DESC'
					);
					$query = new WP_query($args);
				?>
				<?php while($query->have_posts()):$query->the_post() ?>
					<?php $custom = get_post_custom(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php 
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
							<div class="date"><?php echo $jour ?><span class="month"><?php echo $month ?></span></div>
							<div class="text">
								<h3><?php the_title(); ?></h3>
								<p>
									<?php 
										$content = strip_tags(get_the_content());
										$max_length = 70;
										if (strlen($content)>$max_length)
										{    
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
						</a>
					</li>
				<?php endwhile;  ?>
			</ul>
		</article>
	</section>

	<section class="newsletter">
		<p class="news-tagline">
			Inscrivez-vous à la newsletter pour ne rien manquer des actualités de l'UBFC !
		</p>
		<form method="post" action="">
			<input type="text" placeholder="johnsmith@gmail.com">
			<button type="submit">Je m'inscris !</button>
		</form>
	</section>

</main>

<?php get_footer(); ?>

