<?php

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('maincss', get_theme_file_uri('assets/main.css'));
    wp_enqueue_script('mainjs', get_theme_file_uri('assets/main.js'), [], false, true);
});
