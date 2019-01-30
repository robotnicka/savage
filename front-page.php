<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package peculiar-crossroads
 */

get_header();

    // --- featured products
    $meta_query  = WC()->query->get_meta_query();
    $tax_query   = WC()->query->get_tax_query();
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
    );

    $args = array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => 4,
        'orderby'             => 'terms',
        'order'               => 'asc',
        'meta_query'          => $meta_query,
        'tax_query'           => $tax_query,
    ); 
    
    ?>
    
    <div class="featured">
        <div class="featured__header">
            <h1 class="featured__title">Featured products</h1>
        </div>
        <div class="featured__container">
            <div class="featured__background">
                
                <?php 
                    include('assets/halftone.php');
                ?>
                
            </div>
            <ul class="featured__list">
            <?php
        
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            
                <li>    
                    <div class="featured__image-container">
                        <a href="<?php the_permalink();?>">
                        <?php 
                            if ( has_post_thumbnail( $loop->post->ID ) ) 
                                echo get_the_post_thumbnail( $loop->post->ID, 'shop_catalog' ); 
                            else 
                                echo '<img src="' . wc_placeholder_img_src() . '" alt="Placeholder" />'; 
                        ?>
                        </a>
                    </div>
                </li>
            
            <?php 
                endwhile;
                wp_reset_query(); 
                
                
                ?>
                
            </ul>
            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="button button--shop">Shop all</a>
        </div><!-- featured container -->
        
    </div>
    <div class="recent-posts">
        <h1>Savage News</h1>
        <div class="recent-posts__container">
            <ul>
            <?php
                
                $args = array( 
                    'numberposts' => '2',
                    'post_status' => 'publish',
                );

                $recent_posts = wp_get_recent_posts( $args );
                
                foreach( $recent_posts as $recent ) : ?>
                    
                    <li class="recent-posts__featured">
                        <a href="<?php echo esc_url( get_permalink( $recent['ID'] ) ) ?>">
                            <div class="recent-posts__thumbnail-container"> 
                                <div class="recent-posts__thumbnail"><?php echo get_the_post_thumbnail( $recent['ID'] ) ?></div>
                            </div>
                            <div class="recent-posts__content">
                                <div class="recent-posts__title"><?php echo apply_filters( 'the_title', $recent['post_title'], $recent['ID'] ) ?></div>
                                <div class="recent-posts__excerpt">
                                    <?php 
                                    if ( empty( $recent['post_excerpt'] ) ) : ?>
                                        <?php 
                                        echo wp_kses_post( wp_trim_words( $recent['post_content'], 20 ) ); ?>
                                    <?php else : ?>
                                        <?php echo wp_kses_post( $recent['post_excerpt'] ); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="recent-posts__meta">→ Read more... <span><?php echo get_the_date('M j, Y', $recent['ID'] ); ?></span></div>
                            </div>
                        </a>
                    </li>

                    <?php endforeach;
            
                $args = array( 
                    'numberposts' => '5', 
                    'offset' => 2,
                    'post_status' => 'publish',
                );
                
                $recent_posts = wp_get_recent_posts( $args );
                
                foreach( $recent_posts as $recent ) {
                    printf( '<li><a href="%1$s"><div class="recent-posts__title">%2$s</div><div class="recent-posts__meta">→ Read more... <span>%3$s</span></div></a></li>',
                        esc_url( get_permalink( $recent['ID'] ) ),
                        apply_filters( 'the_title', $recent['post_title'], $recent['ID'] ),
                        get_the_date('M j, Y', $recent['ID'] )
                    );
                }
                
            ?>
            </ul>
            <div class="recent-posts__button-container">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="button">Read all</a>
            </div>
        </div>
    </div>
    <div class="subscribe">
        Find me on <a href="https://www.patreon.com/savagesparrow" target="_blank" rel="noopener">Patreon</a>!
    </div>
<?php
get_footer();
