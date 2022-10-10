<?php
   /*
   Plugin Name: Novos Cadastro
   Plugin URI: https://github.com/rafachico/
   description: Identifica e alerta novos cadastro sem Codigo LS.
   Version: 1.4
   Author: Rafael
   Author URI: https://github.com/rafachico/
   License: GPL2
   */
   add_action( 'admin_notices', 'sample_admin_notice__error' );

   function sample_admin_notice__error() {
	global $wpdb;
	$wp_user_query = new WP_User_Query(array('role' => 'Customer'));
	$users = $wp_user_query->get_results();
	foreach ($users as $user)
    {
        add_user_meta( $user->id, 'cod_ls', '', true );
    }
		$nuser = $wpdb->get_results("SELECT * FROM wp_usermeta WHERE meta_key= 'cod_ls' AND meta_value=''");
		foreach ($nuser as $auser){
		if(pmpro_hasMembershipLevel('1', $auser->user_id)){
		$usernome=get_the_author_meta('nickname', $auser->user_id);
		$class = 'notice notice-error';
		$message = __("O Usuário: ".$usernome." ainda não possui um Codigo LS", 'sample-text-domain' );
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
		}
	}
}
?>