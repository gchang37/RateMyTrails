<?php 

get_header();

	if(is_front_page()){

		//Static Front Page
		the_custom_header_markup();
		echo "<h2> Welcome to <span>RateMyTrails<span></h2>";
		echo "<a href='http://localhost/wordpress/home' aria-labelledby='go to home page'><button id='homebtn'>Click me</button></a> ";

	}

get_footer();
