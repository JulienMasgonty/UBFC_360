
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
			<h2 class="green">Actualités<a class="green" href="">- Voir tout</a></h2>
			<ul class="list-actus">
				<li>
					<a href="">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/random1.jpg" alt="generic picture" class="vignette">
						<div class="plus"><i class="ion-plus"></i></div>
						<div class="text">
							<h3>Lorem ipsum dolor.</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, velit...</p>
						</div>
					</a>
				</li><!--
				--><li>
					<a href="">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/random1.jpg" alt="generic picture" class="vignette">
						<div class="plus"><i class="ion-plus"></i></div>
						<div class="text">
							<h3>Lorem ipsum dolor.</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam, mollit...</p>
						</div>
					</a>
				</li><!--
				--><li>
					<a href="">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/random1.jpg" alt="generic picture" class="vignette">
						<div class="plus"><i class="ion-plus"></i></div>
						<div class="text">
							<h3>Lorem ipsum dolor.</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, saepe...</p>
						</div>
					</a>
				</li><!--
				--><li>
					<a href="">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/random1.jpg" alt="generic picture" class="vignette">
						<div class="plus"><i class="ion-plus"></i></div>
						<div class="text">
							<h3>Lorem ipsum dolor.</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, praesenti...</p>
						</div>
					</a>
				</li>
			</ul>
		</article><!--
		--><article class="evenements">
			<h2 class="green">Événements<a class="green" href="">- Voir tout</a></h2>
			<ul class="list-events">
				<li>
					<a href="">
						<div class="date">20 <span class="month">Mar</span></div>
						<div class="text">
							<h3>Lorem ipsum dolor.</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error...</p>
						</div>
					</a>
				</li><!--
				--><li>
					<a href="">
						<div class="date">28 <span class="month">Jan</span></div>
						<div class="text">
							<h3>Lorem ipsum dolor.</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore...</p>
						</div>
					</a>
				</li><!--
				--><li>
					<a href="">
						<div class="date">17 <span class="month">Sept</span></div>
						<div class="text">
							<h3>Lorem ipsum dolor.</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium...</p>
						</div>
					</a>
				</li><!--
				--><li>
					<a href="">
						<div class="date">03 <span class="month">Oct</span></div>
						<div class="text">
							<h3>Lorem ipsum dolor.</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit...</p>
						</div>
					</a>
				</li>
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