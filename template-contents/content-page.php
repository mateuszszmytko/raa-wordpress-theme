<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RWP
 */

?>

<main id="post-<?=the_ID()?>" <?php post_class(); ?>>
	<header class="page__header">
		<div class="container">
			<?php the_title( '<h2 class="page__title">', '</h2>' ); ?>
		</div>
	</header>

	<section class="page__content">
		<div class="container">
				<?php
					the_content();
					get_template_part( 'template-parts/part', 'sample' );
				?>
		</div>
	</section>
</main>

