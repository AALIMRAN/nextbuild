<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nextbuild
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main class="site-main">

        <?php if (have_posts()) : ?>
        <div class="page-title grey">
            <div class="container">
                <div class="title-area row">
                    <div class="col-md-6">
                        <?php
                        the_archive_title('<h2>', '</h2>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <?php
                                nextbuild_breadcrumb();
                                ?>
                            </ol>
                        </div>
                        <!-- end bread -->
                    </div>
                </div>
                <!-- /.pull-right -->
            </div>
        </div>

        <section class="section white">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-md-8">
        <?php
                        /* Start the Loop */
        while (have_posts()) :
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part('template-parts/content', get_post_type());
        endwhile;

        the_posts_navigation();
        else :
            get_template_part('template-parts/content', 'none');
        endif;
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

<?php get_footer();?>
