<?php
   /*
   Plugin Name: Pedido Pendente
   Plugin URI: https://github.com/rafachico/
   description: Caso o usuario possua um pedido pendente, não permite a realização de uma nova compra.
   Version: 1.3
   Author: Rafael
   Author URI: https://github.com/rafachico/
   License: GPL2
   */
   
   
add_action('woocommerce_after_checkout_validation', 'recusa_pedido_pendente');
 
function recusa_pedido_pendente( $posted ) {
global $woocommerce;
$checkout_email = $posted['billing_email'];
$user = get_user_by( 'email', $checkout_email );
 
if ( ! empty( $user ) ) {
$customer_orders_hold = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $user->ID,
        'post_type'   => 'shop_order',
        'post_status' => 'wc-on-hold'
) );
$customer_orders_pending = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $user->ID,
        'post_type'   => 'shop_order',
        'post_status' => 'wc-pending'
) );
foreach ( $customer_orders_hold as $customer_orders_hold ) {
        $count++;
}
foreach ( $customer_orders_pending as $customer_orders_pending ) {
        $count++;
}
if ( $count > 0 ) {
   wc_add_notice( 'Foi encontrado um pedido pendente, aguarde a confirmação do pagamento para realizar uma nova compra.', 'error');
}
}
 
}
?>