<?php

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');

    //TODO: should change homepage display setting (settings/reading/homepage displays) programatically

    //TODO: should register menus programatically
    // register_nav_menus([
    //     'gf_main_menus' => 'Main Menus',
    //     'gf_footer_menus' => 'Footer Menus',
    // ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('maincss', get_theme_file_uri('assets/main.css'));
    wp_enqueue_script('mainjs', get_theme_file_uri('assets/main.js'), [], false, true);
});
