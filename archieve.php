<?php 
/*
Template Name: Archive
*/

	get_header(); 

	echo "<div id='contain'>
			<main>";
	while(have_posts()){
		
		the_post();
		the_title('<h2><a href="'.get_permalink().'">','</a></h2>');
	}
	
	echo "<h2>Archieve by Subject: </h2>
			<ul>";
	
	wp_list_categories();

	echo "</ul></main></div>";

	get_footer();

 ?>