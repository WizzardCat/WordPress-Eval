<?php defined('ABSPATH') or die('Cheatin\'uh?'); ?>

<?php
/**
 * Created by PhpStorm.
 * User: Formation
 * Date: 18/05/2017
 * Time: 10:46
 */

add_theme_support('post-thumbnails');

add_image_size('banniere',1024,400,true);
add_image_size('post',600,370,true);


function excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}

// Déclaration de la sidebar
if ( function_exists('register_sidebar') ){
    register_sidebar(array('name'=>'Blog',
        'description' =>'Cette sidebar est affiché sur toute la partie Blog du site.',
        'before_widget'=>'<div id="%1s" class="widget %2$s">',
        'after_widget'=>'</div>',
        'before_title' => '<h6 class="widget-title ">',
        'after_title' => '</h6>'
    ));
}
// Déclaration d'un widgets
add_action('widgets_init', 'init_register_sidebar');
function init_register_sidebar(){
    register_widget('Sondage_Widget');
}

class Sondage_Widget extends WP_Widget
{
    public function __construct()
    {

        parent::__construct('sondage_widget', 'Sondage', array('description' => 'Un formulaire de sondage.'));
    }
    //  // Traitement des données avant sauvegarde
    function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
    public function widget($args, $instance)
    {
        $choix= get_post( $instance['choix_sondage'] );
        $title = $choix->post_title;
        if(isset($_POST['choix_submit']) && isset($_POST['choix_sondage']) ){
            $choix_sondage = $_POST['choix_sondage'];

            if($choix_sondage == '0'){
                $oui = intval(get_post_meta($choix->ID, '_sondage_oui', true));
                $oui++;
                update_post_meta($choix->ID, '_sondage_oui',$oui);
            }
            elseif ($choix_sondage == '1'){
                $non = intval(get_post_meta($choix->ID, '_sondage_non', true));
                $non++;
                update_post_meta($choix->ID, '_sondage_non',$non);
            }
            elseif ($choix_sondage == '3'){
                $groot = intval(get_post_meta($choix->ID, '_sondage_groot', true));
                $groot++;
                update_post_meta($choix->ID, '_sondage_groot',$groot);
            }
        }
        echo $args['before_widget'];
        echo $args['before_title'];
        echo apply_filters('widget_title', $instance['title']);
        echo $args['after_title'];
        ?>
        <form action="" method="post">
            <p>
                <label for="sondage_title"><?php echo $title; ?></label><br>
                <input type="radio" name="choix_sondage" value="0" checked>Oui<br>
                <input type="radio" name="choix_sondage" value="1"> Non<br>
                <input type="radio" name="choix_sondage" value="3"> Je s'appelle groot<br>
            </p>
            <input type="submit" name="choix_submit" value="Je valide mon choix"/>
        </form>

        <h3>Nombre de oui:  <?php echo get_post_meta($choix->ID, "_sondage_oui", true); ?></h3>

        <h3>Nombre de non:  <?php echo get_post_meta($choix->ID, "_sondage_non", true); ?></h3>

        <h3>Nombre de je s'appelle Groot:  <?php echo get_post_meta($choix->ID, "_sondage_groot", true); ?></h3>

        <?php
        echo $args['after_widget'];
    }
    public function form($instance)
    {
        query_posts(

            array(
                'post_type'=>'sondage'
            )

        );
        $option_select = isset($instance['choix_sondage']) ? $instance['choix_sondage'] : null;
        $options = "";
        while( have_posts() ): the_post();
            if($option_select == get_the_ID()):
                $options .= "<option selected value='".get_the_ID()."'>".get_the_title()."</option>";
            else:
                $options .= "<option value='".get_the_ID()."'>".get_the_title()."</option>";
            endif;
        endwhile;
        wp_reset_query();
        $title = isset($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat"
                   id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>"
                   type="text" value="<?php echo  $title; ?>" />

            <label for="choix_sondage">Selectionnez votre sondage</label>
            <select name="<?php echo $this->get_field_name( 'choix_sondage' ); ?>"
                    id="<?php echo $this->get_field_id( 'choix_sondage' ); ?>">
                <?php
                echo $options;
                ?>
            </select>
        </p>
        <?php
    }
}

function themeslug_enqueue_style () {
    if(is_page(5)) {
        wp_enqueue_style('core', STATICPATH.'/css/contact.css', false );
    }
}


function themeslug_enqueue_script() {
    // if(is_page(48)){
    wp_enqueue_script('my-toto', STATICPATH.'/js/main.js', [jquery], '', false);

    //  }
}


add_action('wp_enqueue_scripts', 'themeslug_enqueue_style');
add_action('wp_enqueue_scripts', 'themeslug_enqueue_script');



?>