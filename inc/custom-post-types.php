<?php

add_action('init', function () {
    register_post_type('project', [
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-schedule',
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'all_items' => 'All Projects'
        ],
    ]);

    register_post_type('contact', [
        'public' => false,
        'show_in_rest' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-email',
        'labels' => [
            'name' => 'Contacts',
            'singular_name' => 'Contact',
            'add_new_item' => 'Add New Contact',
            'edit_item' => 'Edit Contact',
            'all_items' => 'All Contacts'
        ],
    ]);
});
