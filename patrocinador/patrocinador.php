<?php
   /*
   Plugin Name: Patrocinador
   Plugin URI: https://github.com/rafachico/
   description: Cria um cookie com o id do patrocinador, e cria um campo com o dado em seguida.
   Version: 1.0
   Author: Rafael
   Author URI: https://github.com/rafachico/
   License: GPL2
   */

add_action( 'user_register', 'tees' );
function tees( $user_id ) {
	if ( isset($_COOKIE["inviter"])) {
		$referrer = $_COOKIE["inviter"];
		add_user_meta( $user_id, 'invfr_referrer', $referrer );
	} else {
		$referrer = '4';
		add_user_meta( $user_id, 'invfr_referrer', $referrer );
	}
}
add_action( 'init', 'set_agent_cookie' );

function set_agent_cookie() {
    if (isset($_GET['invfr'])) {
      $name = 'inviter';
      $id = $_GET['invfr'];    
       setcookie( $name, $id, time() + 604800, "/", COOKIE_DOMAIN );
    }
}
?>