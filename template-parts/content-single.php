<div class="blog-wrapper">
<?php 
nextbuild_single_post_header(); 
?>
    <div class="blog-title">
        <?php $categories = get_the_terms($post->ID, 'category');
        foreach ($categories as $category) { ?>
                    <a class="category_title" href="<?php echo esc_url(get_category_link($category->term_id)); ?>" title=""><?php echo esc_html($category->name); ?></a>
        <?php } ?>
       
        <div class="post-meta">
            <span>
            <i class="fa fa-user"></i>
            <?php nextbuild_posted_by(); ?>
            </span>
            <span>
            <i class="fa fa-tag"></i>
            <?php the_tags(); ?>
            </span>
            <span>
            <i class="fa fa-comments"></i>
            <?php comments_popup_link(esc_html__('No Comment Yet', 'nextbuild'), esc_html__('One Comment', 'nextbuild'), esc_html__('% Comments', 'nextbuild')); ?>
            </span>
            <span>
            <i class="fa fa-clock-o"></i>
            <?php nextbuild_posted_on(); ?>
            </span>
            <?php if (function_exists('nextbuild_post_views_fc')) : ?>
            <span>
            <i class="fa fa-eye"></i>
                <?php nextbuild_post_views_fc(get_the_ID()); ?>
            </span>
            <?php endif; ?>
            <?php if (function_exists('A2A_SHARE_SAVE_init')) : ?>
            <span>
            <i class="fa fa-share-alt"></i>
            <?php echo do_shortcode('[addtoany]'); ?>
            </span>
            <?php endif; ?>

        </div>
        <?php the_content(); ?>
        <?php 
            wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'nextbuild'),
            'after'  => '</div>',
        ));
          ?>
    </div><!-- end desc -->
</div><!-- end blog-wrapper -->
