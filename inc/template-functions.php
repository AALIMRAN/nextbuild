<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package nextbuild
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nextbuild_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (! is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}
add_filter('body_class', 'nextbuild_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function nextbuild_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}
add_action('wp_head', 'nextbuild_pingback_header');

/*
* Next Build Breadcrumb
*/

if (!function_exists('nextbuild_breadcrumb')) {
    function nextbuild_breadcrumb()
    {

        if (function_exists('bcn_display')) {
               bcn_display();
        }
    }
}

/*
* Next Build Page Header
*/
if (!function_exists('nextbuild_page_header')) {
    function nextbuild_page_header()
    {
        if (is_single() || is_home()) {
            ?>
         <div class="page-title grey">
            <div class="container">
                <div class="title-area row">
                    <div class="col-md-6">
                        <h2>
                        <?php 
                            if (is_home()) {
                                esc_html_e('Home', 'nextbuild');
                            }else{
                                wp_title(' ');
                            }
                         ?>
                        </h2>
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
            <?php
        } else {
            if (function_exists('get_field') || is_page()) {
                $pageheader = get_field('header_on_off');
                if ($pageheader == true) {
                    ?>
                     <div class="page-title grey">
                        <div class="container">
                            <div class="title-area row">
                                <div class="col-md-6">
                                     <h2>
                                    <?php $custompagetitle = get_field('custom_page_title');
                                    if (is_front_page()) {
                                        esc_html_e('Home', 'nextbuild');
                                    } elseif (!empty($custompagetitle)) {
                                        echo esc_html($custompagetitle);
                                    } else {
                                        wp_title(' ');
                                    }
                                        ?>
                                    </h2>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="bread">
                                        <ol class="breadcrumb">
                                            <?php nextbuild_breadcrumb(); ?>
                                        </ol>
                                    </div>
                                    <!-- end bread -->
                                </div>
                            </div>
                            <!-- /.pull-right -->
                        </div>
                    </div>
                    <?php
                }else{
                    if (!isset($pageheader)) {
                        ?>
                        <div class="page-title grey">
                            <div class="container">
                                <div class="title-area row">
                                    <div class="col-md-12">
                                       <h2><?php esc_html_e('You are able to enable / disable page header from page meta box', 'nextbuild'); ?></h2>
                                    </div>
                                    
                                </div>
                                <!-- /.pull-right -->
                            </div>
                        </div>
                        <?php 
                    }
                }
            }else{
                if (!function_exists('get_field') || is_front_page()) {
                   ?>
                <div class="page-title grey">
                    <div class="container">
                        <div class="title-area row">
                            <div class="col-md-6">
                               <h2><?php esc_html_e('Home', 'nextbuild'); ?></h2>
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
                   <?php
                }
            }
        }
    }
}


/*
* Page Layout Select 
*/

if (!function_exists('nextbuild_page_layout')) {
    function nextbuild_page_layout(){
        $pagelayout = 'right-sidebar';
        if (function_exists('get_field')) {
            $pagelayoutselect = get_field('page_layout_select');
            if ($pagelayoutselect == 'no-sidebar') {
                $pagelayout = 'no-sidebar';
            }elseif ($pagelayoutselect == 'left-sidebar') {
                $pagelayout = 'left-sidebar';
            }elseif ($pagelayoutselect == 'right-sidebar') {
                $pagelayout = 'right-sidebar';
            }else{
                 $pagelayout = 'right-sidebar';
            }
        }
      get_template_part('template-parts/page', $pagelayout);
    }
}


/*
*redux framework options 
*/

if (! function_exists('nextbuild_theme_options')) {
    function nextbuild_theme_options($id, $fallback = false, $key = false)
    {
        global $nextbuild_options;
        if ($fallback == false) {
            $fallback = '';
        }
        $output = ( isset($nextbuild_options[ $id ]) && $nextbuild_options[ $id ] !== '' ) ? $nextbuild_options[ $id ] : $fallback;
        if (! empty($nextbuild_options[ $id ]) && $key) {
            $output = $nextbuild_options[ $id ][ $key ];
        }

        return $output;
    }
}

/*
 *start post views function 
 *
 */

if (!function_exists('nextbuild_post_views_fc')) {
    function nextbuild_post_views_fc($postid){
        $metakey = 'nextbuild_post_views';
        $views = get_post_meta( $postid, $metakey, true );
        $count = (empty($views) ? 0 : $views);
        $count++;
        update_post_meta( $postid, $metakey, $count );
        echo $views;
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
/*
*image post format
*/

if (!function_exists('nextbuild_image_attachment')) {
    function nextbuild_image_attachment($number = 1){
        $output = '';
        if (has_post_thumbnail() && $number == 1) :
            echo '<div class="blog-image">';
                the_post_thumbnail();
            echo '</div>';
        else:
            $attachments = get_posts( array(
                'post_type' =>  'attachment',
                'posts_per_page'    =>  $number,
                'post_parent'   =>  get_the_ID()
            ) );
            if ( $attachments && $number == 1 ) :
                foreach ($attachments as $attachment) :
                    echo '<div class="blog-image">';
                    $output = wp_get_attachment_image($attachment->ID, 'nextbuild-post-thumbnail');
                    echo '</div>';
                endforeach;
            elseif ($attachments && $number > 1) :
                $output = $attachments;
            elseif (in_array(0, $attachments)) :
                $output = '';
            endif;
        wp_reset_postdata();
        endif;
    return $output;
    }
}

/*Function for Audio video Post Formate*/

if (!function_exists('nextbuild_embedded_media')) {
    function nextbuild_embedded_media($types = array()){
        $content = do_shortcode(apply_filters( 'the_content', get_the_content() ));
        $embeded = get_media_embedded_in_content( $content, $types );
        if (in_array(0, $embeded)) :
            $output = $embeded[0];
        else:
            $output = '';
        endif;
        return $output;
    }
}


/*
* Gallery Post Slider 
*/


if (!function_exists('nextbuild_gallery_post_slider')) {
    function nextbuild_gallery_post_slider(){
        ?>
        <?php 
       $gallarys = nextbuild_image_attachment(7); 

       if ($gallarys > 1) :
           ?>
            <div class="media-element">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                    <?php 
                    $i = 0;
                    foreach ($gallarys as $gallery): 
                        $active = ($i == 0 ? ' active' : '');?>
                        <div class="item<?php echo $active;?>">
                            <?php $image = wp_get_attachment_image($gallery->ID, 'nextbuild-post-thumbnail', '', array('class' => 'img-responsive')); 
                            print $image;
                            ?>
                        </div>
                    <?php $i++; endforeach; ?>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                        <span class="sr-only"><?php esc_html_e('Previous', 'nextbuild'); ?></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                        <span class="sr-only"><?php esc_html_e('Next', 'nextbuild'); ?></span>
                    </a>
                </div>
            </div>
        <?php 
       else :
            echo nextbuild_image_attachment();
       endif;
       ?>
            
        <?php 
    }
}


/*
* Single Page Header
*/


if (!function_exists('nextbuild_single_post_header')) {
    function nextbuild_single_post_header(){
        if (get_post_format() == 'image') :
            echo nextbuild_image_attachment();
        elseif (get_post_format() == 'video') :
            echo nextbuild_embedded_media();
        elseif (get_post_format() == 'gallery') :
            nextbuild_gallery_post_slider();
        else : 
            echo nextbuild_image_attachment();
        endif;

    }
}