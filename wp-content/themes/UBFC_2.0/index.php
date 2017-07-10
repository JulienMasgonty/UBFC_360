<?php while(have_posts()):the_post() ?>
	<?php 
		the_title();
		the_content(); 
	?> 
<?php endwhile; ?>