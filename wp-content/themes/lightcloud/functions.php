<?php
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('lightcloud', get_stylesheet_uri(), [], '1.0.0');
});
