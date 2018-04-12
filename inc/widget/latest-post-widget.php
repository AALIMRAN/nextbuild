<?php
/**
 * Adds nextbuild_latest_post_widget.
 */

class nextbuild_Latest_Post_Widget extends WP_Widget
{
    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'nextbuild_latest_post_widget',
            esc_html__('Next Build Latest Post', 'nextbuild'),
            array('description' => esc_html__('Next Build Latest Post Widget With Post Thumnail', 'nextbuild'))
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
    */

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo $args['before_title'] .apply_filters('widget_title', esc_html($instance['title'])). $args['after_title'];
        ?>
        <div class="recent-post-widget">
        <ul class="recent-posts">
            <?php
            $postcount = !empty($instance['postcount']) ? $instance['postcount'] : 5;
            $postdate = isset($instance['postdate']) ? $instance['postdate'] : false;
            $defautlpost = new WP_Query(array(
                'post_type' =>  array('post'),
                'posts_per_page'    =>  $postcount

            ));
            while ($defautlpost->have_posts()) :
                $defautlpost->the_post();?>
                <li>
                    <p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('nextbuild-latest-post-img', array('class' => 'alignleft')); ?><?php the_title(); ?></a></p>
                    <?php if ($postdate) { ?>
                    <span><?php nextbuild_posted_on(); ?></span>
                    <?php } ?>
                </li>
            <?php endwhile; ?>
                </ul><!-- end latest-tweet -->
            </div><!-- end twitter-widget -->

            <?php

            echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Latest Post', 'nextbuild');
        $postcount = !empty($instance['postcount']) ? $instance['postcount'] : 5;
        $postdate = isset($instance['postdate']) ? (bool) $instance['postdate'] : false;
        ?>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'nextbuild'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('postcount')); ?>"><?php esc_html_e('Post Count:', 'nextbuild'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('postcount')); ?>" name="<?php echo esc_attr($this->get_field_name('postcount')); ?>" type="text" value="<?php echo esc_attr($postcount); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('postdate')); ?>"><?php esc_html_e('Date Show:', 'nextbuild'); ?></label>
        <input class="checkbox" id="<?php echo esc_attr($this->get_field_id('postdate')); ?>" name="<?php echo esc_attr($this->get_field_name('postdate')); ?>" type="checkbox"<?php checked($postdate);?>">
        </p>

        <?php
    }


     /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */

    // public function update($new_instance, $old_instance)
    // {
    // }
}


add_action('widgets_init', 'nextbuild_latest_post_widget');

function nextbuild_latest_post_widget()
{
    register_widget('nextbuild_Latest_Post_Widget');
}