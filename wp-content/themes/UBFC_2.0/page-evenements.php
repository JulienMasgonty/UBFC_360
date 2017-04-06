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
			<?php 
				$args = array(
					'post_type'	=> 'events',
					'order'		=> 'DESC'
				);
				$query = new WP_query($args);

				while($query->have_posts()):$query->the_post()
			?>
				<a class="elm" href="<?php the_permalink(); ?>">
					<div>
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
							<div class="container-date">
								<div class="date"><?php echo $jour ?><span class="month"><?php echo $month ?></span></div>
							</div>
						<div class="desc">
							<h3><?php the_title(); ?></h3>
							<p>
								<?php 
									$content = strip_tags(get_the_content());
									$max_length = 180;
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
					</div>
				</a>
			<?php endwhile; ?>
		</section>
</main>

<?php get_footer(); ?>