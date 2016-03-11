<?php

// Post Thumbnail Support
if (!function_exists('abessive_post_thumbnail_support')) {
    function abessive_post_thumbnail_support()
    {
        add_theme_support('post-thumbnails');
        //set_post_thumbnail_size(1200, 600);   // Uncomment to add post thumbnail sizes
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

// Set the max image width via $content_width
if (!function_exists('abessive_set_max_image_width')) {
    function abessive_set_max_image_width()
    {
        if (!isset($content_width)) {
            $content_width = 1200;
        }
    }
}

// Remove the inline width/height attributes on images, because it's not 2003
if (!function_exists('abessive_remove_width_attribute')) {
    function abessive_remove_width_attribute($html)
    {
        return preg_replace('/(width|height)="\d*"\s/', "", $html);
    }
}