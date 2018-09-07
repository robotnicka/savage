<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package savage
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>
			<div class="blog-post-container">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/archive-post', get_post_type() );

			endwhile;
			?>
			</div>
			<?php
			
			// the_posts_navigation();
			
			// blog pagination
			the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => __( '← Older posts', 'textdomain' ),
				'next_text' => __( 'More posts →', 'textdomain' ),
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?>
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
