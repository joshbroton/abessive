<?php

//Post Thumbnail Support
if (!function_exists('abessive_post_thumbnail_support')) {
    function abessive_post_thumbnail_support()
    {
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 600);
    }
}

// Link post thumbnail to post permalink
if (!function_exists('abessive_post_image_html')) {
    function abessive_post_image_html($html, $post_id, $post_image_id)
    {
        return '<a href="' . get_permalink($post_id) . '" title="' .
        esc_attr(get_post_field('post_title', $post_id)) . '">' . $html . '</a>';
    }
}