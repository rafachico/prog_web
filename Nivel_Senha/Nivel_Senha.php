<?php
   /*
   Plugin Name: Nivel Senha
   Plugin URI: https://github.com/rafachico/
   description: Desabilita o nivel de senha do Woocommerce
   Version: 1.0
   Author: Rafael
   Author URI: https://github.com/rafachico/
   License: GPL2
   */
function iconic_remove_password_strength() {
    wp_dequeue_script( 'wc-password-strength-meter' );
}
add_action( 'wp_print_scripts', 'iconic_remove_password_strength', 10 );
?>