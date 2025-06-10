<?php
/**
 * WooCommerce Single Product Template Override
 */

defined('ABSPATH') || exit;

get_header('shop');
?>
<div class="ttf-product-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="gallery">
            <?php woocommerce_show_product_images(); ?>
        </div>
        <div class="summary">
            <h1><?php the_title(); ?></h1>
            <div id="product-price" data-price="<?php echo wc_get_price_to_display( $product ); ?>">
                <?php echo wc_price(wc_get_price_to_display( $product )); ?>
            </div>
            <form class="cart" method="post" enctype='multipart/form-data'>
                <fieldset>
                    <label><input type="radio" name="purchase_mode" value="single_sub" checked>Single Drink Subscription</label>
                    <label><input type="radio" name="purchase_mode" value="double_sub">Double Drink Subscription</label>
                    <label><input type="radio" name="purchase_mode" value="single">Try Once Single</label>
                    <label><input type="radio" name="purchase_mode" value="double">Try Once Double</label>
                </fieldset>
                <?php woocommerce_template_single_add_to_cart(); ?>
            </form>
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</div>
<?php
get_footer('shop');
