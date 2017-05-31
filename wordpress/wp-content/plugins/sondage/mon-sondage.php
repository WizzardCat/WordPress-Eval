<?php

/*
Plugin Name: Mon Sondage
Plugin URI:
Description:
Version: 1.0
Author: WizzardCat
Author URI:
*/

/*----------------------------------------------------------------*/
/* Déclaration du CPT
/*----------------------------------------------------------------*/

add_action( 'init', '__sondage_sondage_init' );
function __sondage_sondage_init()
{
    $labels = array(
        'name'               => 'sondages',
        'singular_name'      => 'sondage',
        'all_items'          => 'Tous les sondages',

        'add_new'            => 'Ajouter un sondage',
        'add_new_item'       => 'Ajouter un nouveau sondage',
        'edit_item'          => 'Editer un sondage',
        'new_item'           => 'Un nouveau sondage',
        /*
        'view_item'          => 'View Book',
        'search_items'       => 'Search Books',
        'not_found'          => 'No books found',
        'not_found_in_trash' => 'No books found in Trash',
        'parent_item_colon'  => '',
        */
        'menu_name'          => 'Sondage'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'rewrite'            => array( 'slug' => 'sondage' ),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5, // On positionne le CPT en dessous d'article
        'menu_icon'			 => 'dashicons-desktop', // Identifiant de l'icône disponible sur http://melchoyce.github.io/dashicons/
        'supports'           => array( 'title' )
    );

    register_post_type( 'sondage', $args );

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
add_action('add_meta_boxes','initialisation_sondage');
function initialisation_sondage(){
    add_meta_box('create_sondage', 'Sondage', 'test_sondage', 'sondage', 'normal', 'default');
}

function test_sondage($post){

    $choix_oui = get_post_meta($post->ID,'_choix_oui',true);
    $choix_non = get_post_meta($post->ID,'_choix_non',true);

    echo '<label for="choix_oui">Oui :</label>';
    echo '<input id="url_meta" type="url" name="url_oui" value="'.$choix_oui.'" />';

    echo '<label for="choix_non">Non :</label>';
    echo '<input id="url_meta" type="url" name="url_non" value="'.$choix_non.'" />';
}

add_action('save_post','save_sondage');
function save_sondage($post_id){
    //sauvegarde la metabox quand elle est defini
    if(isset($_POST['choix_oui']) ||
        isset($_POST['choix_non']) ){
        update_post_meta($post_id, '_choix_oui', esc_url($_POST['choix_oui']));
        update_post_meta($post_id, '_choix_non', esc_url($_POST['choix_non']));
    }

}*/

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
    $prefix = '_sondage_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'sondage_metabox',
        'title'         => __( 'Resultat des sondages', 'cmb2' ),
        'object_types'  => array( 'sondage', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    // Regular text field yes
    $cmb->add_field( array(
        'name'       => __( 'Oui', 'cmb2' ),
       // 'desc'       => __( 'field (optional)', 'cmb2' ),
        'id'         => $prefix . 'oui',
        'type'       => 'text',
       // 'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    // Regular text field no
    $cmb->add_field( array(
        'name'       => __( 'Non', 'cmb2' ),
        // 'desc'       => __( 'field (optional)', 'cmb2' ),
        'id'         => $prefix . 'non',
        'type'       => 'text',
        // 'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    // Regular text field groot
    $cmb->add_field( array(
        'name'       => __( 'Je s\'appelle Groot', 'cmb2' ),
        // 'desc'       => __( 'field (optional)', 'cmb2' ),
        'id'         => $prefix . 'groot',
        'type'       => 'text',
        // 'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    $cmb->add_field( array(
        'name'    => 'Color Picker',
        'id'      => 'wiki_test_colorpicker',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
    ) );
/*
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
*/

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