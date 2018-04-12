<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nextbuild
 */

?>

    </div><!-- #content -->
    <?php if (is_active_sidebar('footer-sidebar-one') || is_active_sidebar('footer-sidebar-two') || is_active_sidebar('footer-sidebar-three') || is_active_sidebar('footer-sidebar-four')) {
        get_template_part('template-parts/sidebar', 'footer');
    } ?>
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php if (class_exists('Redux')) { ?>
                        <p><?php echo nextbuild_theme_options('copyrighttext'); ?></p>
                    <?php }else{ ?>
                    <p><?php esc_html_e('2017 - 2018 Next Build Pty Ltd. by', 'nextbuild') ?> <a title="<?php esc_attr_e('Next Theme', 'nextbuild'); ?>" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Next Theme', 'nextbuild'); ?></a></p>
                    <?php } ?>
                    <?php wp_nav_menu(array(
                        'theme_location'    =>  'footer-menu',
                        'menu_class'        =>  'list-inline',
                        'container'         =>  'ul'
                        )); ?>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
