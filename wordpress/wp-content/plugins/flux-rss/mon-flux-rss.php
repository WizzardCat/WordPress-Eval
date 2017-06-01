<?php

/*
Plugin Name: Mon Flux RSS
Plugin URI:
Description:
Version: 1.0
Author: WizzardCat
Author URI:
*/

/*----------------------------------------------------------------*/
/* Déclaration du CPT
/*----------------------------------------------------------------*/

add_action( 'init', '__fluxRss_fluxRss_init' );
function __fluxRss_fluxRss_init()
{
    $labels = array(
        'name'               => 'fluxRss',
        'singular_name'      => 'fluxRss',
        'all_items'          => 'Tous les fluxRss',

        'add_new'            => 'Ajouter un fluxRss',
        'add_new_item'       => 'Ajouter un nouveau fluxRss',
        'edit_item'          => 'Editer un fluxRss',
        'new_item'           => 'Un nouveau fluxRss',
        /*
        'view_item'          => 'View Book',
        'search_items'       => 'Search Books',
        'not_found'          => 'No books found',
        'not_found_in_trash' => 'No books found in Trash',
        'parent_item_colon'  => '',
        */
        'menu_name'          => 'fluxRss'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'rewrite'            => array( 'slug' => 'fluxRss' ),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5, // On positionne le CPT en dessous d'article
        'menu_icon'			 => 'dashicons-desktop', // Identifiant de l'icône disponible sur http://melchoyce.github.io/dashicons/
        'supports'           => array( 'title' )
    );

    register_post_type( 'fluxRss', $args );

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'               => 'Compétences',
        'singular_name'      => 'Compétence',
        'all_items'          => 'Toutes les compétences',
        'menu_name'          => 'Compétences'
    );

    $args = array(
        'public'			=> false,
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
    );
}


/*
    // URL text field
    $cmb->add_field( array(
        'name' => __( 'Website URL', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    // Email text field
    $cmb->add_field( array(
        'name' => __( 'Test Text Email', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'email',
        'type' => 'text_email',
        // 'repeatable' => true,
    ) );

    // Add other metaboxes as needed
*/
