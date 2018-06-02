<?php 
	get_header();

	if(have_posts()){
		
		while(have_posts()){
		
			echo "<div class='wrapper'> ";
			the_post();
			echo "<h2><a href='".get_the_permalink()."'>";
			echo get_the_title();
			echo "</a></h2>";
			the_post_thumbnail();
			the_excerpt();
			echo "</div>";

		}
	}else {
		echo "<p>There are no posts </p>";
	}

	get_footer();