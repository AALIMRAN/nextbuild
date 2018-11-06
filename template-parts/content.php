<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nextbuild
 */
$postcount = wp_count_posts()->publish;
$postcount = ($postcount == 1 ? '0' : '');
?>
<div id="post-<?php the_ID();?>" <?php post_class("col-md-6 single-blog col-sm-6"); ?> style="margin-bottom:<?php echo esc_attr($postcount); ?>">
    <div class="blog-wrapper" style="margin-bottom:<?php echo esc_attr($postcount); ?>"">
        <?php if (has_post_thumbnail()): ?>
        <div class="blog-image">
            <?php
                the_post_thumbnail();
            ?>
        </div>
        <?php else: ?>
        <div class="blog-image">
            <?php
            $postcount = wp_count_posts();
               echo nextbuild_image_attachment();
            ?>
        </div>
        <?php endif; ?>
        <!-- end image -->
        <div class="blog-title">
            <?php $categories = get_the_terms($post->ID, 'category');
            if ($categories != false) :
                foreach ($categories as $category) :?>
                    <a class="category_title" href="<?php echo esc_url(get_category_link($category->term_id)); ?>" title=""><?php echo esc_html($category->name); ?></a>
            <?php endforeach;
                endif;?>
            <?php the_title('<h2><a href="'.esc_attr(get_permalink()).'">', '</a></h2>');?>
            <div class="post-meta">
                <span>
                    <i class="fa fa-user"></i>
                    <?php nextbuild_posted_by(); ?>
                </span>
                <span>
                    <?php
                    if ($categories != false) :
                        foreach ($categories as $category) : ?>
                         <i class="fa fa-tag"></i>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" title=""><?php echo esc_html($category->name); ?></a>
                    <?php endforeach;
                    endif;?>
                </span>
                <span>
                    <i class="fa fa-comments"></i>
                    <?php comments_popup_link(esc_html__('No Comment Yet', 'nextbuild'), esc_html__('One Comment', 'nextbuild'), esc_html__('% Comments', 'nextbuild')); ?>
                </span>
            </div>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block"><?php esc_html_e('Read more', 'nextbuild'); ?></a>

        </div>
            <!-- end desc -->
    </div>
            <!-- end blog-wrapper -->
</div>
