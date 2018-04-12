<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nextbuild
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main class="site-main">
            <div class="page-title grey">
                <div class="container">
                    <div class="title-area row">
                        <div class="col-md-6">
                            <h2><?php esc_html_e('Page Not Found', 'nextbuild'); ?></h2>
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
                        <div class="col-md-12">
                            <div class="notfound text-center">
                                <h1><?php esc_html_e('404', 'nextbuild'); ?></h1>
                                <blockquote><?php esc_html_e('The page you are looking for no longer exists. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for. Or, you can try finding it with the information below.', 'nextbuild'); ?></blockquote>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary"><?php esc_html_e('Back to Home', 'nextbuild'); ?></a>
                            </div>
                        </div>
                    </div>
                </div><!-- end container -->
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();?>
