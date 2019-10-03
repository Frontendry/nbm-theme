<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nairobi_Business_Monthly
 */

get_header();
?>
<section class="content-area">
    <div class="container-fluid">
		<div class="row general-content-row">
			<div class="col x-space-1 general-content-col">
				<div class="general-content">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'page' );

					endwhile; 
					?>
				</div>
				<!-- .general-content -->
			</div>
			<!-- .general-content-col -->
		</div>
		<!-- .general-content-row -->

		

	</div>
	<!-- .container-fluid -->
</section>
<!-- .content-area -->

<?php
get_footer();

