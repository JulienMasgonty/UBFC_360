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
					
				</ul>
			</nav>
			<?php 
				$args = array(
					'post_type'	=> 'actus',
					'order'		=> 'DESC'
				);
				$query = new WP_query($args);

				while($query->have_posts()):$query->the_post()
			?>
				<?php 
					$lieu = rwmb_meta('lieu-actus', 'type=select_advanced');
					switch ($lieu) { // le tableau débute à 0 ! - une ligne par option dans le champs select du lieu-actus
						case '':
							$class = '';
							break;
						case 0:
							$class = 'ufc';
							break;
						case 1:
							$class = 'ub';
							break;
						case 2:
							$class = 'utbm';
							break;
						case 3:
							$class = 'ensemm';
							break;
						case 4:
							$class = 'agrosup';
							break;
						case 5:
							$class = 'bsb';
							break;
					}
				?>
				<a class="<?php echo 'elm '.$class ?>" href="<?php the_permalink(); ?>">
					<div>
						<?php $images = rwmb_meta( 'main-img-actus', 'type=image_advanced&size=full' );
							foreach ( $images as $image ) {
						    	echo "<div class='container-img'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' /></div><div class='plus'><i class='ion-plus'></i></div>";
						} ?>
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