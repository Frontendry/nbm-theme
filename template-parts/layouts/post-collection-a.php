<?php
$post_collection_a_title = get_sub_field( 'post_collection_title' );
$post_collection_a_first_column = get_sub_field( 'first_column_post' );
$post_collection_a_second_column = get_sub_field( 'second_column_posts' );
$post_collection_a_third_column = get_sub_field( 'third_column_posts' );				
if( !empty( $post_collection_a_title ) ) : ?>
    <div class="row article-collection-a-row row-bottom-space">
        <div class="col article-collection-a-col x-space-1 position-relative">
            <h2 class="title-article-collection text-white bg-warning"><?php echo esc_html( $post_collection_a_title ); ?></h2>

            <div class="article-collection-a">
                <?php
                if( $post_collection_a_first_column ) :
                global $post;
                $post = $post_collection_a_first_column;
                setup_postdata( $post ); ?>

                <div class="article-collection-a-left">
                    <?php
                    global $text_color_date, $text_color_author, $bg_color;
                    
                    $text_color_date = 'text-warning';
                    $text_color_author = 'text-gray-400';
                    $bg_color = 'bg-warning';

                    get_template_part( 'template-parts/content/content-excerpt', 'big' );
                    ?>
                </div>
                <!-- .article-collection-a-left -->
                <?php 
                endif;
                wp_reset_postdata();
                
                if( $post_collection_a_second_column || $post_collection_a_third_column ) :?>
                <div class="article-collection-a-right">
                    <?php
                    if( $post_collection_a_second_column ) : ?>
                    <div class="article-collection-a-right-ls bg-white">
                        <?php											
                        $collection_a_second_post_ids = array();

                        global $post;

                        foreach( $post_collection_a_second_column as $post ) :	
                            setup_postdata( $post );                            
                            array_push($collection_a_second_post_ids, $post->ID );
                        endforeach; 

                        wp_reset_postdata(); 										
                        
                        $selectedPosts = $collection_a_second_post_ids; ?>

                        <div class="article-eles-v-carousel carousel-v position-relative">
                            <?php
                            global $post;
                            
                            $collection_a_second_posts_args = array( 
                                'post__in' => $selectedPosts,
                                'orderby' => 'post__in',
                                'posts_per_page' => 6,
                                'post_status' => 'publish'
                            );

                            $collection_a_second_posts_list = get_posts( $collection_a_second_posts_args );

                            foreach( $collection_a_second_posts_list as $post ) :
                                setup_postdata( $post );
                               
                                global $text_color_date, $text_color_author;
                                
                                $text_color_date = 'text-warning';
                                $text_color_author = 'text-gray-400';

                                get_template_part( 'template-parts/content/content-excerpt', 'text-carousel' );
                                
                            endforeach;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <!-- .article-eles-v-carousel -->
                    </div>
                    <!-- .article-collection-a-right-ls -->
                    <?php 
                    endif; 

                    if( $post_collection_a_third_column ) : ?>
                        <div class="article-collection-a-right-rs article-collection-select">
                            <?php
                            $collection_a_third_post_ids = array();
                            global $post;

                            foreach( $post_collection_a_third_column as $post ) :	
                                setup_postdata( $post );                            
                                array_push($collection_a_third_post_ids, $post->ID );
                            endforeach; 

                            wp_reset_postdata(); 

                            $selectedPosts = $collection_a_third_post_ids;
                            
                            global $post;                            
                            $collection_a_third_posts_args = array( 
                                'post__in' => $selectedPosts,
                                'orderby' => 'post__in',
                                'posts_per_page' => 3,
                                'post_status' => 'publish'
                            );

                            $collection_a_third_posts_list = get_posts( $collection_a_third_posts_args );

                            $countpostlist = 1;

                            foreach( $collection_a_third_posts_list as $post ) :
                                setup_postdata( $post );

                                if( $countpostlist != 2 ) :
                                    global $text_color_date, $text_color_author;
                                
                                    $text_color_date = 'text-warning';
                                    $text_color_author = 'text-gray-400';

                                    get_template_part( 'template-parts/content/content-excerpt', 'small' );
                                else:
                                    global $bg_color, $text_color;
                                
                                    $bg_color = 'bg-warning';
                                    $text_color = 'text-white';

                                    get_template_part( 'template-parts/content/content-excerpt', 'text-medium' );
                                endif;
                            $countpostlist ++;
                            endforeach;
                            wp_reset_postdata(); 
                            
                            ?>
                        </div>
                        <!-- .article-collection-a-right-rs -->
                    <?php endif; ?>

                </div>
                <!-- .article-collection-a-right -->

                <?php endif;?>
            </div>
            <!-- .article-collection-a -->
        </div>
        <!-- .article-collection-a-col -->
    </div>
    <!-- .article-collection-a-row -->
<?php
endif;