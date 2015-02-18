<?php

if(!function_exists('abessive_register_menus')) {
    function abessive_register_menus() {
        register_nav_menus(array(
            'primary_navigation' => __('Primary Navigation', 'abessive-theme'),
            'footer_navigation' => __('Footer Navigation', 'abessive-theme'),
        ));
    }
}