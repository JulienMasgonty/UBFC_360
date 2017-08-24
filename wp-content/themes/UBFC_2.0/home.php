
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
			<h2 class="green">Actualités et évenements<a class="green" href="<?php echo get_page_by_title('Actualités')->guid; ?>">- Voir tout</a></h2>
			<ul class="list-actus">
				<?php 
					$args = array(
						'post_type'		=> 'events',
						'posts_per_page'	=> 6,
						'order'			=> 'DESC'
					);
					$query = new WP_query($args);
				?>
				<?php while($query->have_posts()):$query->the_post() ?>
					<?php $custom = get_post_custom(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php $images = rwmb_meta( 'main-img-events', 'type=image_advanced&size=full' );
							foreach ( $images as $image ): ?>
								<div class="vignette" style="background-image: url('<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>');"></div>
							<?php endforeach ?>
							<div class="text">
								<h3><?php echo rwmb_meta('dateDebut-events'); ?> | <?php the_title(); ?></h3>
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

