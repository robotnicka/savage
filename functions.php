<?php
/**
 * savage functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package savage
 */

if ( ! function_exists( 'savage_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function savage_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on savage, use a find and replace
		 * to change 'savage' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'savage', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'savage' ),
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
		add_theme_support( 'custom-background', apply_filters( 'savage_custom_background_args', array(
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
		
		// Woocommerce product gallery things
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
endif;

add_action( 'after_setup_theme', 'savage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function savage_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'savage_content_width', 640 );
}
add_action( 'after_setup_theme', 'savage_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function savage_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'savage' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'savage' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Home', 'savage' ),
		'id'            => 'home-widgets',
		'description'   => esc_html__( 'Add widgets here.', 'savage' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'savage_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function savage_scripts() {
	wp_enqueue_style( 'savage-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700' ); 

	wp_enqueue_script( 'savage-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'savage-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'savage_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Wrap product image in div - EM
add_action( 'woocommerce_before_shop_loop_item_title', function(){
    echo '<div class="product__image-wrapper">';
}, 9 );

add_action( 'woocommerce_before_shop_loop_item_title', function(){
    echo '</div>';
}, 11 );

// Wrap category image in div - EM
add_action( 'woocommerce_before_subcategory_title', function(){
    echo '<div class="category__image-wrapper">';
}, 9 );

add_action( 'woocommerce_before_subcategory_title', function(){
    echo '</div>';
}, 11 );

// Wrap results and sort select box
add_action( 'woocommerce_before_shop_loop', function(){
    echo '<div class="shop__results-sort-container">';
}, 19 );

// Only show one price for variable products
add_filter('woocommerce_variable_price_html', 'savage_custom_variation_price', 10, 2); 

function savage_custom_variation_price( $price, $product ) { 
    $price = '';

    $price .= wc_price($product->get_price()); 

    return $price;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'savage_cart_count_fragments', 10, 1 );
 
function savage_cart_count_fragments( $fragments ) {
    $count = WC()->cart->get_cart_contents_count();
    if($count > 0) $span = '<span class="cart-count cart-count-active">'.$count.'</span>';
    else $span = '<span class="cart-count></span>';
    $fragments['span.cart-count'] = $span;
    
    return $fragments;
}

// Replace jquery
add_action( 'init', function(){
	if (  ! is_admin()) {
		if( is_ssl() ){
			$protocol = 'https';
		}else {
			$protocol = 'http';
		}

		/** @var WP_Scripts $wp_scripts */
		global  $wp_scripts;
		/** @var _WP_Dependency $core */
		$core = $wp_scripts->registered[ 'jquery-core' ];
		$core_version = $core->ver;
		
		if(substr($core_version,-3) == '-wp') $core_version = substr($core_version,0,-3);
		
		$core->src = "$protocol://cdnjs.cloudflare.com/ajax/libs/jquery/$core_version/jquery.min.js";
		
		if ( WP_DEBUG ) {
			/** @var _WP_Dependency $migrate */
			$migrate         = $wp_scripts->registered[ 'jquery-migrate' ];
			$migrate_version = $migrate->ver;
			$migrate->src    = "$protocol://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/$migrate_version/jquery-migrate.js";
		}else{
			/** @var _WP_Dependency $jquery */
			$jquery = $wp_scripts->registered[ 'jquery' ];
			$jquery->deps = [ 'jquery-core' ];
		}

    }


},11 );


// Change the 'Only # left in stock' message on the WooCommerce product page to
// simply show 'Low Stock'.
function savage_custom_stock_totals($availability_html, $availability_text, $product) {
	if (substr($availability_text, 0, 4)=="Only") {
		$availability_text = "Low Stock";
	} 
	
	$availability_html = '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability_text ) . '</p>';
	
	return 	$availability_html;
}
add_filter('woocommerce_stock_html', 'savage_custom_stock_totals', 20, 3);

add_action( 'woocommerce_before_shop_loop', function(){
    echo '</div>';
}, 31 );


// Remove WooCommerce Add to Cart/Read More button from shop root
// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

