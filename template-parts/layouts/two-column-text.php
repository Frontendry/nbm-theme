<?php
$two_column_text_container = get_sub_field( 'two_column_text' );
$two_column_text_ls = $two_column_text_container['title'];
$two_column_text_rs = $two_column_text_container['body_text'];

if( !empty( $two_column_text_rs ) ) : ?>
<div class="row text-placement-row row-bottom-space-2">
    <div class="col text-placement-col x-space-2">
        <div class="text-placement">
            <?php 

            if( !empty( $two_column_text_ls ) ) : ?>
            <div class="text-placement-ls">
                <?php echo $two_column_text_ls;  ?>
            </div>
            <!-- .text-placement-ls -->
            <?php endif;
            
            
            if( !empty( $two_column_text_rs ) ) : ?>
            <div class="text-placement-rs">
                <div class="text-placement-textarea">                    
                    <?php echo $two_column_text_rs; ?>
                </div>
            </div>
            <!-- .text-placement-rs -->
            <?php endif; ?>
        </div>
        <!-- .text-placement -->
    </div>
    <!-- .text-placement-col -->
</div>
<!-- .text-placement-row -->
<?php endif; ?>