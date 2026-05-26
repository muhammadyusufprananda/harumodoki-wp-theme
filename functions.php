<?php

function harumodoki_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'main-menu' => 'Main Menu'
    ));
}

add_action('after_setup_theme', 'harumodoki_theme_setup');

function harumodoki_assets()
{
    wp_enqueue_style(
        'harumodoki-style',
        get_stylesheet_uri()
    );
}

add_action('wp_enqueue_scripts', 'harumodoki_assets');
add_theme_support('post-thumbnails');

function harumodoki_download_box($atts, $content = null)
{

    $rows = explode("\n", trim($content));

    $output = '<div class="download-box">';
    $output .= '<div class="download-box-title">Tautan Unduh:</div>';

    $current_filename = '';

    foreach ($rows as $row) {

        $parts = explode('|', trim($row));

        if (count($parts) == 3) {

            $filename = trim($parts[0]);
            $mirror = trim($parts[1]);
            $link = trim($parts[2]);

            if ($current_filename != $filename) {

                $current_filename = $filename;

                $output .= '<div class="download-filename">';
                $output .= '' . $filename . '';
                $output .= '</div>';
            }

            $output .= '<div class="download-item">';
            $output .= '<a href="' . $link . '" target="_blank">';
            $output .= $mirror;
            $output .= '</a>';
            $output .= '</div>';
        }
    }

    $output .= '</div>';

    return $output;
}

add_shortcode('download', 'harumodoki_download_box');

function harumodoki_posts_per_page($query)
{

    if (!is_admin() && $query->is_main_query()) {

        if (
            is_home() ||
            is_archive() ||
            is_search() ||
            is_tag() ||
            is_category()
        ) {
            $query->set('posts_per_page', 2);
        }
    }
}

add_action('pre_get_posts', 'harumodoki_posts_per_page');

function harumodoki_widgets_init() {

    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar',

        'before_widget' =>
            '<div class="box widget">',

        'after_widget' =>
            '</div>',

        'before_title' =>
            '<div class="box-title">',

        'after_title' =>
            '</div>',
    ));
}

add_action('widgets_init', 'harumodoki_widgets_init');

add_theme_support('custom-header', array(
    'width' => 960,
    'height' => 240,
    'flex-height' => true,
    'random-default' => true,
    'uploads' => true,
));