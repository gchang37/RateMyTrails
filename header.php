<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mountain Theme</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header>
		<?php 

			if(!is_front_page()){
				wp_nav_menu();
			}	

		?>		
	</header>
	<main>
		