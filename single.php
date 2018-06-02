<?php 
/*
Template Name: Single
*/
	get_header();	

	if(have_posts()){
		while(have_posts()){

			echo "<div class='wrapperSingle'>
				<h2><a href='".get_the_permalink()."'>";
			echo get_the_title();
			echo "</a></h2>";
			the_post_thumbnail();
			the_post();
			the_content();
			get_template_part('partials/comments','form');
			get_template_part('partials/thumbs', 'form');

			the_posted_comment();
			get_avatar( get_the_author_meta( 'ID' ),32);

			echo "</div>";

		}
	}else {echo "<p>There are no posts </p>";}

	if(is_active_sidebar('gchang-right-sidebar')){
		dynamic_sidebar('gchang-right-sidebar');	
	}

	get_footer();

 ?>