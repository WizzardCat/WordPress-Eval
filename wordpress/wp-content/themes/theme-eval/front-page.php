<?php defined('ABSPATH') or die('Cheatin\'uh?'); ?>

<?php

get_header();
the_post();
?>

<div class="content">
	 <div class="container">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
				 <div class="row">

                     <section id="content" class="container clearfix">

                         <h2 class="slogan align-center">Life's not fun without a good scare ;)</h2>
                         <br>
                         <br>
                         <br>


                         <?php

                         $list_for_slider_post = new WP_Query(
                             array(
                                 'post_type'=>array('post', 'blog'),
                                 'post_status' => 'publish',
                                 'order' => 'ASC',//ASC or DESC
                                 'orderby' => 'title',
                                 'posts_per_page'=>4
                             )

                         );
                         ?>

<br>
                         <h2 class="section-title">A la une</h2>
<br>

                             <a href="<?php the_permalink(); ?>">
                                 <?php the_post_thumbnail(array(600,340), array('class'=>'entry-image')); ?>
                                 <h5 class="title"><?php the_title(); ?></h5>
                                 <?php the_content(); ?>
                                 <span class="title">Posted:</span> <a href="#"><?php the_time(get_option('date_format')); ?>
                                 </a>


                     </section><!-- end #content -->



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
                     <ul>

                     <li class="active"><a href="#">Soluce</a></li>
                     <li><a href="#">Vidéo</a></li>
                         <li><audio autoplay="true" loop="true" controls="controls" src="<?php echo wp_get_attachment_url(30); ?>">
                         Votre navigateur ne supporte pas l'élément <code>audio</code>.
                     </audio>
                        </li>
                     </ul>
                     <br>
                     <br>



                     <?php get_sidebar('Sondage'); ?>


                 </div>
             </div>

			 <div class="clearfix"></div>
		 </div>
	 </div>



</div>

<?php get_footer(); ?>