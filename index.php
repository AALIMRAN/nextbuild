<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nextbuild
 */

get_header();
?>
<?php
nextbuild_page_header();
?>

	<div id="primary" class="content-area">
		<main class="site-main">
		<section class="section white">
			<div class="container">
				<div class="row">
					<div id="content" class="col-md-8">
						<div class="row blog-list module-wrapper blog-widget text-center">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', get_post_format() );
							endwhile;

						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
						</div>
						<?php
							$pagination = get_the_posts_pagination( array(
								'type'               => 'list',
								'prev_text'          => '<span aria-hidden="true"><i class="fa fa-angle-left"></i></span>',
								'next_text'          => '<span aria-hidden="true"><i class="fa fa-angle-right"></i></span>',
								'screen_reader_text' => ' ',
							) );
							echo esc_html( str_replace( 'page-numbers', 'pagination', $pagination ) );
						?>
					</div>
					<div id="sidebar" class="col-md-4 col-sm-12 col-xs-12">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
