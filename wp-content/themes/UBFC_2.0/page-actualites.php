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
				?>
				<a class="<?php echo 'elm '.$etablissement.' active' ?>" href="<?php the_permalink(); ?>">
				<style>
					.elm.<?php echo $etablissement ?>:after { border-bottom: 10px solid <?php echo $color ?> !important; }
				</style>
					<div>
						<?php $images = rwmb_meta( 'main-img-events', 'type=image_advanced&size=full' );
							foreach ( $images as $image ): ?>
						    	<div class="container-img" style="background-image: url('<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>');"></div>
							<?php endforeach; ?>
						<div class="desc">
							<h3><?php echo rwmb_meta('dateDebut-events'); ?> | <?php the_title(); ?></h3>
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