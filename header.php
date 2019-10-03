<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nairobi_Business_Monthly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<main id="page-wrap">
        <section id="page-wrap-in">
            <header class="site-header">   
                <div class="container-fluid">
                    <div class="row sign-up-1-row">
                        <div class="col sign-up-1-col no-padd">
                            <figure class="sign-up-image bg-img d-flex justify-content-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/content/sign-up-banner.jpg" alt="">
                                <figcaption class="sign-up-text">
                                    <a href="#sign-up" class="sign-up-modal d-flex align-items-center">
                                        <p>Want a front row seat? </p>
                                        <p class="h3 underline-text">Sign Up Today</p>
                                    </a>                                    
                                </figcaption>
                            </figure>
                        </div>
                        <!-- .sign-up-1-col -->
                    </div>
                    <!-- .sign-up-1-row  -->

                    <?php
                    $top_section_ad = get_field( 'top_section_ad', 'option' );
                    if( !empty( $top_section_ad ) ) :
                    $top_section_google_ads = $top_section_ad['google_ads'];

                    $top_section_custom_ads = $top_section_ad['custom_ads'];
                    $top_section_custom_ads_image_url = $top_section_custom_ads['custom_ad_image']['url'];
                    $top_section_custom_ads_image_link = $top_section_custom_ads['custom_ad_image_link']['url'];

                    $top_section_display_which_ad = $top_section_ad['display_which_ad']; ?>
                    <div class="row top-ad-row my-7">
                        <div class="col top-ad-col">
                            <div class="top-ad d-flex justify-content-center">

                                <?php 
                                if( $top_section_display_which_ad === 'Google Ads' && !empty( $top_section_google_ads ) ) :
                                    echo $top_section_google_ads;
                                elseif( $top_section_display_which_ad === 'Custom Ad' && !empty( $top_section_custom_ads ) ) : ?>
                                    <a href="<?php echo $top_section_custom_ads_image_link; ?>"><img src="<?php echo $top_section_custom_ads_image_url; ?>"></a>
                                <?php endif; ?>
                            </div>
                            <!-- .top-ad -->
                        </div>
                    </div>
                    <!-- .top-ad-row -->
                    <?php endif; ?>
                    
                    <div class="row logo-nav-misc-row my-3">
                        <div class="col logo-nav-misc-col x-space-1">
                            <div class="logo-nav-misc d-flex align-items-stretch bg-white">
                                <div class="logo-nav-misc-ls">
                                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="nav-brand">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/design-assets/logo.png" alt="">
                                    </a>
                                </div>
                                <!-- .logo-nav-misc-ls -->

                                <div class="logo-nav-misc-rs">
                                    <div class="logo-nav-misc-rs-top position-relative">
                                        <div class="logo-nav-misc-rs-top-left">
                                            <button class="search-icon">
                                                <i data-feather="search"></i>
                                            </button> 

                                            <div class="search-form">

                                            <?php get_search_form(); ?>
                                                
                                            </div>
                                        </div>
                                        <!-- .logo-nav-misc-rs-top-left -->

                                        <div class="logo-nav-misc-rs-top-right">
                                            <div class="social-group d-flex ">
                                                <a href="https://twitter.com/NairobiBusiness" class="fab fa-twitter"></a>
                                                <a href="https://facebook.com/NairobiBusinessMonthlyMagazine/" class="fab fa-facebook-f"></a>
                                                <a href="https://www.linkedin.com/company/nairobi-business-monthly/about/" class="fab fa-linkedin-in"></a>
                                            </div>
                                            <!-- .social-group -->
                                        </div>
                                        <!-- .logo-nav-misc-rs-top-right -->
                                    </div>
                                    <!-- .logo-nav-misc-rs-top -->

                                    <div class="logo-nav-misc-rs-bottom">
                                        <div class="logo-nav-misc-rs-bottom-left">
                                            <?php
                                            if ( has_nav_menu( 'menu-1' ) ) : 
                                            
                                                wp_nav_menu(
                                                    array(
                                                        'menu' => 'Main Navigation',
                                                        'theme_location' => 'menu-1',
                                                        'container' => '',                   
                                                        'menu_class' => 'd-flex',
					                                    'items_wrap' => '<nav class="main-nav"><ul id="%1$s" class="%2$s">%3$s</ul></nav>',
                                                    )
                                                ); 
                                            
                                            endif;?>
                                        </div>
                                        <!-- .logo-nav-misc-rs-bottom-left -->

                                        <div class="logo-nav-misc-rs-bottom-right">
                                            <a class="cta icon-plus-text-cta sign-up-cta" href="#sign-up">
                                                <div class="cta-icon">
                                                    <i class="cta-icon-el" data-feather="user"></i>
                                                </div> 
                                               
                                                <span class="cta-text">Sign Up</span>
                                                
                                            </a>
                                            <!-- .cta -->
                                        </div>   
                                        <!-- .logo-nav-misc-rs-bottom-right -->       
                                    </div>
                                    <!-- .logo-nav-misc-rs-bottom -->
                                </div>
                                <!-- .logo-nav-misc-rs -->
                            </div>
                            <!-- .logo-nav-misc -->
                        </div>
                        <!-- .logo-nav-misc-col -->
                    </div>
                    <!-- .logo-nav-misc-row -->
                </div>  
                <!-- .container-fluid-->
            </header>
            <!-- .site-header -->
            
