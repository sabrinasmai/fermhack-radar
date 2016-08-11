<?php
/**
 * sabrinas-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sabrinas-theme
 */

if ( ! function_exists( 'sabrina_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sabrinas_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sabrinas-theme, use a find and replace
	 * to change 'sabrinas-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sabrina-theme', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'sabrina-theme' ),
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
	//Referenced from http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'clickture_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'sabrina_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

 //referenced from https://codex.wordpress.org/Creating_Options_Pages
 //This piece of code adds posts to the custom post type. This is found in queries if it's in wordpress...
function show_cpt_in_categories ($query)
{
	if( $query->is_category() && $query->is_main_query() )
	{
		$query->set( 'post_type', array ('locations'));
	}
}
add_action('pre_get_posts', 'show_cpt_in_categories');

// This piece of code runs options file, which is found in inc folder
require get_template_directory() . '/inc/options.php';

//This piece of code adds a function where styling is applied
function apply_options_page($value)
{
	$value = get_option('options_settings');

	//This piece of code applies values for First Option
	if($value['select_field'] == 1)
	{
	?>
		<style>
			#page
			{
				 background-color: #ff0000;
			}
		</style>
	<?php
	}
	elseif($value['select_field'] == 2)
	{
	?>
		<style>
			#page
			{
				 background-color: #8B008B;
			}
		</style>
	<?php
	}
	elseif($value['select_field'] == 3)
	{
	?>
		<style>
			#page
			{
				 background-color: #A9A9A9;
			}
		</style>
	<?php
	}

	//This piece of code applies values for Second Option
	if($value['select_field_2'] == 1)
	{
	?>

		<style>
			#page
			{
				 color: #000000;
			}
		</style>

	<?php
	}
	elseif($value['select_field_2'] == 2)
	{
	?>
		<style>
			#page
			{
				 color: #ffffff;
			}
		</style>
	<?php
	}
	elseif($value['select_field_2'] == 3)
	{
	?>
		<style>
			#page
			{
				 color: #d2b48c;
			}
		</style>
	<?php
	}

	// This piece of code applies values for Third Option
	if($value['select_field_3'] == 1)
	{
	?>

		<style>
			#page
			{
				 font-size: 1em;
			}
		</style>

	<?php
	}
	elseif($value['select_field_3'] == 2)
	{
	?>
		<style>
			#page
			{
				 font-size: 1.5em;
			}
		</style>
	<?php
	}
	elseif($value['select_field_3'] == 3)
	{
	?>
		<style>
			#page
			{
				 font-size: 2em;
			}
		</style>
	<?php
	}
}
add_action('wp_head', 'apply_options_page');
// This is now the end of the option page's styles being applied...









function sabrina_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sabrina_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'sabrina_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sabrina_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sabrina-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sabrina-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sabrina_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sabrina_theme_scripts() {
	wp_enqueue_style( 'sabrina-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sabrina-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'sabrina-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sabrina_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
