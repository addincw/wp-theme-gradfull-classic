<?php

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');

    //TODO: should change homepage display setting (settings/reading/homepage displays) programatically
    //TODO: should create post/article page (settings/reading/homepage displays) programatically

    //TODO: should register menus programatically
    // register_nav_menus([
    //     'gf_main_menus' => 'Main Menus',
    //     'gf_footer_menus' => 'Footer Menus',
    // ]);

    require get_template_directory() . '/inc/custom-post-types.php';
    require get_template_directory() . '/inc/helpers.php';
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('maincss', get_theme_file_uri('assets/main.css'));
    wp_enqueue_script('mainjs', get_theme_file_uri('assets/main.js'), [], false, true);
});

add_action('pre_get_posts', function (WP_Query $wpQuery) {
    if (!is_paged() && !is_archive() && $wpQuery->is_main_query()) {
        $wpQuery->set('posts_per_page', get_option('posts_per_page') - 1);
    }
});
