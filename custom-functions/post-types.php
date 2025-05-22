<?php

//Set Up Custom Post Type for Videos

function fbf_videos() {
    $labels = array(
        'name'               => _x( 'Videos', 'videos' ),
        'singular_name'      => _x( 'Video', 'video' ),
        'add_new'            => _x( 'Add New', 'video' ),
        'add_new_item'       => __( 'Add New Video' ),
        'edit_item'          => __( 'Edit Video' ),
        'new_item'           => __( 'New Video' ),
        'all_items'          => __( 'All Videos' ),
        'view_item'          => __( 'View Video' ),
        'search_items'       => __( 'Search Videos' ),
        'not_found'          => __( 'No videos found' ),
        'not_found_in_trash' => __( 'No videos found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Videos'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Videos',
        'public'        => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-video-alt3',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author' ),
        'has_archive'   => true,
    );
    register_post_type( 'videos', $args );
}


// Setup Custom Taxonomy for Gallery Custom Post Type

function fbf_gallery_tax() {
    $labels = array(
        'name'              => _x( 'Gallery Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Gallery Categories' ),
        'all_items'         => __( 'All Gallery Categories' ),
        'parent_item'       => __( 'Parent Gallery Category' ),
        'parent_item_colon' => __( 'Parent Gallery Category:' ),
        'edit_item'         => __( 'Edit Gallery Category' ),
        'update_item'       => __( 'Update Gallery Category' ),
        'add_new_item'      => __( 'Add New Gallery Category' ),
        'new_item_name'     => __( 'New Gallery Category' ),
        'menu_name'         => __( 'Gallery Categories' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
    );
    register_taxonomy( 'gallery_category', 'gallery', $args );
}


// Setup Custom Taxonomy for Videos Custom Post Type

function fbf_videos_tax() {
    $labels = array(
        'name'              => _x( 'Video Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Video Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Video Categories' ),
        'all_items'         => __( 'All Video Categories' ),
        'parent_item'       => __( 'Parent Video Category' ),
        'parent_item_colon' => __( 'Parent Video Category:' ),
        'edit_item'         => __( 'Edit Video Category' ),
        'update_item'       => __( 'Update Video Category' ),
        'add_new_item'      => __( 'Add New Video Category' ),
        'new_item_name'     => __( 'New Video Category' ),
        'menu_name'         => __( 'Video Categories' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
    );
    register_taxonomy( 'video_category', 'videos', $args );
}

function fbf_staff() {
    $labels = array(
        'name'               => _x( 'Staff', 'staff' ),
        'singular_name'      => _x( 'Staff', 'staff' ),
        'add_new'            => _x( 'Add New', 'staff' ),
        'add_new_item'       => __( 'Add New Member' ),
        'edit_item'          => __( 'Edit Member' ),
        'new_item'           => __( 'New Member' ),
        'all_items'          => __( 'All Staff' ),
        'view_item'          => __( 'View Member' ),
        'search_items'       => __( 'Search Staff' ),
        'not_found'          => __( 'No Staff found' ),
        'not_found_in_trash' => __( 'No Staff found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Staff',

    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Staff',
        'public'        => true,
        'menu_icon'     => 'dashicons-groups',
        'menu_position' => 6,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author' ),
        'has_archive'   => true,
        'show_in_rest' => true,
        'template' => array(
            array( 'acf/staff-profile', array(
                'align' => 'full',
            ) ),
        )
    );
    register_post_type( 'staff', $args );
}

function fbf_character() {
    $labels = array(
        'name'               => _x( 'Characters', 'character' ),
        'singular_name'      => _x( 'Character', 'character' ),
        'add_new'            => _x( 'Add New', 'character' ),
        'add_new_item'       => __( 'Add New Character' ),
        'edit_item'          => __( 'Edit Character Information' ),
        'new_item'           => __( 'New Character' ),
        'all_items'          => __( 'All Characters' ),
        'view_item'          => __( 'View Character' ),
        'search_items'       => __( 'Search Character' ),
        'not_found'          => __( 'No Characters found' ),
        'not_found_in_trash' => __( 'No Characters found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Character Vault'

    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Roleplaying Characters',
        'public'        => true,
        'menu_icon'     => 'dashicons-groups',
        'menu_position' => 9,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author' ),
        'has_archive'   => true,
        'show_in_rest' => true,
        'template' => array(
            array( 'acf/character-profile', array(
                'align' => 'full',
            ) ),
        )
    );
    register_post_type( 'character', $args );
}

function fbf_campaign() {
    $labels = array(
        'name'               => _x( 'Campaigns', 'campaign' ),
        'singular_name'      => _x( 'Campaign', 'campaign' ),
        'add_new'            => _x( 'Add New', 'campaign' ),
        'add_new_item'       => __( 'Add New DND Campaign' ),
        'edit_item'          => __( 'Edit Campaign Information' ),
        'new_item'           => __( 'New Campaign' ),
        'all_items'          => __( 'All Campaigns' ),
        'view_item'          => __( 'View Campaign' ),
        'search_items'       => __( 'Search Campaign' ),
        'not_found'          => __( 'No Campaigns found' ),
        'not_found_in_trash' => __( 'No Campaigns found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Campaigns'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our DND Campaigns',
        'public'        => true,
        'menu_icon'     => 'dashicons-groups',
        'menu_position' => 9,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author' ),
        'has_archive'   => true,
        'show_in_rest' => true,
        'template' => array(
            array( 'acf/campaign-details', array(
                'align' => 'full',
            ) ),
            array( 'acf/campaign-characters', array(
            ) ),
        )
    );
    register_post_type( 'campaigns', $args );
}


function fbf_events() {
    $labels = array(
        'name'               => _x( 'Events', 'events' ),
        'singular_name'      => _x( 'Event', 'events' ),
        'add_new'            => _x( 'Add New', 'events' ),
        'add_new_item'       => __( 'Add New Event' ),
        'edit_item'          => __( 'Edit Event' ),
        'new_item'           => __( 'New Event' ),
        'all_items'          => __( 'All Events' ),
        'view_item'          => __( 'View Event' ),
        'search_items'       => __( 'Search Events' ),
        'not_found'          => __( 'No Events Found' ),
        'not_found_in_trash' => __( 'No Events found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Events'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'We love heading to conventions, and this is where you will find the details about the conventions we are heading to.',
        'public'        => true,
        'menu_icon'     => 'dashicons-calendar',
        'menu_position' => 7,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author' ),
        'has_archive'   => true,
        'show_in_rest' => true,
        'template' => array(
            array( 'acf/event-details', array(
                'align' => 'full',
            ) ),
            array( 'acf/event-attendees', array(
            ) ),
        )
    );
    register_post_type( 'events', $args );
}
// Setup Custom Taxonomy for Videos Custom Post Type

function fbf_events_tax() {
    $args = array(
        'query_var' => true,
    );
    register_taxonomy( 'events_category', 'events', $args );
}

function fbf_gallery() {
    $labels = array(
        'name'               => _x( 'Galleries', 'gallery' ),
        'singular_name'      => _x( 'Gallery', 'gallery' ),
        'add_new'            => _x( 'Add New', 'gallery' ),
        'add_new_item'       => __( 'Add New Gallery' ),
        'edit_item'          => __( 'Edit Gallery' ),
        'new_item'           => __( 'New Gallery' ),
        'all_items'          => __( 'All Galleries' ),
        'view_item'          => __( 'View Gallery' ),
        'search_items'       => __( 'Search Galleries' ),
        'not_found'          => __( 'No Galleries Found' ),
        'not_found_in_trash' => __( 'No Galleries found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Galleries'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Take a look at the stunning photos we\'ve taken over the years!',
        'public'        => true,
        'menu_icon'     => 'dashicons-images-alt',
        'menu_position' => 8,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author' ),
        'has_archive'   => true,
    );
    register_post_type( 'gallery', $args );
}

//Set Up Custom Post Type for Achievements

function achievements() {
  $labels = array(
    'name'               => _x( 'Achievements', 'achievements' ),
    'singular_name'      => _x( 'Achievement', 'achievement' ),
    'add_new'            => _x( 'Add New', 'achievement' ),
    'add_new_item'       => __( 'Add New Achievement' ),
    'edit_item'          => __( 'Edit Achievement' ),
    'new_item'           => __( 'New Achievement' ),
    'all_items'          => __( 'All Achievements' ),
    'view_item'          => __( 'View Achievement' ),
    'search_items'       => __( 'Search Achievements' ),
    'not_found'          => __( 'No achievements found' ),
    'not_found_in_trash' => __( 'No achievements found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Achievements'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Achievements',
    'public'        => true,
    'menu_position' => 5,
    'menu_icon'     => 'dashicons-star-filled',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author' ),
    'has_archive'   => true,
  );
  register_post_type( 'achievements', $args );
}

add_action( 'init', 'achievements' );

// Init

add_action( 'init', 'fbf_videos' );
add_action( 'init', 'fbf_events' );
add_action( 'init', 'fbf_gallery' );
add_action( 'init', 'fbf_staff' );
add_action( 'init', 'fbf_character' );
add_action( 'init', 'fbf_campaign' );
add_action( 'init', 'fbf_videos_tax', 0 );
add_action( 'init', 'fbf_events_tax', 0 );
add_action( 'init', 'fbf_gallery_tax', 0);
