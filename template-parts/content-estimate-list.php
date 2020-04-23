<?php?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php
    
	get_template_part( 'template-parts/entry-header' );

	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
            }          
            /**
 * Setup query to show the ‘services’ post type with all posts filtered by 'home' category.
 * Output is linked title with featured image and excerpt.
 */
?>
   <div id="hero" style="max-width: 1110px; width: 100%;">
<?php   
	$current_user = wp_get_current_user();
    $args = array(  
        'post_type' => 'estimate',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'title', 
        'order' => 'ASC',        
    );

    $loop = new WP_Query( $args ); 
    echo '<ul>';
    while ( $loop->have_posts() ) : $loop->the_post();         
		echo '<li>';
		if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) echo '<a href="'.get_permalink().'">';
		echo get_the_title();
		if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) echo '</a>';
		echo '</li>';
    endwhile;
    echo '</ul>';
    wp_reset_postdata();   
			?>                                                     
            </div>            
		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}	
	?>

</article><!-- .post -->
