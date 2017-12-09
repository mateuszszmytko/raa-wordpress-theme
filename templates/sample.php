<?php 
/*	Template Name: Sample template	*/
get_header(); ?>

<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'sample' );

	endwhile; // End of the loop.
	
?>
<p>hello world</p>
<?php get_footer();