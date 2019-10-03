<?php
$post_collection_c_category = get_sub_field( 'post_collection_category' );
$post_collection_c_category_title = $post_collection_c_category->name; 
$post_collection_c_category_slug = $post_collection_c_category->slug;
$post_collection_c_featured = get_sub_field( 'featured_category_posts' );
$post_collection_c_featured_actual = array_slice($post_collection_c_featured, 0, 4);
$post_collection_c_side_ad = get_sub_field( 'side_ads' );
$post_collection_c_side_ad_link = get_sub_field( 'side_ad_link' );

if( !empty( $post_collection_c_category ) ) : ?>
<div class="row article-collection-a-row article-collection-a-with-ad-row">
    <div class="col article-collection-a-col x-space-1 position-relative">
        <h2 class="title-article-collection text-white bg-primary"><?php echo esc_html( $post_collection_c_category_title ); ?></h2>

        <?php 
        if( !empty( $post_collection_c_featured ) ) : ?>
        <div class="article-collection-a">
            <?php 
            global $post;
            $post = $post_collection_c_featured[0];
            setup_postdata( $post ); ?>
            <div class="article-collection-a-left">
                <?php
                global $text_color_date, $text_color_author, $bg_color;
                
                $text_color_date = 'text-primary';
                $text_color_author = 'text-gray-400';
                $bg_color = 'bg-primary';

                get_template_part( 'template-parts/content/content-excerpt', 'big' );
                ?>            
            </div>
            <!-- .article-collection-a-left -->
            <?php wp_reset_postdata(); ?>

            <div class="article-collection-a-right">
                <div class="article-collection-a-right-ls article-collection-select">
                <?php

                //Removing first featured collection c item
                $first_featured_collection_c = array_shift($post_collection_c_featured);

                $collection_c_remaining_featured_post_ids = array();

                foreach( $post_collection_c_featured as $post ) :	
                    setup_postdata( $post );                            
                    array_push($collection_c_remaining_featured_post_ids, $post->ID );
                endforeach; 

                wp_reset_postdata(); 

                $selectedcollection_c_featuredPosts = $collection_c_remaining_featured_post_ids;

                global $post;                            
                $collection_c_remaining_featured_posts_args = array( 
                    'post__in' => $selectedcollection_c_featuredPosts,
                    'orderby' => 'post__in',
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                );

                $collection_c_featured_remaining_posts_list = get_posts( $collection_c_remaining_featured_posts_args );

                $countpostlist = 1;

                foreach( $collection_c_featured_remaining_posts_list as $post ) :
                    setup_postdata( $post );

                    if( $countpostlist != 2 ) :
                        global $text_color_date, $text_color_author;
                    
                        $text_color_date = 'text-primary';
                        $text_color_author = 'text-gray-400';

                        get_template_part( 'template-parts/content/content-excerpt', 'small' );
                    else:
                        global $bg_color, $text_color;
                    
                        $bg_color = 'bg-primary';
                        $text_color = 'text-white';

                        get_template_part( 'template-parts/content/content-excerpt', 'text-medium' );
                    endif;
                $countpostlist ++;
                endforeach;
                wp_reset_postdata();

                ?> 
                </div>
                <!-- .article-collection-a-right-ls -->

                <?php
                if( !empty( $post_collection_c_side_ad ) ) : ?>
                <div class="article-collection-a-right-rs ads-collect">
                    <div class="ad-banner">
                        <figure class="ad-banner-img">
                            <a href="<?php echo esc_url( $post_collection_c_side_ad_link['url'] ); ?>">
                                <img src="<?php echo esc_url( $post_collection_c_side_ad['url'] ); ?>" class="img-fluid">
                            </a>
                            
                        </figure>
                        <!-- .ad-banner-img -->
                    </div> 
                    <!-- .ad-banner -->
                </div>
                <!-- .article-collection-a-right-rs -->
                <?php endif; ?>
            </div>
            <!-- .article-collection-a-right -->
        </div>
        <!-- .article-collection-a -->
        <?php endif; ?>
    </div>
    <!-- .article-collection-a-col -->
</div>
<!-- .article-collection-a-row -->

<div class="row article-collection-horizontal-list-row mt-2 row-bottom-space">
    <div class="col article-collection-horizontal-list-col x-space-1">
        <div class="article-collection-horizontal-list bg-white">
            <?php
            $collection_c_actual_featured_post_ids = array();
            global $post;

            foreach( $post_collection_c_featured_actual as $post ) :	
                setup_postdata( $post );                            
                array_push($collection_c_actual_featured_post_ids, $post->ID );
            endforeach; 

            wp_reset_postdata(); 
            
            global $post;                            
            $collection_c_non_featured_posts_args = array( 
                'category_name'  => $post_collection_c_category_slug,
                'post__not_in' => $collection_c_actual_featured_post_ids,
                'posts_per_page' => 6,
                'post_status' => 'publish'
            );

            $collection_c_non_featured_posts_list = get_posts( $collection_c_non_featured_posts_args ); 
            
            
            foreach( $collection_c_non_featured_posts_list as $post ) :
                setup_postdata( $post );
               
                global $text_color_date, $text_color_author;
                
                $text_color_date = 'text-primary';
                $text_color_author = 'text-gray-400';

                get_template_part( 'template-parts/content/content-excerpt', 'smallest' );

            endforeach;
            wp_reset_postdata(); ?>
        </div>
        <!-- .article-collection-horizontal-list -->
    </div>
    <!-- .article-collection-horizontal-list-col  -->
</div>
<!-- .article-collection-horizontal-list-row -->


<?php endif; ?>

