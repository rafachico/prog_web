<?php
   /*
   Plugin Name: Códigos de Cadastro
   Plugin URI: https://github.com/rafachico/
   description: Faz a busca dos codigos de cadastro e os exibe no perfil.
   Version: 1.0
   Author: Rafael
   Author URI: https://github.com/rafachico/
   License: GPL2
   */

//Busca as informações para identificar os codigos de cadastro
   add_action( 'personal_options_update', 'preencher' );
   add_action( 'edit_user_profile', 'preencher' );
   
   function preencher($user){
	   //if( get_the_author_meta('cod_ptr',$user_id) = ''){
		   $referrer=get_the_author_meta( 'invfr_referrer', $user->ID );		   
		   update_user_meta( $user->ID, 'cod_ptr',get_user_meta($referrer,'cod_ls',true));
		   update_user_meta( $user->ID, 'cod_cptr',get_user_meta($referrer,'cod_ptr',true));
		   update_user_meta( $user->ID, 'cod_mptr',get_user_meta($referrer,'cod_cptr',true));
	   //}
   }

//Adiciona os dados e permite a sua edição na pagina do perfil do usuario na pagina de administração   
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Codigo do Sistema</h3>

	<table class="form-table">

		<tr>
			<th><label for="cod_ls">Codigo LightSystem</label></th>

			<td>
				<input type="text" name="cod_ls" id="cod_ls" value="<?php echo esc_attr( get_the_author_meta( 'cod_ls', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Entre com o codigo LightSystem.</span>
			</td>
		</tr>
		<tr>
			<th><label for="cod_ptr">Codigo Patrocinador</label></th>

			<td>
				<input type="text" name="cod_ptr" id="cod_ptr" value="<?php echo esc_attr( get_the_author_meta( 'cod_ptr', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Entre com o codigo Patrocinador.</span>
			</td>
		</tr>
		<tr>
			<th><label for="cod_cptr">Codigo Co-Patrocinador</label></th>

			<td>
				<input type="text" name="cod_cptr" id="cod_cptr" value="<?php echo esc_attr( get_the_author_meta( 'cod_cptr', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Entre com o codigo do Co-Patrocinador.</span>
			</td>
		</tr>
		<tr>
			<th><label for="cod_mptr">Codigo Master Patrocinador</label></th>

			<td>
				<input type="text" name="cod_mptr" id="cod_mptr" value="<?php echo esc_attr( get_the_author_meta( 'cod_mptr', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Entre com o codigo do Master Patrocinador.</span>
			</td>
		</tr>

	</table>
	
<?php }
//Adiciona os dados a pagina Usuários
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );


function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'cod_ls', $_POST['cod_ls'] );
	update_user_meta( $user_id, 'cod_ptr', $_POST['cod_ptr'] );
	update_user_meta( $user_id, 'cod_cptr', $_POST['cod_cptr'] );
	update_user_meta( $user_id, 'cod_mptr', $_POST['cod_mptr'] );
}
function new_modify_user_table( $column ) {
	$column['ID'] = 'ID';
    $column['cod_ls'] = 'Cod LS';
    $column['cod_ptr'] = 'Cod Ptr';
	$column['cod_cptr'] = 'Cod Co-Ptr';
	$column['cod_mptr'] = 'Cod M Ptr';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );
function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
		case 'ID' :
            return get_the_author_meta( 'ID', $user_id );
            break;
        case 'cod_ls' :
            return get_the_author_meta( 'cod_ls', $user_id );
            break;
        case 'cod_ptr' :
            return get_the_author_meta( 'cod_ptr', $user_id );
            break;
		case 'cod_cptr':
			return get_the_author_meta( 'cod_cptr', $user_id );
			break;
		case 'cod_mptr':
			return get_the_author_meta( 'cod_mptr', $user_id );
			break;
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );
	
?>