<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nairobi_Business_Monthly
 */

get_header();
?>
<section class="content-area">
	<div class="container-fluid">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content-single' );

		endwhile; // End of the loop.
		?>

	</div>
	<!-- .container-fluid -->
</section>
<!-- .content-area -->

<?php
get_footer();
