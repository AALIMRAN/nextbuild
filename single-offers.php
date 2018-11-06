<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nextbuild
 */

get_header();
?>
<?php nextbuild_page_header(); ?>
	<div id="primary" class="content-area">
		<main class="site-main">
		<section class="section white">
			<div class="container">
				<div class="row">
					<div id="content" class="single-post col-sm-12 col-xs-12">
						<div class="tabs-left">
						<ul class="nav nav-tabs col-md-3 col-sm-12">
							<?php
							$categories = get_terms( 'offers-categories' );
								$i      = 0;
							foreach ( $categories as $category ) {
								$message = 'Hello ' . ( $i ? $user->get( 'first_name' ) : 'Guest' );
								$i++;
								$active = ( ( 1 === $i ) ? 'active' : '' );
							?>
							<li class="<?php echo esc_attr( $active ); ?>"><a href="#<?php echo esc_attr( $category->slug ); ?>" data-toggle="tab" class=""><span class="fa fa-home"></span> <?php echo esc_html( $category->name ); ?></a></li>

							<?php } ?>
						</ul>
						<div id="myTabContent" class="tab-content col-md-9 col-sm-12">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content-single', 'offers' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; // End of the loop.
					?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();?>
