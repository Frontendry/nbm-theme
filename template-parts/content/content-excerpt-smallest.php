<?php global $text_color_date, $text_color_author; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-el' ); ?> data-postid="<?php the_ID(); ?>">
    <div class="article-el-text">

        <a class="post-date <?php echo $text_color_date; ?> d-block mb-2" href="<?php the_permalink(); ?>">
            <?php nbm_theme_posted_on(); ?>
        </a>
        <!-- .post-date -->

        <h3 class="article-el-text-title"><a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a></h3>

        <a class="post-author <?php echo $text_color_author; ?> d-block mt-2" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
            <span>By <?php echo esc_html( get_the_author() ); ?></span>
        </a>
        <!-- .post-date -->        
    </div>
</article>