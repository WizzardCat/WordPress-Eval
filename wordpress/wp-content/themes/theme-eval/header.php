<?php defined('ABSPATH') or die('Cheatin\'uh?'); ?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Blogname a Blogging Category Flat Bootstrap  Responsive Web Template | Home :: w3layouts</title>
    <link href="<?php echo STATICPATH; ?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo STATICPATH; ?>/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Blogname Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"
    />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!----webfonts---->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,300italic,400italic,600italic' rel='stylesheet' type='text/css'>
    <!----//webfonts---->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--end slider -->
    <!--script-->
    <script type="text/javascript" src="<?php echo STATICPATH; ?>/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo STATICPATH; ?>/js/easing.js"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>
    <!---->
    <?php wp_head(); ?>

</head>
<body>
<!---strat-banner---->
<div class="banner">
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="index.html" id="logo">
                    <img src="<?php echo STATICPATH; ?>/images/logo.png" alt="EvalTheme">
                </a>
            </div>
            <!---start-top-nav---->
            <div class="top-menu">
                <span class="menu"> </span>
                <ul>
                    <li <?php echo is_home() ? 'class="current"' : "" ; ?>>
                        <a href="<?php echo home_url(); ?>" data-description="All starts here">Home</a>
                    </li>
                    <li <?php echo is_page(7) || is_single() ? 'class="current"' : "" ; ?>>
                        <a href="<?php echo get_permalink(7); ?>" data-description="All starts here">The Blog</a>
                    </li>
                    <li <?php echo is_page(9) ? 'class="current"' : "" ; ?>>
                        <a href="<?php echo get_permalink(9); ?>" data-description="All starts here">About Us</a>
                    </li>
                    <li <?php echo is_page(11) ? 'class="current"' : "" ; ?>>
                        <a href="<?php echo get_permalink(11); ?>" data-description="All starts here">Contact</a>
                    </li>
                </ul>

            </div>
            <div class="clearfix"></div>
            <script>
                $("span.menu").click(function(){
                    $(".top-menu ul").slideToggle("slow" , function(){
                    });
                });
            </script>
            <!---//End-top-nav---->
        </div>
    </div>

</div>





