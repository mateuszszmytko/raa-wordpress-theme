<?php 
/*	Template Name: Front Page	*/

get_header(); ?>

<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-contents/content', 'homepage' );

	endwhile; // End of the loop.
	
?>

<?php get_footer();