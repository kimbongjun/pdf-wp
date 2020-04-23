<?php
if ( ( is_user_logged_in() && wp_get_current_user()->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();   
    wp_deregister_style( 'wp-admin' );
}else{
	echo '글쓴이만 수정할 수 있습니다.';
}
get_header();
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>

</main><!-- #site-content -->


<?php get_footer(); ?>
