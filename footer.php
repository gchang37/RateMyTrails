<?php 

	echo "</div>		
	</main>
	<footer>"; 

	if(!is_front_page()){
		wp_nav_menu();
		echo "<p>&copy; 2018 Gina Chang </p>";
	}

	echo "</footer>";

	wp_footer();

	echo "</body>
</html>";

 ?>