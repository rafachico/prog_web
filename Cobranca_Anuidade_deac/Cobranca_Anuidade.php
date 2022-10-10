<?php
   /*
   Plugin Name: Cobrança da Anuidade
   Plugin URI: https://github.com/rafachico/
   description: Caso o usuario não possua o nivel de associado, adicionara o produto equivalente a anuidade em seu carrinho.
   Version: 1.0
   Author: Rafael
   Author URI: https://github.com/rafachico/
   License: GPL2
   */
   
add_action( 'template_redirect', 'cobrar_anuidade');
   
   function cobrar_anuidade(){
	   if( !pmpro_hasMembershipLevel(1) ){
		   if (is_user_logged_in()){
				$product_id = 207;
				$product_cart_id = WC()->cart->generate_cart_id( $product_id );
				$in_cart = WC()->cart->find_product_in_cart( $product_cart_id );
				if ( !$in_cart ) {
					WC()->cart->add_to_cart( $product_id );
				}
		   }else{
				$product_id = 15267;
				$product_cart_id = WC()->cart->generate_cart_id( $product_id );
				$in_cart = WC()->cart->find_product_in_cart( $product_cart_id );
				if ( !$in_cart ) {
					WC()->cart->add_to_cart( $product_id );
				}
		   }
		
		}else{
			$product_id = 207;
			$product_cart_id = WC()->cart->generate_cart_id( $product_id );
			$in_cart = WC()->cart->find_product_in_cart( $product_cart_id );
			if( $in_cart ) {
				WC()->cart->remove_cart_item($product_cart_id);
			}
		}
		if ( is_user_logged_in() ){
			$product_id = 15267;
			$product_cart_id = WC()->cart->generate_cart_id( $product_id );
			$in_cart = WC()->cart->find_product_in_cart( $product_cart_id );
			if( $in_cart ) {
				WC()->cart->remove_cart_item($product_cart_id);
			}
		}
   }
?>