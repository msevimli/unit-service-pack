<?php
/**
 * Plugin Name: wcUnitServicePack
 * Plugin URI: http://plife.se
 * Description: This Plugin is service pack of woocommerce unit upper version than wocommerce 3.0.x
 * Version: 1.0.0
 * Author: Deniz
 * Author URI: http://plife.se
 * License: GPL2
 */

class class_unit_service_pack {

    /**
     * WPS_Minimum_Maximum_Order_Quantities constructor
     */
    public function __construct() {
        $this->init();
    }

    public function init() {
        add_action( 'woocommerce_before_calculate_totals', 'init_custom_price' );
    }
    function init_custom_price($cart_object) {
        add_custom_price();
    }
    function add_custom_price( $custom_price, $target_product_id ) {
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            if ( $cart_item['product_id']  ) {
                $cart_item['data']->set_price($cart_item['data']->price);
            }
        }
    }

}
new class_unit_service_pack();