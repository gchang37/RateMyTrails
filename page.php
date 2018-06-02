<?php 


/*
Template Name: Page
*/
	// if(is_front_page()){

	// 	//Static Front Page
	// 	echo "this is the front page";
	// 	the_custom_header_markup();
	// 	echo "<a href='http://localhost/wordpress/home' name='go to home page'><button id='homebtn'>Click me</button></a> ";

	// }elseif(is_home()){

	// 	//Default Home Page
	// 	get_header();

	// 	if(have_posts()){
	// 		while(have_posts()){
	// 			the_post();
	// 			echo "<h2><a href='".get_the_permalink()."'>";
	// 			echo get_the_title();
	// 			echo "</a></h2>";
	// 			the_content();			
	// 		}
	// 	}else {echo "<p>There are no posts</p>";}

	// 	get_footer(); 
	

	// }
	if(is_page("contact-us")) {

		//Contact Us Page
		get_header();
		echo "<div class='wrapper'>";
		get_template_part('partials/feedback', 'form');
		echo "</div>";
		get_footer();

	} else {

		//Documentation and Reference Page
		get_header();
		echo "<div class='wrapper'>";


			if(have_posts()){
				
				while(have_posts()){
					
					the_post();
					echo "<h2><a href='".get_the_permalink()."'>";
					echo get_the_title();
					echo "</a></h2>";
					the_content();

				}
			}else {
				echo "<p>There are no posts </p>";
			}






	



		echo "</div>";
		get_footer();

	}
	
?>