<?php
/**
 * jackessom_theme functions and definitions
 *
 * @package jackessom_theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'jackessom_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jackessom_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jackessom_theme, use a find and replace
	 * to change 'jackessom_theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'jackessom_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'standardThumb', 470, 406, true );
	add_image_size( 'entryThumb', 970, 230, true);
	add_image_size( 'recentThumb', 303, 100, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'jackessom_theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	/*add_theme_support( 'post-formats', array(
		'high', 'wide'
	) );*/

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jackessom_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // jackessom_theme_setup
add_action( 'after_setup_theme', 'jackessom_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jackessom_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'jackessom_theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Tag Cloud', 'jackessom_theme' ),
		'id'            => 'tag-cloud',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title hide">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'jackessom_theme_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function jackessom_theme_scripts() {
	//wp_enqueue_style( 'jackessom_theme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fonts-style', 'http://fonts.googleapis.com/css?family=Lustria|Yanone+Kaffeesatz:300,200|Roboto:300' );
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/style.min.css' );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	//if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	wp_deregister_script('jquery');
   	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   	wp_enqueue_script('jquery', array(), '20160813', true);
	wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/assets/js/plugins.min.js', array(), '20160813', true  );
	wp_enqueue_script( 'global-js', get_template_directory_uri() . '/assets/js/global.min.js', array(), '20160813', true  );
}
add_action( 'wp_enqueue_scripts', 'jackessom_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//get instagram feed
require get_template_directory() . '/instagram/getInstagram.php';

//get twitter feed;
require get_template_directory() . '/twitter/tweets.php';


//infinite scroll stuff

add_action( 'wp_ajax_nopriv_load_more', 'load_more' );
add_action( 'wp_ajax_load_more', 'load_more' );

function load_more() {

	$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;
	$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;

	$category = ($_GET['cat'] != 'none') ? $_GET['cat'] : null;
	$tag = ($_GET['tag'] != 'none') ? $_GET['tag'] : null;

	$output = '';


	/*$query = array(
    	'posts_per_page' => $posts,
    	'offset' => $offset,
    	'post_status' => array('publish') ,
		'order'      =>  'desc',
		'orderby'    =>  'date',
		'post_type'  =>  'post'
	);*/

	if ($category) {
		$query = array(
			'posts_per_page' => $numPosts,
	   		'paged'          => $page,
	    	'post_status' => array('publish') ,
			'order'      =>  'desc',
			'orderby'    =>  'date',
			'post_type'  =>  'post',
			'category_name' => $category
		);
	} else if ($tag) {
		$query = array(
			'posts_per_page' => $numPosts,
	   		'paged'          => $page,
	    	'post_status' => array('publish') ,
			'order'      =>  'desc',
			'orderby'    =>  'date',
			'post_type'  =>  'post',
			'tag' => $tag
		);
	} else {
		$query = array(
			'posts_per_page' => $numPosts,
	   		'paged'          => $page,
	    	'post_status' => array('publish') ,
			'order'      =>  'desc',
			'orderby'    =>  'date',
			'post_type'  =>  'post',
		);
	}

	query_posts($query);

	
	if (have_posts()) {
	    // the Loop
	    while (have_posts()) : the_post();

	        // define the structure of your posts markup
	    	$output .=  get_template_part( 'content', get_post_format() );

	    endwhile;
	}

    // Reset Query
    wp_reset_query(); 


    die($output);
}

function jackessom_theme_get_posts_count() {
    global $wp_query;
    return $wp_query->post_count;
}

//edit admin css

add_action('admin_head', 'my_custom_style');

function my_custom_style() {
  echo '<style>
    .post-state-format {
      width: inherit;
    } 
  </style>';
}










