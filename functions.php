<?php 

//initializing customized theme
add_action('after_setup_theme', 'gchang_setup');

if(!function_exists('gchang_setup')):

	function gchang_setup(){

		//Theme language
		load_theme_textdomain('gchang', get_template_directory().'/languages');

		//Add Title Tage support
		add_theme_support('title-tag');

		//Register Menus.
		register_nav_menus(
			array('main_menu'=> esc_html('Main menu', 'gchang'),)
		);

		//Add thumbnails
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(300,300,true);
		add_image_size('gchang-single', 1170, 460, true);

		//Video header
		add_theme_support('custom-header', array('video'=>true,));
	}

endif;

//Loading CSS and jQuery
function styles_and_script(){
	wp_enqueue_style('stylesheet', get_template_directory_uri().'/style.css', array(), mt_rand());
	wp_enqueue_style('icomoon', get_template_directory_uri().'/icomoon/style.css', array(), mt_rand());
	wp_enqueue_script('theme', get_template_directory_uri().'/theme.js', array(), mt_rand());
}
add_action('wp_enqueue_scripts', 'styles_and_script');

// Registering sidebar
function gchang_widgets_init(){
	register_sidebar(
		array(
			'name'			 => esc_html__( 'Right sidebar', 'gchang' ),
			'id'			 => 'gchang-right-sidebar',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<h3 class="widget-title">',
			'after_title'	 => '</h3>',
		)
	);
}
add_action('widgets_init','gchang_widgets_init' );

//setting up the database
function comments_setup(){
	/*$sql = "CREATE TABLE IF NOT EXISTS mountains(
		id INT,
		name VARCHAR(255),
		address VARCHAR(255),
		location INT,
		lengthOfTrail INT,
		estimatedOfCompletion INT,
		PRIMARY KEY(id)
	);";*/
	$sql = "CREATE TABLE IF NOT EXISTS comments (
		id INT AUTO_INCREMENT,
		slug VARCHAR(255),
		date DATE,
		levelOfDifficulty INT,
		wouldVisitAgain INT,
		email VARCHAR(255),
		comment TEXT,
		helpful INT,
		notHelpful INT,
		PRIMARY KEY(id)
	);";
	
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}
add_action('after_setup_theme','comments_setup');

function feedback_setup(){
	$sql = "CREATE TABLE IF NOT EXISTS feedbacks(
		id INT AUTO_INCREMENT,
		date DATE,
		email VARCHAR(255),
		feedback TEXT,
		PRIMARY KEY (id)
	);";

	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}
add_action('after_setup_theme','feedback_setup');

//form submission
function submit_comments(){ 
	
	global $wpdb;

	global $date;
	$date = date('y-m-d');

	// global $permalink;
	// $permalink = ;

	// $wpdb->insert('comments', array('slug'=>$slug,'date'=>$_POST['date'],'levelOfDifficulty'=>$_POST['levelOfDifficulty'],'wouldVisitAgain'=>$_POST['wouldVisitAgain'], 'email'=>$_POST['email'], 'comment'=>$_POST['comment'], 'helpful'=>$_POST['helpful-button'], 'notHelpful'=>$_POST['not-helpful-button']));

	$wpdb->insert('comments', array('slug'=>$_POST['slug'],'date'=>$date,'levelOfDifficulty'=>$_POST['levelOfDifficulty'],'wouldVisitAgain'=>$_POST['wouldVisitAgain'], 'email'=>$_POST['email'], 'comment'=>$_POST['comment']));
	echo "redirecting needs work";
	echo get_the_title();
	print_r (get_post());
	//global $wp;
	//$current_url = home_url($wp->request);
	//$current_url = home_url(add_query_arg(array(), $wp->request,));
	//$current_url = home_url(add_query_arg(array('slug'=>$_POST['slug'])));
	//$current_url = add_query_arg(array('slug'=>$_POST['slug']));
	//$current_url = add_query_arg(array('permalink'=>$_POST['permalink']));
	//$current_url = home_url('/', add_query_arg(array('slug'=>$_POST['slug'])));
	//wp_redirect($current_url);
	//wp_redirect(get_permalink(get_page_by_path(get_the_title().'create-comments')));

	


	wp_redirect($_POST['permalink']);
	
	//wp_redirect(get_permalink($post->ID));
	//wp_redirect($permalink);
	exit;
}
add_action('admin_post_create_comments', 'submit_comments');
add_action('admin_post_nopriv_create_comments', 'submit_comments');

function submit_feedback(){
	global$wpdb;

	global $date;
	$date = date('y-m-d');

	$wpdb->insert('feedbacks', array('date'=>$date,'email'=>$_POST['email'], 'feedback'=>$_POST['feedback']));
}

add_action('admin_post_create_feedback', 'submit_feedback');
add_action('admin_post_nopriv_create_feedback', 'submit_feedback');

//displaying the comment in the post of the correct mountain/trail
function the_posted_comment(){
	global $post;
	global $wpdb;

	//query
	$sql = 'SELECT date, levelOfDifficulty, wouldVisitAgain, email, comment, helpful, notHelpful FROM comments WHERE slug="'.$post->post_name.'";';

	//get the results of a query
	$results = $wpdb->get_results($sql);

	echo "<div class='comments'>
		<h2>Comments</h2>
		<button id='showMorebtn' aria-labelledby='show more comments button' aria-pressed='false'></button>
		<button id='showLessbtn' aria-labelledby='show less comments button'aria-pressed='false' ></button> ";

	//displaying the comments
	foreach ($results as $row) {

		echo "<article>";

		foreach($row as $key => $value){
			global $tmp;
			if($key == 'email'){
				$tmp = $value;
			}
			if($key == 'comment'){
				echo "<div class='comment-text'>
						<h3>Comment from: ".$tmp."</h3>		 			
		 			    	<p>".$value."</p>";
			}
			//echo "<div class='comment-rating'>";
			switch ($key) {
				case 'date': 
					echo "<div>Date: ".$value."</div>";
					break;
				
				case 'levelOfDifficulty':
					echo "<div class='levelOfDifficulty'>Level of Difficulty: ".$value."</div>";
					break;

				case 'wouldVisitAgain': //
					echo "<div class='wouldVisitAgain'>Would Visit Again: ".$value."</div>";
					break;
				case 'helpful': 
					echo "<div>helpful:".$value."</div>";
					break;
				case 'notHelpful':
					echo "<div>Not Helpful: ".$value."</div>"; //end of comment rating
					break;
			}

		}


		?>

		<!-- <form>
			<form action="<?php //echo admin_url('admin-post.php'); ?>" method="post">
        <input type="hidden" name="action" value="create_comments">
			<button name="thumbsup" value="<?php //echo $row->ID; ?>"></button>
		</form>
 -->
		<?php
			echo "</article>";		

	}
	echo "</div>";//end of comments
					
}



// if(isset($_POST['thumbsup'])==true)
// {
// 	$commentId = $_POST['thumbsup'];
// }

// $query = 'UPDATE '