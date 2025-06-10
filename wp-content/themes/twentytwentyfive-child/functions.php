<?php
// Enqueue child theme styles and scripts
function ttf_child_enqueue_scripts() {
    wp_enqueue_style('twentytwentyfive-child-style', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script('ttf-child-js', get_stylesheet_directory_uri() . '/js/main.js', ['jquery'], filemtime(get_stylesheet_directory() . '/js/main.js'), true);
}
add_action('wp_enqueue_scripts', 'ttf_child_enqueue_scripts');

// Add custom meta fields for gifts and recommended products
function ttf_child_add_product_meta() {
    woocommerce_wp_text_input([
        'id'          => '_ttf_gifts',
        'label'       => __('Gift Product IDs', 'ttf-child'),
        'description' => __('Comma separated product IDs that will be shown as gifts in cart', 'ttf-child'),
    ]);
    woocommerce_wp_text_input([
        'id'          => '_ttf_recommended',
        'label'       => __('Recommended Product IDs', 'ttf-child'),
        'description' => __('Comma separated product IDs recommended in cart', 'ttf-child'),
    ]);
}
add_action('woocommerce_product_options_general_product_data', 'ttf_child_add_product_meta');

function ttf_child_save_product_meta($post_id) {
    if (isset($_POST['_ttf_gifts'])) {
        update_post_meta($post_id, '_ttf_gifts', sanitize_text_field($_POST['_ttf_gifts']));
    }
    if (isset($_POST['_ttf_recommended'])) {
        update_post_meta($post_id, '_ttf_recommended', sanitize_text_field($_POST['_ttf_recommended']));
    }
}
add_action('woocommerce_process_product_meta', 'ttf_child_save_product_meta');
