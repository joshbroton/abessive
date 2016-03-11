<?php

//Turn on sidebar widgets
if (!function_exists('abessive_widgets_init')) {
    function abessive_widgets_init()
    {
        register_sidebar(
            array(
                'name' => __('Main Sidebar', 'abessive-theme'),
                'id' => 'main-sidebar',
                'before_widget' => '<article class="widget">',
                'after_widget' => '</article>',
                'before_title' => '<h1 class="widget--title">',
                'after_title' => '</h1>',
            )
        );
    }
}