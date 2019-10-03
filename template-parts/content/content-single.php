<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nairobi_Business_Monthly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-view'); ?> data-postid="<?php the_ID(); ?>" data-postid="<?php the_ID(); ?>">
	<?php nbm_theme_post_thumbnail(); ?>

	<div class="row article-entry-row row-bottom-space-2">
		<div class="col article-entry-col x-space-2">
			<div class="article-entry">
				<header class="article-entry-title mb-6">
					<h1><?php echo esc_html( get_the_title() ); ?></h1>
				</header>
				<!-- .article-entry-title -->

				<div class="article-entry-meta mb-6">
					<p class="article-entry-author text-dark"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">By <?php echo esc_html( get_the_author() ); ?></a>
					</p>
					<p class="article-entry-date text-dark"> <?php nbm_theme_posted_on(); ?></p>

					<?php nbm_theme_categories_list(); ?>
				</div>
				<!-- .article-entry-meta -->

				<div class="article-entry-content clearfix">

					<div class="post-entry-content sticky-col">
						<div class="theiaStickySidebar">
							<div class="post-entry-wrap position-relative">
								<?php
								
								$socialLinks = get_field('post_social_share_links', 'option'); 

								if( !empty( $socialLinks ) ) : ?>
								<div class="post-social-share">  
									<?php nbm_social_share(); ?>
								</div>
								<!-- .post-social-share -->
								<?php endif; ?>

								<div class="post-entry-content-in text-cont clearfix">

								
									<?php the_content() ?>
								</div>
								<!-- .post-entry-content-in -->

								<?php
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif; ?>
							</div>
							<!-- .post-entry-content-in -->
						</div>
						<!-- .theiaStickySidebar -->
					</div>
					<!-- .post-entry -->

					<?php get_sidebar(); ?>
				</div>
				<!-- .article-entry-content -->
			</div>
			<!-- .article-entry -->
		</div>
		<!-- .article-entry-col -->
	</div>
	<!-- .article-entry-row -->
</article>
<!-- #post-<?php the_ID(); ?> -->
