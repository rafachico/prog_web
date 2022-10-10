<?php
   /*
   Plugin Name: Beneficio Anuidade
   Plugin URI: https://github.com/rafachico/
   description: Caso o usuario tenha se cadastrado nos ultimos 30 dias a anuidade é abatida.
   Version: 1.0
   Author: Rafael
   Author URI: https://github.com/rafachico/
   License: GPL2
   */
add_action('woocommerce_before_cart_totals', 'apply_coupons',1,1);

function idade_perfil(){
	$limite = date('c', strtotime('-30 days'));
	$regis = get_userdata(get_current_user_id( ))->user_registered;
	$user = date('c', strtotime($regis));
	if($user >= $limite)
		return true;
}

function coupon(){
$user = get_current_user();
$email = $user->user_email;
$cregis = get_userdata(get_current_user_id( ))->user_registered;
$cuser = date('d/m/Y',strtotime($cregis));
$clim = date('Y-m-d',strtotime('+30 days',strtotime(str_replace('/', '-', $cuser))));
$coupon_code = mt_rand(); // Code
$amount = '5'; // Amount
$discount_type = 'fixed_cart'; // Type: fixed_cart, percent, fixed_product, percent_product
					
$coupon = array(
	'post_title' => $coupon_code,
	'post_content' => '',
	'post_status' => 'publish',
	'post_author' => 1,
	'post_type'		=> 'shop_coupon'
);
					
$new_coupon_id = wp_insert_post( $coupon );
					
// Add meta
update_post_meta( $new_coupon_id, 'discount_type', $discount_type );
update_post_meta( $new_coupon_id, 'coupon_amount', $amount );
update_post_meta( $new_coupon_id, 'individual_use', 'yes' );
update_post_meta( $new_coupon_id, 'product_ids', '207' );
update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
update_post_meta( $new_coupon_id, 'usage_limit', '1' );
update_post_meta( $new_coupon_id, 'expiry_date', $clim );
update_post_meta( $new_coupon_id, 'apply_before_tax', 'yes' );
update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
update_post_meta( $new_coupon_id, 'customer_email', $user->user_email );
return $coupon_code;
}
   
function bbloomer_find_product_in_cart() {
 
   $product_id = 207;
 
   $product_cart_id = WC()->cart->generate_cart_id( $product_id );
   $in_cart = WC()->cart->find_product_in_cart( $product_cart_id );
 
   if ( $in_cart ) {
 
      return true;
 
   }
 
}

function apply_coupons() {
	if( idade_perfil() ){
		if( bbloomer_find_product_in_cart() ){
			if( !WC()->cart->get_coupons() ) {
				$dregis = get_userdata(get_current_user_id( ))->user_registered;
				$duser = date('d/m/Y',strtotime($dregis));
				$dlim = date('d/m/Y',strtotime('+30 days',strtotime(str_replace('/', '-', $duser))));
				$notice='Seja bem vindo !				
				Como incentivo ao seu desenvolvimento junto ao Clube, esta sendo aplicado automaticamente 
				o código cupom para a isenção de sua taxa anual de associação de R$5,00 (cinco reais), desde que você efetue sua primeira compra até: '.$dlim;
				$type = 'notice';
				WC()->cart->add_discount( coupon() );
				wc_add_notice($notice,$type);
			}
    }
	}
}

?>