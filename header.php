<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package savage
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'savage' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-header__container">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<div class="site-menu site-menu--mobile">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'savage' ); ?></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
							?>
						</nav><!-- #site-navigation -->
					</div>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="<site-header__logo"><?php include 'logo.php' ?></span><span class="site-header__icon--mobile">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 50"><path fill="#D4197C" d="M26.191 10c.438-.182.875-.359 1.31-.545.205-.088.563-.093.489-.45a1.55 1.55 0 0 0-.632-.943c-.192-.128-.458-.058-.608.228-.227.428-.452.855-.668 1.291-.088.175-.167.377.109.419zM11 44c1.346-1.078 2.59-2.061 3.818-3.07.366-.3.107-.508-.144-.656-.652-.387-1.318-.74-1.958-1.148-.414-.265-.616-.092-.734.367-.142.559-.303 1.111-.405 1.68-.162.899-.533 1.746-.577 2.827zm9.289-8c.373.002.625-.248.885-.458a129.44 129.44 0 0 0 5.612-4.817c3.037-2.757 6.086-5.496 8.777-8.695.452-.538.641-.92.139-1.563-.498-.639-.893-1.383-1.314-2.094-1-1.683-2.02-3.346-3.158-4.918-.312-.432-.635-.541-1.086-.39-2.769.926-5.535 1.859-8.312 2.755-.636.205-1.039.621-1.319 1.259-.43.978-.86 1.955-1.311 2.92-1.91 4.089-3.79 8.191-5.102 12.588-.184.616-.151.956.428 1.191 1.13.46 2.235.996 3.368 1.443.782.308 1.594.523 2.393.779zm24.631 3.474l1.974.526.106-.181c-1.003-1.644-1.646-3.491-2.378-5.29-.046-.111-.162-.182-.246-.271-.176-.653-.468-1.233-.778-1.814-1.1-2.055-2.356-3.981-3.561-5.952-.382-.625-.613-.657-1.041-.075-2.094 2.845-4.533 5.271-7.021 7.633-1.543 1.463-3.051 2.975-4.672 4.323-.151.126-.345.278-.295.512.057.265.311.188.484.22 1.464.27 2.943.32 4.42.413 3.383.212 6.756-.25 10.137-.192.957.014 1.914.096 2.871.148zM5.54 27.873c.14.226.262.447.485.604 1.019.721 2.016 1.484 3.029 2.215.667.48.744.443.979-.422.993-3.657 2.207-7.205 3.807-10.56.084-.177.241-.377.111-.578-.159-.247-.375-.087-.552.003-.988.507-1.993.977-2.952 1.553-1.574.946-3.266 1.628-4.698 2.893-.952.434-1.733 1.19-2.555 1.869-.339.281-.178.539.062.754a172.35 172.35 0 0 0 1.826 1.611c.138.121.281.296.458.058zm38.765-17.521c-.072-.01-.145-.036-.215-.028-1.963.218-3.869.799-5.813 1.14-.378.066-.306.374-.151.61.971 1.484 1.808 3.066 2.682 4.62.23.408.423.388.659.071.862-1.159 1.765-2.281 2.522-3.535.588-.349.943-.963 1.287-1.554.275-.473.961-1.038.642-1.474-.34-.462-1.066-.007-1.613.15zm-1.553 34.295c-3.703 1.089-7.469 1.129-11.244.966-2.404-.104-4.801-.339-7.147-1.031-.968-.285-1.907-.663-2.834-1.068-.675-.297-1.24-.236-1.831.21-1.49 1.126-3.049 2.126-4.682 2.942-1.84.922-3.686 1.852-5.611 2.519-.993.345-2.034.503-3.049.771-.199.053-.381.096-.503-.094-.143-.22.014-.401.143-.551.5-.574.513-1.345.628-2.063a140.292 140.292 0 0 1 1.789-9.214c.07-.306.181-.599.262-.903.094-.354.077-.705-.206-.934a28.45 28.45 0 0 1-2.686-2.498c-.093-.098-.251-.116-.379-.171-.615-1.007-1.47-1.75-2.211-2.617C2.028 29.551 1.116 28.003.4 26.3c-.335-.799-.487-1.658-.345-2.545.074-.464.359-.752.765-.8.408-.048.445.356.553.677.082.246.217.468.309.709.194.511.393.541.75.131.751-.862 1.566-1.651 2.318-2.511.452-.518 1.078-.844 1.349-1.564.274.132.423-.116.606-.261 2.665-2.112 5.295-4.348 8.322-5.698 1.849-.824 2.962-2.249 3.987-4.021 1.787-3.088 3.598-6.162 5.659-9.029C25.43.335 26.349-.163 27.537.05c1.116.2 2.133.591 2.965 1.563 1.166 1.363 2.373 2.677 3.367 4.217.294.456.614.549 1.131.454 3.104-.571 6.143-1.592 9.299-1.796.947-.062 1.894.053 2.833.212.029.041.05.097.087.121 1.824 1.176 1.948 1.49 1.666 3.786-.259 2.111-1.002 3.99-2.01 5.754-.889 1.557-1.898 3.026-2.642 4.689-.479.313-.671.919-1.046 1.34-.291.327-.285.672-.072 1.071.649 1.218 1.279 2.449 1.91 3.68.119.231.201.494.508.38.111 1.285.865 2.288 1.168 3.488.025.101.113.205.193.111.063-.072.055-.223.078-.338.256 1.327.512 2.653.961 3.918-.113.764.105 1.477.293 2.184.422 1.592.519 3.225.32 4.846-.072.586-.059 1.635-1.102 1.389-.1-.023-.173.081-.176.195-.019.87-.658 1.363-.952 2.065-1.205.358-2.353.912-3.564 1.268z"/></svg>
				</span></a></h1>
					<?php
				else :
					?>
					<div class="site-menu site-menu--mobile">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96.6 70.2">
									<path d="M30.6 53.8C28.1 56.4 18.2 70.2 15 70.2S3.2 56.7.6 54.2l10 .1c0-10-2.2-20.3-2.2-30.3 0-6.2-2.5-24 5-24 11.3 0 6 10.2 6 20.5 0 11.2 2 22 2 33.2l9.2.1zM33.9 58.4c13 0 26.2.5 39.2.5 6.3 0 12.6 1.8 18.9 1.8 3.6 0 3.8 5.7 1.8 7.6-4.4 4.2-32.4 1.1-38.6 1.1-6.3 0-12.6-1.5-18.8-1.5-4.7 0-2.5-5.7-2.5-9.5z"/>
									<path d="M27.9 38.9h40.4c7.5 0 15 1.5 22.4 1.5 4.5 0 7.8 4.9 4.4 8.5-3.8 4-35 .3-40.8.3-7.5 0-15-1-22.4-1-6.2 0-4-3.7-4-9.3zM27.8 19c13.4 0 27.2 1.3 40.6 1.3 7.4 0 14.9-.6 22.3-.6 4.5 0 6 5.1 2.7 8.7-3.8 4.2-33.4.1-39.1.1-7.5 0-15 .3-22.4.3-6.2 0-4-4.2-4-9.9zM28.4 2.2c13.4 0 26.4-1 39.8-1 7.5 0 15 .6 22.5.6 4.4 0 7.9 5 4.5 8.6-3.8 4-35.4.5-41.1.5H31.6c-6.2 0-3.2-3-3.2-8.7z"/>
								</svg>
							</button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
							?>
						</nav><!-- #site-navigation -->
					</div>
					<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="site-header__logo"><?php include 'logo.php' ?></span><span class="site-header__icon--mobile">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 50"><path fill="#D4197C" d="M26.191 10c.438-.182.875-.359 1.31-.545.205-.088.563-.093.489-.45a1.55 1.55 0 0 0-.632-.943c-.192-.128-.458-.058-.608.228-.227.428-.452.855-.668 1.291-.088.175-.167.377.109.419zM11 44c1.346-1.078 2.59-2.061 3.818-3.07.366-.3.107-.508-.144-.656-.652-.387-1.318-.74-1.958-1.148-.414-.265-.616-.092-.734.367-.142.559-.303 1.111-.405 1.68-.162.899-.533 1.746-.577 2.827zm9.289-8c.373.002.625-.248.885-.458a129.44 129.44 0 0 0 5.612-4.817c3.037-2.757 6.086-5.496 8.777-8.695.452-.538.641-.92.139-1.563-.498-.639-.893-1.383-1.314-2.094-1-1.683-2.02-3.346-3.158-4.918-.312-.432-.635-.541-1.086-.39-2.769.926-5.535 1.859-8.312 2.755-.636.205-1.039.621-1.319 1.259-.43.978-.86 1.955-1.311 2.92-1.91 4.089-3.79 8.191-5.102 12.588-.184.616-.151.956.428 1.191 1.13.46 2.235.996 3.368 1.443.782.308 1.594.523 2.393.779zm24.631 3.474l1.974.526.106-.181c-1.003-1.644-1.646-3.491-2.378-5.29-.046-.111-.162-.182-.246-.271-.176-.653-.468-1.233-.778-1.814-1.1-2.055-2.356-3.981-3.561-5.952-.382-.625-.613-.657-1.041-.075-2.094 2.845-4.533 5.271-7.021 7.633-1.543 1.463-3.051 2.975-4.672 4.323-.151.126-.345.278-.295.512.057.265.311.188.484.22 1.464.27 2.943.32 4.42.413 3.383.212 6.756-.25 10.137-.192.957.014 1.914.096 2.871.148zM5.54 27.873c.14.226.262.447.485.604 1.019.721 2.016 1.484 3.029 2.215.667.48.744.443.979-.422.993-3.657 2.207-7.205 3.807-10.56.084-.177.241-.377.111-.578-.159-.247-.375-.087-.552.003-.988.507-1.993.977-2.952 1.553-1.574.946-3.266 1.628-4.698 2.893-.952.434-1.733 1.19-2.555 1.869-.339.281-.178.539.062.754a172.35 172.35 0 0 0 1.826 1.611c.138.121.281.296.458.058zm38.765-17.521c-.072-.01-.145-.036-.215-.028-1.963.218-3.869.799-5.813 1.14-.378.066-.306.374-.151.61.971 1.484 1.808 3.066 2.682 4.62.23.408.423.388.659.071.862-1.159 1.765-2.281 2.522-3.535.588-.349.943-.963 1.287-1.554.275-.473.961-1.038.642-1.474-.34-.462-1.066-.007-1.613.15zm-1.553 34.295c-3.703 1.089-7.469 1.129-11.244.966-2.404-.104-4.801-.339-7.147-1.031-.968-.285-1.907-.663-2.834-1.068-.675-.297-1.24-.236-1.831.21-1.49 1.126-3.049 2.126-4.682 2.942-1.84.922-3.686 1.852-5.611 2.519-.993.345-2.034.503-3.049.771-.199.053-.381.096-.503-.094-.143-.22.014-.401.143-.551.5-.574.513-1.345.628-2.063a140.292 140.292 0 0 1 1.789-9.214c.07-.306.181-.599.262-.903.094-.354.077-.705-.206-.934a28.45 28.45 0 0 1-2.686-2.498c-.093-.098-.251-.116-.379-.171-.615-1.007-1.47-1.75-2.211-2.617C2.028 29.551 1.116 28.003.4 26.3c-.335-.799-.487-1.658-.345-2.545.074-.464.359-.752.765-.8.408-.048.445.356.553.677.082.246.217.468.309.709.194.511.393.541.75.131.751-.862 1.566-1.651 2.318-2.511.452-.518 1.078-.844 1.349-1.564.274.132.423-.116.606-.261 2.665-2.112 5.295-4.348 8.322-5.698 1.849-.824 2.962-2.249 3.987-4.021 1.787-3.088 3.598-6.162 5.659-9.029C25.43.335 26.349-.163 27.537.05c1.116.2 2.133.591 2.965 1.563 1.166 1.363 2.373 2.677 3.367 4.217.294.456.614.549 1.131.454 3.104-.571 6.143-1.592 9.299-1.796.947-.062 1.894.053 2.833.212.029.041.05.097.087.121 1.824 1.176 1.948 1.49 1.666 3.786-.259 2.111-1.002 3.99-2.01 5.754-.889 1.557-1.898 3.026-2.642 4.689-.479.313-.671.919-1.046 1.34-.291.327-.285.672-.072 1.071.649 1.218 1.279 2.449 1.91 3.68.119.231.201.494.508.38.111 1.285.865 2.288 1.168 3.488.025.101.113.205.193.111.063-.072.055-.223.078-.338.256 1.327.512 2.653.961 3.918-.113.764.105 1.477.293 2.184.422 1.592.519 3.225.32 4.846-.072.586-.059 1.635-1.102 1.389-.1-.023-.173.081-.176.195-.019.87-.658 1.363-.952 2.065-1.205.358-2.353.912-3.564 1.268z"/></svg>
				</span>
				</a></div>
					<?php
				endif;
	
					?>
			</div><!-- .site-branding -->
			<div class="site-account">
				<?php if ( is_user_logged_in() ) { ?>
				 	<a class="site-account__account-link" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
				 <?php } 
				 else { ?>
				 	<a class="site-account__account-link" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
				 <?php } 
				?>
				<a href="<?php echo wc_get_cart_url() ?>"><span class="cart-icon"><?php include 'assets/cart-icon.php' ?></span><?php if (WC()->cart->get_cart_contents_count() > 0) { ?><span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?> </span><?php } ?></a>
				<div class="header__graphic">
					<?php 
	                    include('assets/header-graphic.php');
	                ?>
				</div>
			</div>
		</div>
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'savage' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
