<?php
/**
 * Frontpage Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nairobi_Business_Monthly
 */

get_header(); ?>

    <section class="content-area">
        <div class="container-fluid">
            <article class="post-entry">
                <?php nbm_posts_custom_page_layout(); ?>                       
            </article>
            <!-- .post-entry -->                    
        </div>
        <!-- .container-fluid -->
    </section>
    <!-- .content-area -->

<?php
get_footer();