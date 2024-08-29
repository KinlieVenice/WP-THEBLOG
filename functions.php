<?php
function theblog_assets() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style/main.css', microtime());

    wp_enqueue_script("slider-script", "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", [], "1.0", true );
    wp_enqueue_script("main-js", get_template_directory_uri() . '/script/script.js', [], microtime(), true );
}
add_action('wp_enqueue_scripts', 'theblog_assets');

function theblog_theme_support() {
    add_theme_support ( 'post-thumbnails');
}

add_action('after_setup_theme', 'theblog_theme_support');