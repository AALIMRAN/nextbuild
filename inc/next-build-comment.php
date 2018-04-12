<?php

add_filter('comment_form_default_fields', 'nextbuild_comment_form');

function nextbuild_comment_form($nextbuild_field)
{

    $nextbuild_field['author'] = '<input type="text" class="form-control" name="author" id="name-cmt" placeholder="Your Name">';
    $nextbuild_field['email'] =  '<input type="email" class="form-control" name="email" id="email-cmt" placeholder="Your Email">';

    $nextbuild_field['url'] = '
                    <input type="text" class="form-control" name="url" id="website" placeholder="Your Website">';
    return $nextbuild_field;
}


add_filter('comment_form_defaults', 'nextbuild_comment_default_form');

function nextbuild_comment_default_form($default_form)
{

    $default_form['comment_field'] = '<textarea class="form-control" name="comment" rows="3" placeholder="Message goes here"></textarea>';

    $default_form['submit_button'] = '<button type="submit" class="btn btn-primary btn-block">'.esc_html__('Post Comment', 'nextbuild').'</button></div>';

    $default_form['comment_notes_before'] = '';
    $default_form['title_reply'] = esc_html__('Leave A Comment', 'nextbuild');
    $default_form['title_reply_before'] = '<div class="widget-title"><h4>';
    $default_form['title_reply_after'] = '</h4><hr></div><div class="comment-form">';

    return $default_form;
}
