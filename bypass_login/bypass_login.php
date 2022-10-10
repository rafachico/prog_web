<?php
   /*
   Plugin Name: Bypass Login 
   Plugin URI: http://clube.cosmeticbeauty.com.br
   description: Bypass do login obrigatorio(NÃO DESATIVAR)
   Version: 1.0
   Author: Rafael
   Author URI: http://clube.cosmeticbeauty.com.br
   License: GPL2
   */
// Hide the 'Back to {sitename}' link on the login screen.
function my_forcelogin_hide_backtoblog() {
  echo '<style type="text/css">#backtoblog{display:none;}</style>';
}
add_action( 'login_enqueue_scripts', 'my_forcelogin_hide_backtoblog' );

/**
 * Bypass Force Login to allow for exceptions.
 *
 * @param bool $bypass Whether to disable Force Login. Default false.
 * @return bool
 */

function my_forcelogin_bypass( $bypass ) {
  if ( is_page(512) || is_page(35) || is_page(338) || is_page(707) || is_page(3) ) {
    $bypass = true;
  }
  return $bypass;
}
add_filter( 'v_forcelogin_bypass', 'my_forcelogin_bypass' );
?>