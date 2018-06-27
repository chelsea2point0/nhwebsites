<?php
/**
 * nhwebsites functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nhwebsites
 */

if ( ! function_exists( 'nhwebsites_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nhwebsites_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nhwebsites, use a find and replace
		 * to change 'nhwebsites' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nhwebsites', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'nhwebsites' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nhwebsites_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'nhwebsites_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nhwebsites_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nhwebsites_content_width', 640 );
}
add_action( 'after_setup_theme', 'nhwebsites_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nhwebsites_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nhwebsites' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nhwebsites' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar(array(
       'name' => 'Home Page Left',
       'before_widget' => '<div class = "homeWidgetArea">',
       'after_widget' => '</div>',
       'before_title' => '<h3>',
       'after_title' => '</h3>',
     ) );

    register_sidebar(array(
       'name' => 'Home Page Middle',
       'before_widget' => '<div class = "homeWidgetArea">',
       'after_widget' => '</div>',
       'before_title' => '<h3>',
       'after_title' => '</h3>',
     ) );

    register_sidebar(array(
       'name' => 'Home Page Right',
       'before_widget' => '<div class = "homeWidgetArea">',
       'after_widget' => '</div>',
       'before_title' => '<h3>',
       'after_title' => '</h3>',
     ) );

}
add_action( 'widgets_init', 'nhwebsites_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nhwebsites_scripts() {
	wp_enqueue_style( 'nhwebsites-style', get_stylesheet_uri() );

    wp_enqueue_style( 'nhws-source-sans-font', "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,900" );
    wp_enqueue_style( 'nhws-fira-font', "https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed:300,400,400i,600,800" );
    wp_enqueue_style( 'nhws-syncopate-font', "https://fonts.googleapis.com/css?family=Syncopate" );


    wp_enqueue_style( 'nhwebsites-css', get_template_directory_uri() . '/bootstrap-sass/stylesheets/styles.css' );

	wp_enqueue_script( 'nhwebsites-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'nhwebsites-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'font-awesome', "https://use.fontawesome.com/044f2e4223.js" );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nhwebsites_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'nhw_featured_content_meta_boxes_setup' );
add_action( 'load-post-new.php', 'nhw_featured_content_meta_boxes_setup' );

function nhw_featured_content_meta_boxes_setup()
{
    add_action('add_meta_boxes', 'nhw_add_featured_content_meta');
    add_action('save_post', 'nhw_featured_content_save_post_class_meta', 10, 2);
}

function nhw_add_featured_content_meta()
{
    global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'page-templates/featured-content.php' )
        {
            add_meta_box(
                'featured_content_meta', // $id
                'Featured Content', // $title
                'nhw_display_metabox', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}

function nhw_display_metabox( $post )
{
    wp_nonce_field( basename( __FILE__ ), 'nhw_featured_content_nonce' );
    $text = esc_attr( get_post_meta( $post->ID, 'nhw_featured_content_class', true ) );
    wp_editor( htmlspecialchars_decode($text), 'nhw-featured', $settings = array('nhw-featured-textarea'=>'nhw-featured'));
    ?>

    <?php
}


/* Save the meta box's post metadata. */
function nhw_featured_content_save_post_class_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['nhw_featured_content_nonce'] ) || !wp_verify_nonce( $_POST['nhw_featured_content_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  $new_meta_value = ( isset( $_POST['nhw-featured'] ) ? htmlspecialchars( $_POST['nhw-featured'] ) : '' );
  $meta_key = 'nhw_featured_content_class';
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}
