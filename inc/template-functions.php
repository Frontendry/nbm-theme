<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Nairobi_Business_Monthly
 */



/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nbm_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'nbm_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function nbm_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'nbm_theme_pingback_header' );


/**
 * Change format for Gravity Form
 * 
 */
function nbm_theme_form_submit_button( $button, $form ) {
    return "<button id='gform_submit_button_{$form['id']}' class='arrowed-btn btn-white text-primary'>Sign Up</button>";
}
add_filter( 'gform_submit_button', 'nbm_theme_form_submit_button', 10, 2 );

/**
 * Change format for comment dates
 * 
 */
/* function nbm_theme_comment_date_format($date, $date_format, $comment) {
    return date( 'F j, Y', strtotime( $comment->comment_date ) );
}	
add_filter( 'get_comment_date', 'nbm_theme_comment_date_format', 10, 3 ); */	


if(is_admin()){
	/**
	 * Querying Featured Posts for  Post Collection B
	 */

	function acf_post_object_result( $title, $post, $field, $post_id ) {
		$postcats = wp_get_post_categories( $post->ID, array( "fields" => "ids") );
		
		if ( ! empty( $postcats ) ) {
			$title .= '<span class="extra-details">' .implode(" ",$postcats) .  '</span>';
		}

		return $title;	
	}
	
	add_filter('acf/fields/post_object/result', 'acf_post_object_result', 10, 4);
}

/**
 * Popular Posts
 * 
 */
function nbm_theme_popular_posts($post_id) {
	$count_key = 'popular_posts';
	$count = get_post_meta($post_id, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
	} else {
		$count++;
		update_post_meta($post_id, $count_key, $count);
	}
}
function nbm_theme_track_posts($post_id) {
	if (!is_single()) return;
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	nbm_theme_popular_posts($post_id);
}
add_action('wp_head', 'nbm_theme_track_posts');

/**
 * 1st Post Ad Space
 * 
 */
add_filter( 'the_content', 'first_post_ad' );
 
function first_post_ad( $content ) {	

	$postads = get_field('post_ads','option');
		
	$first_google_ads = $postads['first_google_ad'];
	
	$first_custom_ad = $postads['first_custom_ad'];
	$first_custom_ad_image_url = $first_custom_ad['custom_ad_image']['url'];
	$first_custom_ad_link = $first_custom_ad['custom_ad_link']['url'];

	$first_ads_option = $postads['first_display_which_ad'];

	$display_ad_after_which_paragraph = $postads['display_ad_after_which_paragraph'];

	if ( ! function_exists( 'ads_display_option' ) ) :
		function ads_display_option( $postads, $first_google_ads, $first_custom_ad, $first_custom_ad_image_url, $first_custom_ad_link, $first_ads_option ){		

			if( $first_ads_option === 'Google Ads' && !empty( $first_google_ads ) ) :
				return '<div class="mid-post-ads first-post-ad google-ads">' . $first_google_ads . '</div>';
			elseif( $first_ads_option === 'Custom Ad' && !empty( $first_custom_ad ) ) : 
				return '<div class="mid-post-ads first-post-ad image-ads"><a href="' . $first_custom_ad_link . '"><img src="' . $first_custom_ad_image_url . '"></a></div>';
			else :
				return;
			endif;
		}
	endif;

	$ad_code = ads_display_option( $postads, $first_google_ads, $first_custom_ad, $first_custom_ad_image_url, $first_custom_ad_link, $first_ads_option );

    if ( is_single() && ! is_admin() ) {
        return prefix_insert_first_ad( $ad_code, $display_ad_after_which_paragraph, $content );
    }
     
    return $content;
}
  
  
function prefix_insert_first_ad( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
 
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
     
    return implode( '', $paragraphs );
}

/**
 * 2nd Post Ad Space
 * 
 */
add_filter( 'the_content', 'second_post_ad' );
 
function second_post_ad( $content ) {

	$postads = get_field('post_ads','option');
		
	$second_google_ads = $postads['second_google_ad'];
	
	$second_custom_ad = $postads['second_custom_ad'];
	$second_custom_ad_image_url = $second_custom_ad['custom_ad_image']['url'];
	$second_custom_ad_link = $second_custom_ad['custom_ad_link']['url'];

	$second_ads_option = $postads['second_display_which_ad'];

	$display_ad_before_which_last_paragraph = $postads['display_ad_before_which_last_paragraph'];
	

	if ( ! function_exists( 'second_ads_display_option' ) ) :
		function second_ads_display_option( $postads, $second_google_ads, $second_custom_ad, $second_custom_ad_image_url, $second_custom_ad_link, $second_ads_option ){		

			if( $second_ads_option === 'Google Ads' && !empty( $second_google_ads ) ) :
				return '<div class="mid-post-ads first-post-ad google-ads">' . $second_google_ads . '</div>';
			elseif( $second_ads_option === 'Custom Ad' && !empty( $second_custom_ad ) ) : 
				return '<div class="mid-post-ads first-post-ad image-ads"><a href="' . $second_custom_ad_link . '"><img src="' . $second_custom_ad_image_url . '"></a></div>';
			else :
				return;
			endif;
		}
	endif;

	$ad_code = second_ads_display_option( $postads, $second_google_ads, $second_custom_ad, $second_custom_ad_image_url, $second_custom_ad_link, $second_ads_option );
 
    if ( is_single() && ! is_admin()  ) {
        return prefix_insert_second_ad( $ad_code, $display_ad_before_which_last_paragraph, $content );
    }
     
    return $content;
}
  
  
function prefix_insert_second_ad( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $content = explode( $closing_p, $content );
   
	
	$ss = count($content);
    $ns = $ss-$paragraph_id;   //**before last paragraph in wordpress  **
    $new_content = '';
    for ($i = 0; $i < count($content); $i++) {
         if ($i == $ns ) {

            $new_content.= $insertion;
        }
        $new_content.= $content[$i] . "</p>";
    }

    return $new_content;
}

remove_filter('the_content', 'wpautop');



/**
 * Add to Cart 
 * 
 */
add_action( 'wp', 'nbm_theme_add_product_to_cart_on_page_id_load' );
  
function nbm_theme_add_product_to_cart_on_page_id_load() {

	$product_ids = ['1973', '9389'];

	foreach( $product_ids as $product_id ) :	
		if ( is_single( $product_id ) && 'product' == get_post_type() ) {
			WC()->cart->empty_cart();
			WC()->cart->add_to_cart( $product_id ); 
		}
	endforeach;    
}




