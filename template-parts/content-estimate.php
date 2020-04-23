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
			?>  			
                <div id="hero" style="max-width: 1110px; width: 100%;">                    
                <div class="content">              					
                    <style>
                    .calc-wrap{
                        overflow: hidden;
                    }
                    .calc-wrap>div{
                        width: 50%;

                    }
                    .float-left{
                        float: left;
                    }
                    .float-right{
                        float: right;
                    }
                    </style>
                    <div class="calc-wrap">       
					<?php
					if(!isset($_GET['updated'])):
					?>
                        <div class="float-left">						
                        <?php                                     
							// Load the form							
							
                            acf_form(array(     
                                'field_groups' => array('20'),                   
                                'post_title'    => false,
								'post_content'  => false,	
								'return' => '',															
								'html_after_fields' => '<button class="button button-primary" type="button" name="generate_posts_pdf" value="generate">PDF</button>',
                                'submit_value'  => __('Update')
                            ));                                      
                        ?>                           
                        </div>
                        <div class="float-right">
                        	<h3>견적서 합계</h3>                                                         
                        </div>
						<?php
						else:
							
						?>
						<p>견적서가 업데이트 되었습니다.</p>						
						<?php endif;?>						
					</div>														                                                                  
					
                </div>
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
