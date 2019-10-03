<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nairobi_Business_Monthly
 */

?>

			<footer class="main-footer">
                <div class="container-fluid"> 
                    <div id="sign-up" class="row sign-up-b-row">
                        <div class="col sign-up-b-col x-space-1">
                            <div class="sign-up-b bg-light-blue d-flex">
                                <div class="sign-up-b-header d-flex flex-column text-white">
                                    <h3 class="order-2">Sign Up <br> Today.</h3>
                                    <p class="order-1">We've got the latest</p>
                                </div>
                                <!-- .sign-up-b-header -->

                                <div class="sign-up-b-form">
                                    <?php gravity_form(1, false, false, false, '', true, 12); ?>
                                </div>
                                <!-- .sign-up-b-form -->
                            </div>
                            <!-- .sign-up-b -->
                        </div>
                        <!-- .sign-up-b-col -->
                    </div>
                    <!-- .sign-up-b-row -->

                    <div class="row footer-misc-row">
                        <div class="col footer-misc-col no-padd bg-primary">
                            <div class="footer-misc x-space-1">
                                <div class="footer-misc-quick-links">
                                    <div class="footer-misc-col footer-logo-cont">
                                        <figure class="footer-logo">
                                            <a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/design-assets/logo-inverse.png" class="img-fluid"></a>
                                        </figure>
                                    </div>
                                    <!-- .footer-logo-cont -->

                                    <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                                        <div class="footer-misc-col footer-post-categories">
                                            <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                                        </div>
                                        <!-- .footer-post-categories -->
                                    <?php endif; ?>

                                    <div class="footer-misc-col footer-get-intouch">
                                        <h4 class="footer-misc-titles">Get in touch</h4>

                                        <h5 class="footer-misc-mini-titles">Call us on</h5>
                                        <p class="lead"><a href="tel:+254715061658">0715061658</a></p>

                                        <h5 class="footer-misc-mini-titles">Reach us on</h5>
                                        <p><a href="mailto:info@nairobibusinessmonthly.com">info@nairobibusinessmonthly.com</a></p>
                                    </div>
                                    <!-- .footer-get-intouch -->

                                    <div class="footer-misc-col footer-social-links-cont">
                                        <h4 class="footer-misc-titles">We're Social</h4>

                                        <div class="footer-social-links">
                                            <a href="https://twitter.com/NairobiBusiness" class="fab fa-twitter"></a>
                                            <a href="https://facebook.com/NairobiBusinessMonthlyMagazine/" class="fab fa-facebook-f"></a>
                                            <a href="https://www.linkedin.com/company/nairobi-business-monthly/about/" class="fab fa-linkedin-in"></a>
                                        </div>
                                        <!-- .footer-social-links -->

                                    </div>
                                    <!-- .footer-social-links-cont -->
                                </div>
                                <!-- .footer-misc-quick-links -->

                                <div class="footer-misc-copyright">
                                    <p class="copyright-text">Copyright © <?php echo esc_html( date("Y") ); ?>   Nairobi Business Monthly. All rights reserved.</p>

                                    <?php
                                        if ( has_nav_menu( 'menu-2' ) ) : 
                                        
                                        wp_nav_menu(
                                            array(
                                                'menu' => 'Footer Menu',
                                                'theme_location' => 'menu-2',
                                                'container' => '',                   
                                                'menu_class' => 'footer-extra-links',
                                                //'items_wrap' => '<nav class="main-nav"><ul id="%1$s" class="%2$s">%3$s</ul></nav>',
                                            )
                                        ); 
                                    
                                    endif;?>
                                   
                                </div>
                                <!-- .footer-misc-copyright -->
                            </div>
                            <!-- .footer-misc -->
                        </div>
                        <!-- .footer-misc-col -->
                    </div>
                    <!-- .footer-misc-row -->
                </div>
                <!-- .container-fluid -->
            </footer>
        
        </section>
        <!-- #page-wrap-in -->
    </main>
    <!-- #page-wrap -->

    <a href="#sign-up-form" class="sign-up-trigger d-none"> Sign Up</a>

    <div id="sign-up-form" class="mfp-hide popup-block">
        <div class="pop-text-cont d-flex flex-column align-items-center">
            <p>Hey there! You've reached the limit of your articles that you have to read this month. Kindly subscribe.</p>

            <div class="cta-cont mt-3">
                <a class="arrowed-btn btn-primary text-white" href="https://www.nairobibusinessmonthly.com/product/subscribe-to-nairobi-business-monthly">Subscribe</a>
            </div>
            

            <div class="popup-modal-dismiss"><i class="fas fa-times"></i></div>
        </div>
      
    </div>
    <!-- .sign-up -->

<?php wp_footer(); ?>

</body>
</html>
