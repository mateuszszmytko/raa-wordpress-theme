<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<nav>
		<div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-2">
					
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php the_custom_logo(); ?> 
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
                </div>
                <div class="col-md-9 col-sm-10">
					<?php
						rwp_nav('primary');
					?>
                </div>
            </div>
            <a href="#" class="nav-btn"></a>
            
        </div>		
	</nav>


