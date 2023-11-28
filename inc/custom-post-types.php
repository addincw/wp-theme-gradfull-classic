<?php

add_action('init', function () {
    register_post_type('project', [
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'projects',
        ],
        'menu_icon' => 'dashicons-schedule',
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'all_items' => 'All Projects'
        ],
    ]);
});
