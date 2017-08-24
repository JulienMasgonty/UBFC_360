
<?php get_header(); ?>

<main>
	<h1 class="logo">Universités de Bourgogne Franche-Comté</h1>

	<?php 
		$args = array(
			'post_type'			=> 'focus',
			'posts_per_page'	=> 1,
			'order'				=> 'DESC'
		);
		$query = new WP_Query($args);

		while($query->have_posts()):$query->the_post();
	?>
		<section class="focus">
			<?php 
				$images = rwmb_meta('img-focus', 'type=image_advanced&size=full');
				foreach($images as $image):
			?>
				<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="focus-media">
			<?php endforeach; ?>
			<a href="<?php the_permalink(); ?>" class="contain-txt">
				<h2 class="block-title">Focus sur...</h2>
				<div class="text">
					<p><?php the_title(); ?></p>
				</div>
			</a>
		</section>
	<?php endwhile; ?>

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

		<div class="tnp tnp-subscription">
			<form method="post" action="http://172.28.26.100/www/?na=s" onsubmit="return newsletter_check(this)">

				<div class="tnp-field tnp-field-email">
					<input class="tnp-email" type="email" name="ne" placeholder="johnsmith@gmail.com" required>
				</div>

				<div class="tnp-field tnp-field-button">
					<input class="tnp-submit" type="submit" value="je m'inscris !">
				</div>
			</form>
		</div>
	</section>

</main>

<?php get_footer(); ?>

