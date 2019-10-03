<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nairobi_Business_Monthly
 */


?>

<aside class="post-sidebar sticky-col">
	<div class="theiaStickySidebar">
	
		<?php 
		global $post, $text_color_date, $text_color_author;
													
		$text_color_date = 'text-warning';
		$text_color_author = 'text-gray-400';

		$popular = get_posts( array(
			'numberposts' => 6,
			'meta_key' => 'popular_posts',
			'orderby'=>'meta_value_num',
			'order'=>'DESC'
		) );		
	
		if( $popular ) : ?>
		<div class="post-sidebar-el bg-white">
			<div class="post-sidebar-el-title">
				<h3>Most Popular Articles</h3>
			</div>
			<!-- .post-sidebar-el-title -->

			<div class="post-sidebar-el-body">
				<div class="article-eles-v-carousel carousel-v position-relative">

					<?php
					foreach ( $popular as $post ) :
					setup_postdata( $post );
                    get_template_part( 'template-parts/content/content-excerpt', 'text-carousel' );

					endforeach; wp_reset_postdata(); ?>
					
				</div>
				<!-- .article-eles-v-carousel -->
			</div>
			<!-- .post-sidebar-el-body -->
		</div>
		<!-- .post-sidebar-el -->

		<?php endif;
		$sidebar_ads = get_field('sidebar_ads', 'option');

		$rotating_ads = $sidebar_ads['rotating_ads']; 
		$magazine_issue = $sidebar_ads['magazine_issue']; 

		if( !empty( $rotating_ads ) ) : ?>
		<div class="post-sidebar-el rotating-ads-sidebar-el">
			<div class="post-sidebar-el-body">
				
				<ul class="rotating-ads-sidebar">
					<?php
					foreach( $rotating_ads as $rotating_ad ) : ?>
					<li>
						<div class="post-sidebar-ad">
							<a href="<?php echo $rotating_ad['ad_link']['url'] ?>">
								<img src="<?php echo $rotating_ad['ad_image']['url'] ?>" class="img-fluid">
							</a>
						</div>
					</li>
					<?php endforeach; ?>
				</ul>
				                             
			</div>
			<!-- .post-sidebar-el-body -->
		</div>
		<!-- .post-sidebar-el -->
		<?php endif; 
		
		
		if( !empty( $magazine_issue ) ) : ?>
		<div class="post-sidebar-el">
			<div class="post-sidebar-el-body">
				<div class="post-sidebar-ad">
					<a href="<?php echo $magazine_issue['magazine_link']['url'] ?>"><img src="<?php echo $magazine_issue['magazine_cover']['url']  ?>" class="img-fluid"></a>
				</div>                             
			</div>
			<!-- .post-sidebar-el-body -->
		</div>
		<!-- .post-sidebar-el -->
		<?php endif; ?>
	</div>
	<!-- .theiaStickySidebar -->
</aside>
<!-- .post-sidebar -->
