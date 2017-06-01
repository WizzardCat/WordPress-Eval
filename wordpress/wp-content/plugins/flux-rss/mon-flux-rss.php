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

/**
 * Get the bootstrap!
 */
if ( file_exists( __DIR__ . '/cmb2/init.php' ) ) {
    require_once __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
    require_once __DIR__ . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_fluxRss_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'fluxRss_metabox',
        'title'         => __( 'Resultat des sondages', 'cmb2' ),
        'object_types'  => array( 'sondage', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );


    $cmb->add_field( array(
        'name' => 'Test File List',
        'desc' => '',
        'id'   => 'wiki_test_file_list',
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        // 'query_args' => array( 'type' => 'image' ), // Only images attachment
        // Optional, override default text strings
        'text' => array(
            'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
            'remove_image_text' => 'Replacement', // default: "Remove Image"
            'file_text' => 'Replacement', // default: "File:"
            'file_download_text' => 'Replacement', // default: "Download"
            'remove_text' => 'Replacement', // default: "Remove"
        ),
    ) );


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
}