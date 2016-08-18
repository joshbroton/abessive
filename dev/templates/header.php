<!doctype html>
<html class="no-js" lang="en">
<head>
    <!__ METADATA __>
    <title><?php wp_title(''); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!__ ICONS __>
    <link href="<?php echo get_template_directory_uri(); ?>img/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png"         rel="apple-touch-icon" />
    <link href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-76x76.png"   rel="apple-touch-icon" sizes="76x76" />
    <link href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
    <link href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
    <link href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />

    <?php wp_head(); ?>

    <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<a class="button skip-nav-link" href="#main">Skip to main content</a>
<div class="wrapper">
    <header class="body__header" role="banner">
        <?php if(is_front_page()) : ?>
        <h1 class="blog-name">
            <?php bloginfo('name'); ?>
        </h1>
        <?php else : ?>
        <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
            <h1 class="blog-name">
                <?php bloginfo('name'); ?>
            </h1>
        </a>
        <?php endif; ?>

        <nav class="main-nav" role="navigation">
            <?php
            if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'main-nav__menu'));
            endif;
            ?>
        </nav>
    </header>