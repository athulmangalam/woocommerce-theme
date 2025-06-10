(function($){
    function updatePricing() {
        var mode = $('input[name="purchase_mode"]:checked').val();
        var base = parseFloat($('#product-price').data('price'));
        var subscriptionPrice = base * 0.75;
        var salePrice = base * 0.8;
        var subSale = subscriptionPrice * 0.8;
        if(mode === 'single') {
            $('#product-price').text('$' + salePrice.toFixed(2));
        } else if(mode === 'double') {
            $('#product-price').text('$' + (salePrice*2).toFixed(2));
        } else if(mode === 'single_sub') {
            $('#product-price').text('$' + subSale.toFixed(2));
        } else if(mode === 'double_sub') {
            $('#product-price').text('$' + (subSale*2).toFixed(2));
        }
    }
    $(document).on('change', 'input[name="purchase_mode"]', updatePricing);
    $(document).ready(updatePricing);
})(jQuery);
