<?php

//Turn on sidebar widgets
if (!function_exists('abessive_widgets_init')) {
    function abessive_widgets_init()
    {
        register_sidebar(
            array(
                'name' => __('Main Sidebar', 'main-sidebar'),
                'id' => 'sidebar-1',
                'before_widget' => '<article class="widget">',
                'after_widget' => '</article><hr />',
                'before_title' => '<h1 class="widget--title">',
                'after_title' => '</h1>',
            )
        );
    }
}