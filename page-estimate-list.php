<?php
get_header();
?>

<main id="site-content" role="main">

	<?php
    global $post;
    $post_slug = $post->post_name;
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', $post_slug );
		}
	}

	?>

</main><!-- #site-content -->


<?php get_footer(); ?>
