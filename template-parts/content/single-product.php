<?php
/* global $product, $woocommerce; */

$cart_url = wc_get_cart_url();
$singleproductheader = get_field( 'subscribe_page_header' );

$product = wc_get_product( get_the_ID() );
$product_short_description = $product->get_short_description();
$product_price = $product->get_regular_price();
$currency_symbol = get_woocommerce_currency_symbol();
?>

<section class="content-area">
    <div class="container-fluid">
        <article class="post-entry">
            <div class="row section-title-row mt-5">
                <div class="col section-title-col x-space-1">
                    <header class="section-title text-center">
                        <h1><?php echo $singleproductheader; ?></h1> 
                    </header>

                    <div class="description-text text-center mt-3">
                       <p><?php echo $product_short_description; ?></p> 
                    </div>
                    <!-- .description-text -->
                </div>
                <!-- .section-title-col -->
            </div>
            <!-- .section-title-row -->

            <div class="row card-display-row mt-3 mb-7">
                <div class="col card-display-col x-space-1 d-flex justify-content-center">
                    <div class="card-display d-flex align-items-center  flex-column">
                        <h3 class="card-display-title">Monthly Membership</h3>


                        <div class="price d-flex align-items-start">
                            <span class="price-symbol"><?php echo $currency_symbol;  ?></span>
                            <div class="price-val">
                            <?php echo $product_price;  ?>
                            </div>
                            <!-- .price-val -->
                        </div>

                        <div class="cta-cont">
                            <a href="<?php echo $cart_url; ?>" class="arrowed-btn btn-primary text-white">Subscribe</a>
                        </div>
                        <!-- .cta-cont -->

                        
                    </div>
                    <!-- .card-display -->
                </div>
                <!-- .card-display-col -->
            </div>
            <!-- .card-display-row -->

            
        </article>
        <!-- .post-entry -->
    </div>
    <!-- .container-fluid -->
</section>
<!-- .content-area -->
