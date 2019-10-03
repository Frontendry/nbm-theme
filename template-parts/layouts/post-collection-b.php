<?php
$post_collection_b_category = get_sub_field( 'post_collection_category' );
$post_collection_b_category_title = $post_collection_b_category->name;
$post_collection_b_category_slug = $post_collection_b_category->slug;
$post_collection_b_featured = get_sub_field( 'featured_category_posts' );

if( !empty( $post_collection_b_category ) ) : ?>
    <div class="row article-collection-b-row">
        <div class="col article-collection-b-col x-space-1 position-relative">
            <h2 class="title-article-collection text-white bg-info "><?php echo esc_html($post_collection_b_category_title); ?></h2>

            <?php
            if( !empty( $post_collection_b_featured ) ) : ?>

            <div class="article-collection-b">
            <?php
            $collection_b_featured_post_ids = array();

            global $post;

            foreach( $post_collection_b_featured as $post ) :	
                setup_postdata( $post );                            
                array_push($collection_b_featured_post_ids, $post->ID );
            endforeach; 

            wp_reset_postdata(); 										
            
            $selectedfeaturedBPosts = $collection_b_featured_post_ids; 

            global $post;
                            
            $collection_b_featured_posts_args = array( 
                'post__in' => $selectedfeaturedBPosts,
                'orderby' => 'post__in',
                'posts_per_page' => 4,
                'post_status' => 'publish'
            );

            $collection_b_featured_posts_list = get_posts( $collection_b_featured_posts_args );

            $count_collection_b_featured_posts = 1;

            foreach( $collection_b_featured_posts_list as $post ) :
                setup_postdata( $post );
               
                global $text_color_date, $text_color_author;
                
                $text_color_date = 'text-info';
                $text_color_author = 'text-gray-400';

                if( $count_collection_b_featured_posts == 1 ) : ?>
                    <div class="article-collection-b-left">
                        <div class="article-collection-b-left-ls article-collection-b-inner-bigger">
                            <?php get_template_part( 'template-parts/content/content-excerpt', 'medium' ); ?>
                        </div>
                        <!-- .article-collection-b-left-ls -->
                <?php
                elseif( $count_collection_b_featured_posts == 2 ) : ?>
                         <div class="article-collection-b-left-rs article-collection-b-inner-big">
                            <?php get_template_part( 'template-parts/content/content-excerpt', 'small-b' ); ?>
                         </div>
                         <!-- .article-collection-b-left-rs -->
                    </div>
                    <!-- .article-collection-b-left -->
                <?php
                elseif( $count_collection_b_featured_posts == 3 ) : ?>
                    <div class="article-collection-b-right">
                        <div class="article-collection-b-right-ls article-collection-b-inner-bigger">
                            <?php get_template_part( 'template-parts/content/content-excerpt', 'medium' ); ?>
                        </div>
                        <!-- .article-collection-b-right-ls -->
                <?php
                else : ?>
                    <div class="article-collection-b-right-rs article-collection-b-inner-big">
                        <?php get_template_part( 'template-parts/content/content-excerpt', 'small-b' ); ?>
                    </div>
                    <!-- .article-collection-b-right-rs -->
                </div>
                <!-- .article-collection-b-right -->
                <?php
                endif;

            $count_collection_b_featured_posts++;   
            endforeach;
            wp_reset_postdata();
            ?>
            </div>
            <!-- .article-collection-b -->

            <?php endif; ?>
        </div>
        <!-- .article-collection-b-col -->
    </div>
    <!-- .article-collection-b-row -->

    <div class="row article-collection-horizontal-list-row mt-2 row-bottom-space">
        <div class="col article-collection-horizontal-list-col x-space-1">
            <div class="article-collection-horizontal-list bg-white">
            <?php
            global $post;
                            
            $collection_b_non_featured_posts_args = array( 
                'category_name'  => $post_collection_b_category_slug,
                'posts_per_page' => 6,
                'post__not_in' => $selectedfeaturedBPosts,
                'post_status' => 'publish'
            );

            $collection_b_non_featured_posts_list = get_posts( $collection_b_non_featured_posts_args ); 
            
            
            foreach( $collection_b_non_featured_posts_list as $post ) :
                setup_postdata( $post );
               
                global $text_color_date, $text_color_author;
                
                $text_color_date = 'text-info';
                $text_color_author = 'text-gray-400';

                get_template_part( 'template-parts/content/content-excerpt', 'smallest' );

            endforeach;
            wp_reset_postdata(); ?>
            </div>
            <!-- .article-collection-horizontal-list -->
        </div>
        <!-- .article-collection-horizontal-list-col -->
    </div>
    <!-- .article-collection-horizontal-list-row -->

<?php endif; ?>

