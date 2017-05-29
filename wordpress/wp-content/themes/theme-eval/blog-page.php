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


                    <div class="content-grid-info">
                        <a href="<?php the_permalink(); ?>">
                        <h3 class="title"> <?php the_title(); ?></h3>
                        </a>


                        <?php the_content(); ?>

                        <img src="images/c1.jpg" alt=""/><a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(array(680,235), array('class'=>'entry-image')); ?>
                        </a>

                        <a class="bttn" href="single.html">MORE</a>
                    </div>
                </div>
                <div class="content-grid box">
                    <div class="content-grid-head">
                        <h4>July 24, 2014,Posted by: <a href="#">Admin</a></h4>
                        <div class="clearfix"></div>
                    </div>

                </div>

                <?php
                endwhile;



                if(function_exists('wp_simple_pagination')) {
                    wp_simple_pagination();
                }

                wp_reset_query();
                ?>

            </div>

            <div class="col-md-4 content-main-right">
                <div class="search">
                    <h3>SEARCH HERE</h3>
                    <form>
                        <input type="text" value="" onfocus="this.value=''" onblur="this.value=''">
                        <input type="submit" value="">
                    </form>
                </div>
                <div class="categories">
                    <h3>CATEGORIES</h3>
                    <li class="active"><a href="#">Donec quis dui at dolor tempor</a></li>
                    <li><a href="#">Vestibulum commodo felis quis tort</a></li>
                    <li><a href="#">Fusce pellentesque suscipit</a></li>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>