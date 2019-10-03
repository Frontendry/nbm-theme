<?php global $bg_color, $text_color;  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-el text-alone' ); ?> data-postid="<?php the_ID(); ?>">

    <div class="article-el-text <?php echo $bg_color; ?>">
        
        <div class="post-meta-cont mb-3">
            <a class="post-date <?php echo $text_color; ?> d-block" href="<?php the_permalink(); ?>">
                <?php nbm_theme_posted_on(); ?>
            </a>
            <!-- .post-date -->	

            <a class="post-author <?php echo $text_color; ?>" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                <span>By <?php echo esc_html( get_the_author() ); ?></span>
            </a>
            <!-- .post-author -->
        
        </div>
        <!-- .post-meta-cont -->

        <h3 class="article-el-text-title"><a href="<?php the_permalink(); ?>" class="<?php echo $text_color; ?>"><?php the_title(); ?></a></h3> 
    </div>
</article>