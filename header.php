<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nextbuild
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- 	<div id="loader">
		<div class="loader-container">
			<img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/asset/images/load.gif" alt="" class="loader-site spinner">
		</div>
	</div> -->
<header class="header">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-12">
				<nav class="navbar yamm navbar-default">
					<div class="container-full">
						<div class="navbar-table">
							<div class="navbar-cell">
								<div class="navbar-header">

									<?php
									if ( class_exists( 'Redux' ) ) {
										$websitelogo = nextbuild_theme_options( 'nextbuild-logo', false, 'url' );
										?>

										<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $websitelogo ); ?>" alt="Ova"></a>
									<?php } else { ?>
										<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/asset/images/logo.png" alt="Ova"></a>
									<?php } ?>

								</div>
								<!-- end navbar-header -->
							</div>
							<!-- end navbar-cell -->
							<div class="navbar-cell">
								<div id="cssmenu">
									<?php
									wp_nav_menu(array(
										'theme_location' => 'primary-menu',
										'container'      => 'ul',
										'menu_class'     => 'nav navbar-nav navbar-right',
									));
										?>
								</div>
							</div>
							<!-- end navbar cell -->
						</div>
						<!-- end navbar-table -->
					</div>
					<!-- end container fluid -->
				</nav>
				<!-- end navbar -->
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</header>

<!-- end topbar -->

	<div id="wrapper" class="site-content">


