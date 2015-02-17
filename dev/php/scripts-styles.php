<?php

/*
 * ENQUEUE SCRIPTS AND STYLES
 */

if(!function_exists('abessive_scripts_method')) {
    function abessive_scripts_method()
    {
        //script includes
        wp_enqueue_script('abessive_modernizr', get_template_directory_uri() . '/js/vendor/modernizr.2.8.3.min.js');
        wp_enqueue_script('abessive_app', get_template_directory_uri() . '/js/site/app.js','', '', true);

        //stylesheet includes
        wp_enqueue_style('google_fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,300)', false);
        wp_enqueue_style('abessive_main_styles', get_template_directory_uri() . '/css/styles.css', false);
    }
}

add_action('wp_enqueue_scripts', 'abbessive_scripts_method', 100);