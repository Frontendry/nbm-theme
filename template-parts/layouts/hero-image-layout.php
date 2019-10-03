<?php
$hero_image = get_sub_field( 'hero_image' );

if( !empty( $hero_image ) ) : ?>
 <div class="row hero-row row-bottom-space-2">
    <div class="col hero-col x-space-1">
        <div class="hero">
            <figure class="hero-img">
                <img src="<?php echo $hero_image['url']; ?>"  class="img-fluid">
            </figure>
        </div>
        <!-- .hero -->
    </div>
    <!-- .hero-col -->
</div>
<!-- .hero-row -->
<?php endif; ?>