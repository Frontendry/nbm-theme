<?php
$post_collection_d_category = get_sub_field( 'post_collection_category' );

if( !empty( $post_collection_d_category ) ) :

$post_collection_d_categor_title = $post_collection_d_category->name; 
$post_collection_d_categor_slug = $post_collection_d_category->slug;
$post_collection_d_categor_id = $post_collection_d_category->term_id;
$post_collection_d_first_bunch_ids = array();
?>

<div class="row article-collection-horizontal-list-row">
    <div class="col article-collection-horizontal-list-col x-space-1 position-relative">
        <h2 class="title-article-collection text-white bg-deep-orange"><?php echo esc_html( $post_collection_d_categor_title ); ?></h2>

        <div class="article-collection-horizontal-list bg-white">
            <?php  

            global $post;

            $collection_d_first_bunch_args = array( 
                'category_name'  => $post_collection_d_categor_slug,                
                'posts_per_page' => 6,
                'post_status' => 'publish'
            );

            $collection_d_first_bunch_list = get_posts( $collection_d_first_bunch_args ); 

            foreach( $collection_d_first_bunch_list as $post ) :	
                setup_postdata( $post ); 
                
                array_push($post_collection_d_first_bunch_ids, $post->ID );
                
                global $text_color_date, $text_color_author;
                
                $text_color_date = 'text-deep-orange';
                $text_color_author = 'text-gray-400';

                get_template_part( 'template-parts/content/content-excerpt', 'smallest' );
                
            endforeach; 

            wp_reset_postdata(); 
            ?>

        </div>
        <!-- .article-collection-horizontal-list -->
    </div>
    <!-- .article-collection-horizontal-list-col -->
</div>
<!-- .article-collection-horizontal-list-row -->

<?php
$post_collection_d_category_count = get_category( $post_collection_d_categor_id )->count;
if( count($post_collection_d_first_bunch_ids ) == 6 && $post_collection_d_category_count > 6  ) : ?>
<div class="row article-collection-horizontal-list-row mt-2 row-bottom-space">
    <div class="col article-collection-horizontal-list-col x-space-1">
        <div class="article-collection-horizontal-list bg-white">
        <?php  

        global $post;

        $collection_d_next_bunch_args = array( 
            'category_name'  => $post_collection_d_categor_slug,                
            'posts_per_page' => 6,
            'post__not_in' => $post_collection_d_first_bunch_ids,
            'post_status' => 'publish'
        );

        $collection_d_next_bunch_list = get_posts( $collection_d_next_bunch_args );
        
        foreach( $collection_d_next_bunch_list as $post ) :
            setup_postdata( $post );
           
            global $text_color_date, $text_color_author;
            
            $text_color_date = 'text-deep-orange';
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


<?php endif; ?>