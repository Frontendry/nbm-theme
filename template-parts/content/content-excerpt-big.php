<?php 
global $text_color_date, $text_color_author, $bg_color;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-el main-article-el-a' ); ?> data-postid="<?php the_ID(); ?>">
    <?php nbm_theme_post_thumbnail(); ?>

    <div class="article-el-text bg-white">

        <div class="post-meta-cont mb-3">
            <a class="post-date <?php echo $text_color_date; ?>" href="<?php the_permalink(); ?>">
                <?php nbm_theme_posted_on(); ?>
            </a>
            <!-- .post-date -->

            <a class="post-author <?php echo $text_color_author; ?>" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                <span>By <?php echo esc_html( get_the_author() ); ?></span>
            </a>
            <!-- .post-date -->
        </div>
        <!-- .post-meta-cont -->
    
        <h3 class="article-el-text-title"><a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a></h3>

        <span class="delimeter mt-4 <?php echo $bg_color; ?>"></span>
    </div>    
</article>