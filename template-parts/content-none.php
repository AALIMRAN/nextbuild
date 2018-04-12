<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nextbuild
 */

?>

<section class="no-results not-found">
        <div class="page-title grey">
            <div class="container">
                <div class="title-area row">
                    <div class="col-md-6">
                        <h2><?php esc_html_e('Nothing Found', 'nextbuild'); ?></h2>
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
           <div class="section white">
            <div class="container">

                <div class="row">
                    <div id="content" class="col-md-8">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'nextbuild'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );
        elseif (is_search()) :
            ?>

            <blockquote><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nextbuild'); ?></blockquote>
            <?php
            get_search_form();
        else :
            ?>

            <blockquote><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nextbuild'); ?></blockquote>
            <?php
            get_search_form();
        endif;
        ?>

            </div><!-- .page-content -->
            <div id="sidebar" class="col-md-4 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
</section><!-- .no-results -->
