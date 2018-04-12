<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
        <main class="site-main singlepage">
        <?php nextbuild_page_layout(); ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();?>
