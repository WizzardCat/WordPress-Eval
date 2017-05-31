<?php defined('ABSPATH') or die('Cheatin\'uh?'); ?>

<?php
/*
    Template Name: Contact Us
*/

get_header();
the_post();
?>


<div class="contact">
    <div class="container">
        <div>
            <h3>CONTACT</h3>
            <br>

            <form>
            <div>
                <?php echo do_shortcode("[contact-form-7 id=\"4\" title=\"Contact form 1\"]");  ?>
            </div>

            </form>

            <br>
            <h3>Our Locations</h3>

        </div>

        <div class="address">
            <div class="col-md-6 locations">

                <ul>
                    <li><span></span></li>
                    <li>
                        <div class="address-info">
                            <h4>New York, Washington</h4>
                            <p>10-765 MD-Road</p>
                            <p>Washington, DC, United States,</p>
                            <p>Phone: 123 456 7890</p>
                            <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
                            <h5><a href="">Visit on Google Maps >></a></h5>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li><span></span></li>
                    <li>
                        <div class="address-info">
                            <h4>London, UK</h4>
                            <p>10-765 MD-Road</p>
                            <p>Lorem ipsum, domon sit, UK,</p>
                            <p>Phone: 123 456 7890</p>
                            <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
                            <h5><a href="">Visit on Google Maps >></a></h5>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 locations">
                <ul>
                    <li><span></span></li>
                    <li>
                        <div class="address-info">
                            <h4>Brazil, SouthAmerica</h4>
                            <p>10-765 MD-Road</p>
                            <p>Argentina,Filps Road</p>
                            <p>Phone: 123 456 7890</p>
                            <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
                            <h5><a href="">Visit on Google Maps >></a></h5>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li><span></span></li>
                    <li>
                        <div class="address-info">
                            <h4>San Francisco, California</h4>
                            <p>10-765 MD-Road</p>
                            <p>Lorem ipsum, domon sit, California,</p>
                            <p>Phone: 123 456 7890</p>
                            <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
                            <h5><a href="">Visit on Google Maps >></a></h5>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>



<?php get_footer(); ?>
