<?php
$two_column_image = get_sub_field( 'two_column_images' );
$two_column_image_ls = $two_column_image['first_column_image'];
$two_column_image_rs = $two_column_image['second_column_image'];


if( !empty( $two_column_image) ) : ?>
<div class="row image-placement-row row-bottom-space-2">
    <div class="col image-placement-col x-space-2">
        <div class="image-placement">

            <?php
            if( !empty( $two_column_image_ls ) ) : ?>
            <figure class="image-placement-col image-placement-ls">
                <img src="<?php echo $two_column_image_ls['url'] ?>" class="img-fluid">
            </figure>
            <?php endif;
            
            
            if( !empty( $two_column_image_rs ) ) : ?>
            <figure class="image-placement-col image-placement-rs">
                <img src="<?php echo $two_column_image_rs['url'] ?>" class="img-fluid">
            </figure>
            <?php endif; ?>

        </div>
    </div>
    <!-- .image-placement-col -->
</div>
<!-- .image-placement-row -->
<?php endif; ?>