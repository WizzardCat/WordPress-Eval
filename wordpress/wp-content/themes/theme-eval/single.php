<?php
/**
 * Created by PhpStorm.
 * User: Formation
 * Date: 18/05/2017
 * Time: 11:47
 */

get_header();
the_post();
?>



<section id="content" class="container clearfix">

    <header class="page-header">

        <h1 class="page-title"><?php the_title() ?></h1>

    </header><!-- end .page-header -->

    <section id="main">

        <article class="entry single clearfix">

            <a href="<?php the_permalink(); ?>" title="">
                <?php the_post_thumbnail(array(1024,400), array('class'=>'banner')); ?>
            </a>

            <?php the_content(); ?>

            <div class="entry-meta">

<br>
<br>
<br>
                <ul>
                    <li><span class="title">Posted:</span> <a href="#"><?php the_time(get_option('date_format')); ?></a></li>
                    <li><?php echo get_the_tag_list('<span class="title">Tags: </span> ', ' , '); ?></li>
                    <li><span class="title">Commentaires: </span> <a href="#"><?php comments_number('0', '1', '%'); ?></a></li>
                </ul>

            </div><!-- end .entry-meta -->

</div>
<!---//End-banner---->

        </article>
    </section>

    <?php get_footer() ?>

