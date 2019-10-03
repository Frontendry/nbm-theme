<?php global $text_color_date, $text_color_author; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-el main-article-el-b' ); ?> data-postid="<?php the_ID(); ?>">
    <?php nbm_theme_post_thumbnail(); ?>

    <div class="article-el-text bg-white">

        <?php
        if( is_author() ) : ?>
        <div class="post-meta-cont mb-3">
            <a class="post-date <?php echo $text_color_date; ?> d-block" href="<?php the_permalink(); ?>">
                <?php nbm_theme_posted_on(); ?>
            </a>
            <!-- .post-date -->	

            <a class="post-author <?php echo $text_color_author; ?>" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                <span>By <?php echo esc_html( get_the_author() ); ?></span>
            </a>
            <!-- .post-author -->
        
        </div>
        <!-- .post-meta-cont -->

        <h3 class="article-el-text-title"><a href="<?php the_permalink(); ?>" class="text-dark"><?php echo esc_html( nbm_theme_limit_text( get_the_title(),9 ) ); ?></a></h3>

        <?php nbm_theme_categories_list();  ?>

       
        <?php else: ?>        

        <a class="post-date <?php echo $text_color_date; ?> d-block mb-2" href="<?php the_permalink(); ?>">
            <?php nbm_theme_posted_on(); ?>
        </a>
        <!-- .post-date -->
    
        <h3 class="article-el-text-title"><a href="<?php the_permalink(); ?>" class="text-dark"><?php echo esc_html( nbm_theme_limit_text( get_the_title(),9 ) ); ?></a></h3>

        <a class="post-author d-block <?php echo $text_color_author; ?> mt-2" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
            <span>By <?php echo esc_html( get_the_author() ); ?></span>
        </a>
        <!-- .post-date -->

        <?php endif; ?>
        
    </div>
</article>  