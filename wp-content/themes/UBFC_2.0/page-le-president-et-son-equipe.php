<?php get_header(); ?>

<main>
	<?php while(have_posts()):the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<section class="content">
			<?php the_content(); ?>	
		</section>
	<?php endwhile; ?>
		<section class="liste-personnel">
			<?php $args = array(
					'post_type'	=> 'personnel',
					'order'		=> 'DESC'
				);
				$query = new WP_query($args);
				while($query->have_posts()):$query->the_post()
			?>
				<?php $custom_fields = get_post_custom(); ?>
				<div class="elm">
					<p><?php echo $custom_fields['appartenance-personnel'][0] ?></p>
					<p><?php echo $custom_fields['nom-personnel'][0] ?></p>
					<p><?php echo $custom_fields['prenom-personnel'][0] ?></p>
					<p><?php echo $custom_fields['fonction-personnel'][0] ?></p>
				</div>
				<?php if($custom_fields['ubfc_appartenance-personnel'] == 'Président et son équipe'):  ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php endif; ?>
			<?php endwhile; ?>
		</section>
</main>

<?php get_footer(); ?>