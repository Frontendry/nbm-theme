<?php
$landing_page_big_ad = get_sub_field( 'landing_page_ad' );
$landing_page_big_ad_link = get_sub_field( 'landing_page_big_ad_link' );

if( !empty( $landing_page_big_ad ) ) : ?>
<div class="row midpagead-row row-bottom-space">
    <div class="col midpagead-col">
        <div class="midpagead x-space-1 d-flex justify-content-center">
            <figure class="midpagead-img">
                <a href="<?php echo esc_url( $landing_page_big_ad_link[ 'url' ] ); ?>">
                    <img src="<?php echo esc_url( $landing_page_big_ad[ 'url' ] ); ?>">
                </a>
            </figure>
        </div>
        <!-- .midpagead -->
    </div>
    <!-- .midpagead-col -->
</div>
<!-- .midpagead-row -->
<?php endif; ?>