<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nairobi_Business_Monthly
 */

get_header();
?>
<section class="content-area">
    <div class="container-fluid">
		<div class="row article-grids-row">
            <div class="col article-grids-col x-space-1 clearfix">
				<?php if ( have_posts() ) : ?>

				<h2 class="title-article-collection text-white bg-info "><?php echo  get_the_archive_title(); ?></h2>
					
				<div class="article-grids sticky-col">
					<div class="theiaStickySidebar">
						<div class="article-grids-collect">
							<?php
							while ( have_posts() ) :
								the_post();	

								global $text_color_date, $text_color_author;
                
								$text_color_date = 'text-info';
								$text_color_author = 'text-gray-400';

								get_template_part( 'template-parts/content/content-excerpt', 'medium' );
				
							endwhile;				
							nbm_theme_posts_pagination(); ?>			
							
						</div>
						<!-- .article-grids-collect -->
					</div>
					<!-- .theiaStickySidebar -->
				</div>
				<!-- .article-grids -->

				<?php				
				else :					
					get_template_part( 'template-parts/content/content', 'none' );
		
				endif;

				get_sidebar(); ?>
			</div>
			<!-- .article-grids-col  -->
		</div>
		<!-- .article-grids-row -->

	</div>
	<!-- .container-fluid -->
</section>
<!-- .content-area -->
	

<?php
get_footer();
