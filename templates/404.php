<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package raa_theme
 */

get_header(); ?>
<main class="error-404 not-found">
	<header class="page__header">
		<div class="container">
			<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'RWP' ); ?></h2>
		</div>
	</header>

	<section class="page__content">
		<div class="container">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'RWP' ); ?></p>
		</div>
	</section>
</main>
	
<?php
get_footer();
