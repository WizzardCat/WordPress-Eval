<?php defined('ABSPATH') or die('Cheatin\'uh?'); ?>

<?php
/*
    Template Name: Blog
*/

get_header();
the_post();
?>

<div class="content">
    <div class="container">
        <div class="content-grids">
            <div class="col-md-8 content-main">
                <div class="content-grid box">
                    <div class="content-grid-head">
                        <h4>July 24, 2014,Posted by: <a href="#">Admin</a></h4>
                        <div class="clearfix"></div>
                    </div>

        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header><!-- end .page-header -->

<section id="main">

    <?php
        query_posts( // récupère moi :
        array(
         'post_type'=>'post', // contenu du post
         'ignore_sticky_post'=>true,
         'paged'=>get_query_var('paged') ? get_query_var('paged') : '1'
         )
        );
    ?>


    <?php
        while( have_posts()): the_post();
    ?>

    <div>
        <div>

            <a href="<?php the_permalink(); ?>">
                <h1 class="title"><?php the_title() ?></h1>
            </a>
<br>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(array(600,340), array('class'=>'entry-image')); ?>
            </a>

    <?php the_content(); ?>

            <ul>
                <li><span class="title">Posted:</span> <a href="#"><?php the_time(get_option('date_format')); ?></a></li>
                <li><span class="title">Commentaires: </span> <a href="#"><?php comments_number('0', '1', '%'); ?></a></li>
            </ul>
            <br>
            <br>

        </div>
    </div>

    <?php
        endwhile;

        if(function_exists('wp_simple_pagination')) {
        wp_simple_pagination();
        }
    ?>


        </div>
                </div>
            <div class="col-md-4 content-main-right" style="margin-top: 35px;">
                <div class="search">
                    <h3>SEARCH HERE</h3>
                    <form>
                        <input type="text" value="" onfocus="this.value=''" onblur="this.value=''">
                        <input type="submit" value="">
                    </form>
                </div>
                <div class="categories">
                    <h3>CATEGORIES</h3>
                    <li class="active"><a href="#">Soluce</a></li>
                    <li><a href="#">Vidéo</a></li>
                    <audio autoplay="true" loop="true" controls="controls" src="<?php echo wp_get_attachment_url(30); ?>">
                        Votre navigateur ne supporte pas l'élément <code>audio</code>.
                    </audio>
                    <br>
                    <br>

                    <aside id="sidebar">

                        <?php get_sidebar('Flux_Rss'); ?>

                    </aside><!-- end #sidebar -->

                </div>
            </div>
</div>
        </div>
    </div>


<?php
wp_reset_query();

?>

<?php get_footer(); ?>