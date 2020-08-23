<?php
/**
* Plugin Name: AddEvents
* Plugin URI:
* Description: Admins function to add, edit or remove Events.
* Version: 1.0
* Author: PL
* Author URI:
**/


add_action('admin_menu', function(){
    add_menu_page( 'Events', 'Events', 'manage_options', 'events', 'event_list');
    add_submenu_page( '', 'Create Event', null, 'manage_options', 'new event', 'new_event', 'wpse_enqueue_datepicker' );
    add_submenu_page( '', 'Edit Event', null, 'manage_options', 'edit event', 'edit_event' );
    add_submenu_page( '', 'Delete Event', null, 'manage_options', 'delete event', 'delete_event' );
});

add_action( 'init', function(){
    $labels = [
        'name'                  => 'Events',
        'singular_name'         => 'Event',
        'menu_name'             => 'Events',
        'name_admin_bar'        => 'Events',
        'add_new'               => __( 'Add New', 'event' ),
        'add_new_item'          => __( 'Add New event', 'event' ),
        'new_item'              => __( 'New event', 'event' ),
        'edit_item'             => __( 'Edit event', 'event' ),
        'view_item'             => __( 'View event', 'event' ),
        'all_items'             => __( 'All events', 'event' ),
        'search_items'          => __( 'Search events', 'event' ),
        'parent_item_colon'     => __( 'Parent events:', 'event' ),
        'not_found'             => __( 'No events found.', 'event' ),
        'featured_image'        => _x( 'event Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'event' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'event' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'event' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'event' ),
        'archives'              => _x( 'event archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'event' ),
        'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'event' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'event' ),
        'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'event' ),
        'items_list_navigation' => _x( 'events list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'event' ),
        'items_list'            => _x( 'events list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'event' ),
    ];     
    $args = [
        'labels'             => $labels,
        'description'        => 'Event custom post type.',
        'public'             => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => ['title', 'editor', 'author', 'thumbnail' ],
        'show_in_rest'       => true
    ]; 
    register_post_type( 'event', $args );
});

add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {

    wp_register_style( 'admin.css', plugin_dir_url( __FILE__ ) . 'css/admin.css');
    wp_enqueue_style( 'admin.css');
}  

function event_list(){
    
    require_once __DIR__ . '/views/event_list.php';
       
}

function new_event(){

    require __DIR__ . '/views/new_event.php';
    if(isset($_POST['event'])){
        $new_post = [
            'post_type' => 'event',
            'post_title' => $_POST['event_title'],
            'post_content' => '',
            'post_status' => 'publish', 
            'post_author' => get_current_user_id(), 
            'meta_input' => [
                'text' => $_POST['event_text'],
                'date' => $_POST['event_date'], 
            ]
        ];

        wp_insert_post( $new_post );
        wp_redirect('http://localhost:8080/wordpress/wp-admin/admin.php?page=ivykiai');



    }
}

function edit_event(){
    require_once __DIR__ . '/views/edit_event.php';

    if(isset($_POST['event_update'])){
        $new_post = [
            'ID' => $_GET['id'],
            'post_title' => $_POST['event_title'],
            'meta_input' => [
                'text' => $_POST['event_text'],
                'date' => $_POST['event_date'], 
            ]
        ];
        wp_update_post( $new_post );
        wp_redirect('http://localhost:8888/wordpress/wp-admin/admin.php?page=events');
        exit;
    }
  
}

function delete_event(){

    wp_delete_post($_GET['id']);
}