<?php
/**
 * Enqueue scripts and styles.
 */
function nextbuild_scripts()
{

    // start jquery all css file

    wp_enqueue_style('next-build-fonts', nextbuild_fonts_url());
    wp_enqueue_style('next-build-settings', get_theme_file_uri('asset/rs-plugin/css/settings.css'));
    wp_enqueue_style('animate', get_theme_file_uri('asset/css/animate.css'));
    wp_enqueue_style('bootstrap', get_theme_file_uri('asset/css/bootstrap.css'));
    wp_enqueue_style('nextbuild-carousel', get_theme_file_uri('asset/css/carousel.css'));
    wp_enqueue_style('bootstrap-select', get_theme_file_uri('asset/css/bootstrap-select.css'));
    wp_enqueue_style('jquery-ui-css', get_theme_file_uri('asset/css/jquery-ui.css'));
    wp_enqueue_style('menumaker', get_theme_file_uri('asset/css/menumaker.css'));
    wp_enqueue_style('nextbuild-testimonial', get_theme_file_uri('asset/css/testimonial.css'));
    wp_enqueue_style('prettyPhoto', get_theme_file_uri('asset/css/prettyPhoto.css'));
    wp_enqueue_style('next-build-style', get_stylesheet_uri());
    wp_enqueue_style('next-build-custom', get_theme_file_uri('asset/css/custom.css'));


    // Next Build All Javascript File

    wp_enqueue_script('bootstrap', get_theme_file_uri('asset/js/bootstrap.js'), array('jquery'), '3.3.1', true);
    wp_enqueue_script('nextbuild-plugins', get_theme_file_uri('asset/js/plugins.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('isotope', get_theme_file_uri('asset/js/isotope.js'), array('jquery'), '1.5.25', true);
    wp_enqueue_script('menumaker', get_theme_file_uri('asset/js/menumaker.js'), array('jquery'), '1.0.0', true);

    wp_enqueue_script('imagesloaded', get_theme_file_uri('asset/js/imagesloaded.pkgd.js'), array('jquery'), '3.1.8', true);
    // wp_enqueue_script('masonary_left', get_theme_file_uri('asset/js/masonry_left.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('nextbuild-masonry', get_theme_file_uri('asset/js/masonry.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('bootstrap-select', get_theme_file_uri('asset/js/bootstrap-select.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('jquery.themepunch.tools.min', get_theme_file_uri('asset/rs-plugin/js/jquery.themepunch.tools.min.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('jquery.themepunch.revolution.min', get_theme_file_uri('asset/rs-plugin/js/jquery.themepunch.revolution.min.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('nextbuild-custom', get_theme_file_uri('asset/js/custom.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_script('nextbuild-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true);

    wp_enqueue_script('nextbuild-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'nextbuild_scripts');
