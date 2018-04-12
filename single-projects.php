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
                    <div id="content" class="single-post col-md-12">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content-single', 'project');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    endwhile; // End of the loop.
                    ?>
                    </div>

                </div>
            </div>
        </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();?>
