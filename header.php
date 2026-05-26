<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="header">
        <div class="header-inner">
            <h1 class="site-title">
                <a href="<?php echo home_url(); ?>" style="color:white; text-decoration:none;">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>

            <div class="site-description">
                <?php bloginfo('description'); ?>
            </div>
        </div>
    </div>

    <div class="banner">
        <img src="<?php header_image(); ?>" alt="Banner">
    </div>

    <div class="navbar">
        <div class="navbar-inner">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'nav-menu',
            ));
            ?>

        </div>
    </div>