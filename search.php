<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nextbuild
 */

get_header();
?>

    <section id="primary" class="content-area">
        <main class="site-main">
        <?php if (have_posts()) : ?>
            <div class="page-title grey">
                <div class="container">
                    <div class="title-area row">
                        <div class="col-md-6">
                            <h2>
                        <?php
                        /* translators: %s: search query. */
                        printf(esc_html__('Search Results for: %s', 'nextbuild'), '<span>' . get_search_query() . '</span>');
                        ?></h2>
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
                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part('template-parts/content', 'search');
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
    </section><!-- #primary -->

<?php get_footer();?>
