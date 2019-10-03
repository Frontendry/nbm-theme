<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Nairobi_Business_Monthly
 */

if ( ! function_exists( 'nbm_theme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function nbm_theme_posted_on() {		
 
		echo '<time datetime="' . esc_attr( get_the_date('jS M, Y') ) . '" itemprop="datePublished">' . esc_html( get_the_date('jS M, Y') ) . '</time>';
	}
endif;

if ( ! function_exists( 'nbm_theme_categories_list' ) ) : 
	function nbm_theme_categories_list(){
		$categories_list = get_the_category_list( esc_html__( ', ', 'nbm-theme' ) );
		if ( $categories_list ) : ?>
			<div class="post-category-list">
			<?php
			/* translators: 1: list of categories. */
			printf(  esc_html__( '%1$s', 'nbm-theme' ), $categories_list ); // WPCS: XSS OK.
			?>
			</div>
			<!-- .post-category-list -->
		
		<?php	
		endif;
	}
endif;


if ( ! function_exists( 'nbm_theme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function nbm_theme_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'nbm-theme' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'nbm-theme' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'nbm-theme' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'nbm-theme' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'nbm-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'nbm-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'nbm_theme_limit_text' ) ) :
	/**
	 * Limits long texts.
	 * 
	 */
	function nbm_theme_limit_text($text, $limit) {
		if (str_word_count($text, 0) > $limit) {
			$words = str_word_count($text, 2);
			$pos = array_keys($words);
			$text = substr($text, 0, $pos[$limit]) . '...';
		}
		return $text;
	}
endif;

if ( ! function_exists( 'nbm_theme_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function nbm_theme_post_thumbnail() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		$postthumbnailplaceholder = get_template_directory_uri() . '/assets/imgs/content/nbm-image-placeholder.jpg';

		if( ! has_post_thumbnail() ) :
			if ( is_single() ) : ?>
				<div class="row hero-row row-bottom-space-2">
                    <div class="col hero-col x-space-1">
                        <div class="hero">
							<figure class="article-el-img hero-img">
								<img src="<?php echo esc_url( $postthumbnailplaceholder );  ?>" class="img-fluid">
							</figure>
						</div>
						<!-- .hero -->
					</div>
					<!-- .hero-col -->
				</div>
				<!-- .hero-row  -->
			<?php
			else : ?>
				<figure class="article-el-img">
					<a class="bg-img" href="<?php the_permalink(); ?>">
						<img src="<?php echo esc_url( $postthumbnailplaceholder ); ?>">
					</a>
				</figure>
			<?php
			endif;
		else :	
			if ( is_single() ) : ?>
				<div class="row hero-row row-bottom-space-2">
                    <div class="col hero-col x-space-1">
                        <div class="hero">
							<figure class="article-el-img hero-img post-thumbnail">
								<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
							</figure>
							</div>
						<!-- .hero -->
					</div>
					<!-- .hero-col -->
				</div>
				<!-- .hero-row  -->

			<?php else : ?>

				<figure class="article-el-img post-thumbnail">
					<a class="bg-img" href="<?php the_permalink(); ?>">
						<?php
						the_post_thumbnail( 'post-thumbnail', array(
							'alt' => the_title_attribute( array(
								'echo' => false,
							) ),
						) );
						?>
					</a>
				</figure>
			<?php
			endif; // End is_singular().
		endif;
	}
endif;

if ( ! function_exists( 'nbm_theme_posts_pagination' ) ) :
	function nbm_theme_posts_pagination(){
		the_posts_pagination(array(
			'mid_size' => 3,
			'prev_text' => __( '<i data-feather="chevron-left"></i>', 'nbm-theme' ),
			'next_text' => __( '<i data-feather="chevron-right"></i>', 'nbm-theme' ),
		));
	}
endif;

if ( ! function_exists( 'nbm_posts_landing_layout' ) ) :
	/**
	 * Creates layout for the posts landing page
	 */
	function nbm_posts_landing_layout() {
		$posts_landing_page = 'posts_landing_page';
		
		if( have_rows( $posts_landing_page ) ) :
			while ( have_rows( $posts_landing_page ) ) : the_row();
				
				// Post Collection A Layout
				if( get_row_layout() == 'post_collection_a' ) :	
					get_template_part( 'template-parts/layouts/post-collection', 'a' );

				// Post Collection B Layout
				elseif( get_row_layout() == 'post_collection_b' ):
					get_template_part( 'template-parts/layouts/post-collection', 'b' );

				// Post Collection C Layout	
				elseif( get_row_layout() == 'post_collection_c' ):
					get_template_part( 'template-parts/layouts/post-collection', 'c' );

				// Landing Page Big Ad	
				elseif( get_row_layout() == 'landing_page_big_ad' ):
					get_template_part( 'template-parts/layouts/landing-page-big-ad' );

				// Post Collection D Layout	
				elseif( get_row_layout() == 'post_collection_d' ):
					get_template_part( 'template-parts/layouts/post-collection', 'd' );
				endif;			
			endwhile;
		endif;
	}
endif;

if ( ! function_exists( 'nbm_posts_custom_page_layout' ) ) :
	function nbm_posts_custom_page_layout(){
		$custom_pages_layout = 'custom_pages_layout';

		if( have_rows( $custom_pages_layout ) ) :
			while ( have_rows( $custom_pages_layout ) ) : the_row();

				// Hero Image Layout
				if( get_row_layout() == 'hero_image_layout' ) :	
					get_template_part( 'template-parts/layouts/hero-image-layout' );

				// Two Column Text
				elseif( get_row_layout() == 'two_column_text_layout' ) :
					get_template_part( 'template-parts/layouts/two-column-text' );

				// Two Column Images
				elseif( get_row_layout() == 'two_column_images_layout' ) :
					
					get_template_part( 'template-parts/layouts/two-column-image' );

				// Teams
				elseif( get_row_layout() == 'teams_layout' ):
					get_template_part( 'template-parts/layouts/teams' );			

				// Landing Page Big Ad	
				elseif( get_row_layout() == 'landing_page_big_ad' ):
					get_template_part( 'template-parts/layouts/landing-page-big-ad' );
				endif;
			endwhile;
		endif;
	}
endif;

if( function_exists('acf_add_options_page') ) :
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Settings',
		'menu_title'	=> 'Social Settings',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Post Ads Settings',
		'menu_title'	=> 'Post Ads Settings',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Sidebar Ads Settings',
		'menu_title'	=> 'Sidebar Ads Settings',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Top Section Ads Settings',
		'menu_title'	=> 'Top Section Ads Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	/* acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	)); */
	
endif;

if ( ! function_exists( 'nbm_social_share' ) ) :
	/**
	 * Social share links
	 */
	function nbm_social_share() {
		global $post;

		$pageURL = urlencode( get_permalink() );
		$pageTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$socialLinks = get_field('post_social_share_links', 'option');

		// Social URLs
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$pageURL;
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$pageTitle.'&amp;url='.$pageURL;		
		$googleURL = 'https://plus.google.com/share?url='.$pageURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$pageURL.'&amp;title='.$pageTitle;
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$pageURL.'&amp;media='.$thumbnail[0].'&amp;description='.$pageTitle;
		$emailURL = 'mailto:?subject='.$pageTitle.'&body=Check out this site'.$pageURL;		
		$vkURL = 'http://vkontakte.ru/share.php?url='.$pageURL;
		//$bufferURL = 'https://bufferapp.com/add?url='.$pageURL.'&amp;text='.$pageTitle;
		$diggURL = 'http://www.digg.com/submit?url='.$pageURL;
		$redditURL = 'http://reddit.com/submit?url='.$pageURL.'&amp;title='.$pageTitle;
		$stumbleuponURL = 'http://www.stumbleupon.com/submit?url='.$pageURL.'&amp;title='.$pageTitle;
		$tumblrURL = 'http://www.tumblr.com/share/link?url='.$pageURL.'&amp;title='.$pageTitle;
		//$yummlyURL = 'http://www.yummly.com/urb/verify?url='.$pageURL.'&amp;title='.$pageTitle;
		$whatsappURL = 'whatsapp://send?text='.$pageTitle . ' ' . $pageURL;
		$telegramURL = '//telegram.me/share/url?url='.$pageURL.'&amp;text='.$pageTitle;

		$allsocialsmeta = array(
			'Facebook' => 'fab fa-facebook-f" href="' .$facebookURL. '"',
			'Twitter' => 'fab fa-twitter" href="' .$twitterURL. '"',
			'Google Plus' => 'fab fa-google-plus-g" href="' .$googleURL. '"',
			'LinkedIn' => 'fab fa-linkedin-in" href="' .$linkedInURL. '"',
			'Pinterest' => 'fab fa-pinterest-p" href="' .$pinterestURL. '"',
			'Email' => 'far fa-envelope" href="' .$emailURL. '"',
			'VK' => 'fab fa-vk" href="' .$vkURL. '"',
			'Digg' => 'fab fa-digg" href="' .$diggURL. '"',
			'Reddit' => 'fab fa-reddit-alien" href="' .$redditURL. '"',
			'StumbleUpon' => 'fab fa-stumbleupon" href="' .$stumbleuponURL. '"',
			'Tumblr' => 'fab fa-tumblr" href="' .$tumblrURL. '"',
			'WhatsApp' => 'fab fa-whatsapp" href="' .$whatsappURL. '"',
			'Telegram' => 'fab fa-telegram-plane" href="' .$telegramURL. '"'
		);		

		foreach( $socialLinks as $value ) {
			if ( array_key_exists( $value, $allsocialsmeta ) ) :
				echo '<a class="social-links ' .$allsocialsmeta[$value]. '></a>';
			endif;
		}		
	}
endif;
