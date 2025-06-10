<?php
/**
 * WooCommerce Cart Template Override
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<div class="ttf-cart-wrapper">
    <?php woocommerce_breadcrumb(); ?>
    <?php wc_print_notices(); ?>
    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <?php do_action( 'woocommerce_before_cart_table' ); ?>
        <table class="shop_table shop_table_responsive cart" cellspacing="0">
            <thead>
            <tr>
                <th class="product-name">Product</th>
                <th class="product-total">Subtotal</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
                        ?>
                        <tr class="woocommerce-cart-form__cart-item">
                            <td class="product-name">
                                <?php echo $_product->get_name(); ?>
                                <?php
                                $gifts = get_post_meta( $_product->get_id(), '_ttf_gifts', true );
                                if ( $gifts ) {
                                    echo '<div class="gifts">Gifts: ' . esc_html( $gifts ) . '</div>';
                                }
                                ?>
                            </td>
                            <td class="product-total">
                                <?php echo wc_price( $_product->get_price() * $cart_item['quantity'] ); ?>
                            </td>
                        </tr>
                    <?php endif; endforeach; ?>
            </tbody>
        </table>
        <?php do_action( 'woocommerce_cart_actions' ); ?>
    </form>
    <div class="cart-collaterals">
        <?php woocommerce_cart_totals(); ?>
        <div class="pincode-check">
            <input type="text" id="pincode" placeholder="Enter Pincode" />
            <button type="button" id="check-pincode">Check</button>
            <div id="delivery-estimate"></div>
        </div>
    </div>
</div>
<script>
document.getElementById('check-pincode').addEventListener('click', function(){
    var code = document.getElementById('pincode').value;
    var estimate = '7 days';
    if(code.startsWith('456')){ estimate = '2 days'; }
    else if(code.endsWith('123')){ estimate = '4 days'; }
    document.getElementById('delivery-estimate').textContent = 'Estimated Delivery: ' + estimate;
});
</script>
<?php
get_footer( 'shop' );
