<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nairobi_Business_Monthly
 */

get_header(); ?>

<section class="content-area">
    <div class="container-fluid">
		<?php nbm_posts_landing_layout(); ?>
	</div>
	<!-- .container-fluid -->
</section>
<!-- .content-area -->

<?php
get_footer();
