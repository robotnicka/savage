<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package savage
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				savage_posted_on();
				savage_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="image-thumbnail">
	    <?php savage_post_thumbnail(); ?>
	</div>

	<div class="entry-content">
		<?php
		
		if ( is_single() ) :
        /* translators: %s: Name of current post */
            the_content( sprintf(
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'savage' ),
            get_the_title()
            ) );
            
            wp_link_pages( array(
            'before'      => '<div class="page-links">' . __( 'Pages:', 'savage' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
            ) );
            
        else :
        
            the_excerpt( sprintf(
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'savage' ),
            get_the_title()
            ) );
            
            wp_link_pages( array(
            'before'      => '<div class="page-links">' . __( 'Pages:', 'savage' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
            ) );
        endif;
        
        ?>
        <a href="<?php esc_url( the_permalink() ) ?>">Read more...</a>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
