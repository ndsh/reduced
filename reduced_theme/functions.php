<?php
/**
 * Theme Functions
 * @author Julian-Anthony Hespenheide <www.julian-h.de>
 * @package WordPress
 * @subpackage Reduced
 */
	$title_of_the_website = "Title of the Website";

	if (function_exists('acf_add_options_page')){
	    acf_add_options_page('Global Settings');
	}

	function post_type_projects() {
	    register_post_type('Arbeiten',
	        array(
	            'labels' => array(
	                'name' => __( 'Arbeiten' ),
	                'singular_name' => __( 'Arbeit' )
	                ),
	            'public' => true,
	            'has_archive' => true,
	            'rewrite' => array('slug' => 'arbeit'),
	            // 'taxonomies' => array('arbeiten',),
				'menu_position' => 2,
				'supports' => array(
					'title',
					'revisions'
				)
	        )
	    );
	}
	add_action('init', 'post_type_projects');

	function remove_menus(){
	  //remove_menu_page( 'index.php' );                  //Dashboard
	  //remove_menu_page( 'edit.php' );                   //Posts
	  //remove_menu_page( 'upload.php' );                 //Media
	  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
	  remove_menu_page( 'edit-comments.php' );          //Comments
	  //remove_menu_page( 'themes.php' );                 //Appearance
	  //remove_menu_page( 'plugins.php' );                //Plugins
	  //remove_menu_page( 'users.php' );                  //Users
	  //remove_menu_page( 'tools.php' );                  //Tools
	  //remove_menu_page( 'options-general.php' );        //Settings
	  
	}
	add_action( 'admin_menu', 'remove_menus' );

	function add_google_fonts() {
		wp_enqueue_style( 'wpb-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:400,300|Crimson+Text', false ); 
	}
	add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

	if (!function_exists('grphkwp_theme_setup')):
    	function theme_setup() {
        	register_nav_menus(array(
            	'main-menu' => __('Main Menu', 'grphkwp'),
            	'footer-menu' => __('Footer Menu', 'grphkwp'),
            	'header-menu' => __('Header Menu', 'grphkwp'),
        	));
    	}
	endif;
	add_action('after_setup_theme', 'theme_setup');

	
	function my_title_filter( $title ) {
	    $max = 50;
	    $count = strlen(trim($title));

	    $title = substr($title, 0, $max);
	    if($count > $max) $title = $title ."…";
	    elseif($count == 0) $title = "";
	    $title = $title . ($count>0?" — ":"") . get_bloginfo( "name" );
	    return $title;
	}
	add_filter('wp_title', 'my_title_filter', 99);

	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-latest.min.js", false, null);
	   wp_enqueue_script('jquery');
	}

	function theme_scripts() {
	        // wp_register_script('light-gallery', $scripts . '/lightGallery/js/lightgallery.js', 'jquery', '1.0',  true );
	        // wp_enqueue_script('light-gallery' );

	        // wp_register_script('light-gallery-th', $scripts . '/lightGallery/js/lg-thumbnail.js', 'jquery', '1.0',  true );
	        // wp_enqueue_script('light-gallery-th' );

	        // wp_register_script('nav-mobile', $scripts . '/nav-mobile/js/nav-mobile.js', 'jquery', '1.0',  true );
	        // wp_enqueue_script('nav-mobile' );

	        wp_enqueue_script( 'scrollreveal', get_template_directory_uri() . '/js/scrollReveal/dist/scrollreveal.min.js', array(), '3.0.9', true );
	        wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
	    
	}
	add_action( 'wp_enqueue_scripts', 'theme_scripts', 13);
?>