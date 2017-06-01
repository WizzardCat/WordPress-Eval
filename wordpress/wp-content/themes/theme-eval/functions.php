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
        'description' =>'Cette sidebar est affiché sur toute la partie Accueil du site.',
        'before_widget'=>'<div id="%1s" class="widget %2$s">',
        'after_widget'=>'</div>',
        'before_title' => '<h6 class="widget-title ">',
        'after_title' => '</h6>'
    ));
    register_sidebar(array('name'=>'Flux_Rss',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => "</li>n",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>n"
    ));

}
// Déclaration d'un widgets
add_action('widgets_init', 'init_register_sidebar');
function init_register_sidebar(){
    register_widget('Sondage_Widget', 'Flux_Rss_Widget');
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


<?php



class FlickrGallery extends WP_Widget {

    function FlickrGallery()
    {
        // Constructeur
        parent::__construct('fluxRSS_widget', 'Flux_Rss', array('description' => 'Un flux RSS'));
    }

    function rssUpdate( $new_instance, $old_instance ) {

    }

}

function widget($args, $instance)
{
    // Contenu du widget à afficher
    // Extraction des paramètres du widget
    extract( $args );

    // Récupération de chaque paramètre
    $title = apply_filters('widget_title', $instance['title']);
    $identifiant = $instance['identifiant'];
    $pseudo = $instance['pseudo'];
    $nb_display = $instance['nb_display'];

    // Voir le détail sur ces variables plus bas
    echo $before_widget;

    // On affiche un titre si le paramètre est rempli
    if($title)
        echo $before_title . $title . $after_title;

    /* Début de notre script
    /* Nous allons ici récupérer un webservice de Flickr, un fichier XML
    /* Puis le parcourir
    /* Et afficher un nombre défini de photos */
    ?>
    <ul>
        <?php
        $url = "https://www.flickr.com/photos/sunnyboiiii/sets/72157633387854124".$identifiant."&lang=en-us&format=rss_200";
        $flickr = simplexml_load_file($url);

        if($flickr != false)
        {
            $nb = $nb_display;

            for($i = 0; $i<$nb; $i++)
            {
                $photo = $flickr->channel->item[$i];
                $picture = $photo->xpath("media:thumbnail");
                $pic = $picture[0]['url'];
                $w = $picture[0]['width'];
                $h = $picture[0]['height'];

                $title = $photo->title;

                echo "<li><a href='$photo->link' rel='external' title=\"$title\"><img src='$pic' alt=\"$title\" width='$w' height='$h' /></a></li>";
            }
        }
        else
            echo "<li>Erreur lors du chargement des photos Flickr.</li>";
        ?>
    </ul>
    <div class="clear"></div>
    <p class="right"><a href="http://www.flickr.com/photos/<?php echo $pseudo; ?>/">Plus de photos</a></p>

    <?php echo $after_widget;

}

function update($new_instance, $old_instance)
{
    $instance = $old_instance;

    /* Récupération des paramètres envoyés */
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['identifiant'] = $new_instance['identifiant'];
    $instance['pseudo'] = $new_instance['pseudo'];
    $instance['nb_display'] = $new_instance['nb_display'];

    return $instance;
}

function form($instance)
{
    $title = esc_attr($instance['title']);
    $identifiant = esc_attr($instance['identifiant']);
    $pseudo = esc_attr($instance['pseudo']);
    $nb_display = esc_attr($instance['nb_display']);
    ?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>">
            <?php the_title(); ?>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </label>
    </p>

    <p>
        <label for="<?php echo $this->get_field_id('identifiant'); ?>">
            <?php _e('Identifiant:'); ?>
            <input class="widefat" id="<?php echo $this->get_field_id('identifiant'); ?>" name="<?php echo $this->get_field_name('identifiant'); ?>" type="text" value="<?php echo $identifiant; ?>" />
        </label>
    </p>

    <p>
        <label for="<?php echo $this->get_field_id('pseudo'); ?>">
            <?php _e('Pseudo:'); ?>
            <input class="widefat" id="<?php echo $this->get_field_id('pseudo'); ?>" name="<?php echo $this->get_field_name('pseudo'); ?>" type="text" value="<?php echo $pseudo; ?>" />
        </label>
    </p>

    <p>
        <label for="<?php echo $this->get_field_id('nb_display'); ?>">
            <?php _e('Nombre de photos:'); ?>
            <input class="widefat" id="<?php echo $this->get_field_id('nb_display'); ?>" name="<?php echo $this->get_field_name('nb_display'); ?>" type="text" value="<?php echo $nb_display; ?>" />
        </label>
    </p>
    <?php
}
?>



