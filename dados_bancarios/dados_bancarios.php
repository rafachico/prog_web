<?php
   /*
   Plugin Name: Dados Bancarios
   Plugin URI: https://github.com/rafachico/
   description: Caso a anuidade esteja no carrinho adiciona o campo de dados Bancarios ao pedido.
   Version: 1.0
   Author: Rafael
   Author URI: https://github.com/rafachico/
   License: GPL2
   */
   //add_action( 'woocommerce_after_checkout_billing_form', 'bbloomer_add_acu_no_if_online_course' );
 
function bbloomer_add_acu_no_if_online_course( $checkout ) {
 
// see if user has a previously saved Acupuncture #
 
$current_user = wp_get_current_user();
$saved_banco = $current_user->banco;
$saved_banc = $current_user->banc;
$saved_agen = $current_user->agen;
$saved_dagen = $current_user->dagen;
$saved_cc = $current_user->cc;
$saved_dcc = $current_user->dcc;
$saved_nt = $current_user->nt;
$saved_ct = $current_user->ct;

 
// echo field only if bloomer_check_product_category() is true
 
if( bloomer_check_product_category() ){ 
echo '<div id="bloomer_check_product_category"><h2>Dados Bancarios</h2>';
echo '<div id="nt">';  
woocommerce_form_field( 'nt', array(        
'type'          => 'text',        
'class'         => array('nt form-row-wide'),        
'label'         => __('Nome do titular da conta'),        
'placeholder'   => __('Digite o nome do titular da conta'),        
'required'   => true,        
'default'   => $saved_nt,        ), 
$checkout->get_value( 'nt' )); 
echo '</div>';
echo '<div id="ct">';  
woocommerce_form_field( 'ct', array(        
'type'          => 'number',        
'class'         => array('ct form-row-wide'),        
'label'         => __('CPF do titular da conta'),        
'placeholder'   => __('Digite o CPF do titular da conta'),        
'required'   => true,        
'default'   => $saved_ct,        ), 
$checkout->get_value( 'ct' )); 
echo '</div>';
echo '<div id="banco">';  
woocommerce_form_field( 'banco', array(        
'type'          => 'select',        
'class'         => array('banco form-row-wide'),        
'label'         => __('Nome do Banco'),               
'required'   => true,
'options'     => array(
                      '246 – Banco ABC Brasil S.A.' => __('246 – Banco ABC Brasil S.A.'),
                      '025 – Banco Alfa S.A.' => __('025 – Banco Alfa S.A.'),
					  '641 – Banco Alvorada S.A.' => __('641 – Banco Alvorada S.A.'),
                      '029 – Banco Banerj S.A.' => __('029 – Banco Banerj S.A.'),
					  '038 – Banco Banestado S.A.' => __('038 – Banco Banestado S.A.'),
                      '000 – Banco Bankpar S.A.' => __('000 – Banco Bankpar S.A.'),
					  '740 – Banco Barclays S.A.' => __('740 – Banco Barclays S.A.'),
                      '107 – Banco BBM S.A.' => __('107 – Banco BBM S.A.'),
					  '031 – Banco Beg S.A.' => __('031 – Banco Beg S.A.'),
                      '096 – Banco BM&F de Serviços de Liquidação e Custódia S.A' => __('096 – Banco BM&F de Serviços de Liquidação e Custódia S.A'),
					  '318 – Banco BMG S.A.' => __('318 – Banco BMG S.A.'),
                      '752 – Banco BNP Paribas Brasil S.A.' => __('752 – Banco BNP Paribas Brasil S.A.'),
					  '248 – Banco Boavista Interatlântico S.A.' => __('248 – Banco Boavista Interatlântico S.A.'),
					  '237 – Banco Bradesco S.A.' => __('237 – Banco Bradesco S.A.'),
                      '036 – Banco Bradesco BBI S.A.' => __('036 – Banco Bradesco BBI S.A.'),
					  '204 – Banco Bradesco Cartões S.A.' => __('204 – Banco Bradesco Cartões S.A.'),
                      '225 – Banco Brascan S.A.' => __('225 – Banco Brascan S.A.'),
					  '044 – Banco BVA S.A.' => __('044 – Banco BVA S.A.'),
                      '263 – Banco Cacique S.A.' => __('263 – Banco Cacique S.A.'),
					  '473 – Banco Caixa Geral – Brasil S.A.' => __('473 – Banco Caixa Geral – Brasil S.A.'),
                      '222 – Banco Calyon Brasil S.A.' => __('222 – Banco Calyon Brasil S.A.'),
					  '040 – Banco Cargill S.A.' => __('040 – Banco Cargill S.A.'),
                      'M08 – Banco Citicard S.A.' => __('M08 – Banco Citicard S.A.'),
					  'M19 – Banco CNH Capital S.A.' => __('M19 – Banco CNH Capital S.A.'),
                      '215 – Banco Comercial e de Investimento Sudameris S.A.' => __('215 – Banco Comercial e de Investimento Sudameris S.A.'),
					  '756 – Banco Cooperativo do Brasil S.A. – BANCOOB' => __('756 – Banco Cooperativo do Brasil S.A. – BANCOOB'),
                      '748 – Banco Cooperativo Sicredi S.A.' => __('748 – Banco Cooperativo Sicredi S.A.'),
					  '505 – Banco Credit Suisse (Brasil) S.A.' => __('505 – Banco Credit Suisse (Brasil) S.A.'),
                      '229 – Banco Cruzeiro do Sul S.A.' => __('229 – Banco Cruzeiro do Sul S.A.'),
					  '003 – Banco da Amazônia S.A.' => __('003 – Banco da Amazônia S.A.'),
                      '083-3 – Banco da China Brasil S.A.' => __('083-3 – Banco da China Brasil S.A.'),
					  '707 – Banco Daycoval S.A.' => __('707 – Banco Daycoval S.A.'),
                      'M06 – Banco de Lage Landen Brasil S.A.' => __('M06 – Banco de Lage Landen Brasil S.A.'),
					  '024 – Banco de Pernambuco S.A. – BANDEPE' => __('024 – Banco de Pernambuco S.A. – BANDEPE'),
                      '456 – Banco de Tokyo-Mitsubishi UFJ Brasil S.A.' => __('456 – Banco de Tokyo-Mitsubishi UFJ Brasil S.A.'),
					  '214 – Banco Dibens S.A.' => __('214 – Banco Dibens S.A.'),
					  '001 – Banco do Brasil S.A.' => __('001 – Banco do Brasil S.A.'),
                      '047 – Banco do Estado de Sergipe S.A.' => __('047 – Banco do Estado de Sergipe S.A.'),
					  '037 – Banco do Estado do Pará S.A.' => __('037 – Banco do Estado do Pará S.A.'),
                      '041 – Banco do Estado do Rio Grande do Sul S.A.' => __('041 – Banco do Estado do Rio Grande do Sul S.A.'),
					  '004 – Banco do Nordeste do Brasil S.A.' => __('004 – Banco do Nordeste do Brasil S.A.'),
                      '265 – Banco Fator S.A.' => __('265 – Banco Fator S.A.'),
					  'M03 – Banco Fiat S.A.' => __('M03 – Banco Fiat S.A.'),
                      '224 – Banco Fibra S.A.' => __('224 – Banco Fibra S.A.'),
					  '626 – Banco Ficsa S.A.' => __('626 – Banco Ficsa S.A.'),
                      '394 – Banco Finasa BMC S.A.' => __('394 – Banco Finasa BMC S.A.'),
					  'M18 – Banco Ford S.A.' => __('M18 – Banco Ford S.A.'),
                      '233 – Banco GE Capital S.A.' => __('233 – Banco GE Capital S.A.'),
					  '734 – Banco Gerdau S.A.' => __('734 – Banco Gerdau S.A.'),
                      'M07 – Banco GMAC S.A.' => __('M07 – Banco GMAC S.A.'),
					  '612 – Banco Guanabara S.A.' => __('612 – Banco Guanabara S.A.'),
                      'M22 – Banco Honda S.A.' => __('M22 – Banco Honda S.A.'),
					  '063 – Banco Ibi S.A. Banco Múltiplo' => __('063 – Banco Ibi S.A. Banco Múltiplo'),
                      'M11 – Banco IBM S.A.' => __('M11 – Banco IBM S.A.'),
					  '604 – Banco Industrial do Brasil S.A.' => __('604 – Banco Industrial do Brasil S.A.'),
                      '320 – Banco Industrial e Comercial S.A.' => __('320 – Banco Industrial e Comercial S.A.'),
					  '653 – Banco Indusval S.A.' => __('653 – Banco Indusval S.A.'),
                      '630 – Banco Intercap S.A.' => __('630 – Banco Intercap S.A.'),
					  '249 – Banco Investcred Unibanco S.A.' => __('249 – Banco Investcred Unibanco S.A.'),
					  '077 – Banco Inter' => __('077 – Banco Inter'),
                      '184 – Banco Itaú BBA S.A.' => __('184 – Banco Itaú BBA S.A.'),
					  '479 – Banco ItaúBank S.A' => __('479 – Banco ItaúBank S.A'),
                      'M09 – Banco Itaucred Financiamentos S.A.' => __('M09 – Banco Itaucred Financiamentos S.A.'),
					  '376 – Banco J. P. Morgan S.A.' => __('376 – Banco J. P. Morgan S.A.'),
                      '074 – Banco J. Safra S.A.' => __('074 – Banco J. Safra S.A.'),
					  '217 – Banco John Deere S.A.' => __('217 – Banco John Deere S.A.'),
                      '065 – Banco Lemon S.A.' => __('065 – Banco Lemon S.A.'),
					  '600 – Banco Luso Brasileiro S.A.' => __('600 – Banco Luso Brasileiro S.A.'),
                      '755 – Banco Merrill Lynch de Investimentos S.A.' => __('755 – Banco Merrill Lynch de Investimentos S.A.'),
					  '746 – Banco Modal S.A.' => __('746 – Banco Modal S.A.'),
					  '735 – Banco Neon' => __('735 – Banco Neon'),
                      '151 – Banco Nossa Caixa S.A.' => __('151 – Banco Nossa Caixa S.A.'),
					  '045 – Banco Opportunity S.A.' => __('045 – Banco Opportunity S.A.'),
					  '212 – BANCO ORIGINAL S.A.' => __('212 – BANCO ORIGINAL S.A.'),
                      '623 – Banco Panamericano S.A.' => __('623 – Banco Panamericano S.A.'),
					  '611 – Banco Paulista S.A.' => __('611 – Banco Paulista S.A.'),
                      '643 – Banco Pine S.A.' => __('643 – Banco Pine S.A.'),
					  '638 – Banco Prosper S.A.' => __('638 – Banco Prosper S.A.'),
                      '747 – Banco Rabobank International Brasil S.A.' => __('747 – Banco Rabobank International Brasil S.A.'),
					  'M16 – Banco Rodobens S.A.' => __('M16 – Banco Rodobens S.A.'),
                      '072 – Banco Rural Mais S.A.' => __('072 – Banco Rural Mais S.A.'),
					  '033 – Banco Santander (Brasil) S.A.' => __('033 – Banco Santander (Brasil) S.A.'),
					  '250 – Banco Schahin S.A.' => __('250 – Banco Schahin S.A.'),
                      '749 – Banco Simples S.A.' => __('749 – Banco Simples S.A.'),
					  '366 – Banco Société Générale Brasil S.A.' => __('366 – Banco Société Générale Brasil S.A.'),
                      '637 – Banco Sofisa S.A.' => __('637 – Banco Sofisa S.A.'),
					  '464 – Banco Sumitomo Mitsui Brasileiro S.A.' => __('464 – Banco Sumitomo Mitsui Brasileiro S.A.'),
                      '082-5 – Banco Topázio S.A.' => __('082-5 – Banco Topázio S.A.'),
					  'M20 – Banco Toyota do Brasil S.A.' => __('M20 – Banco Toyota do Brasil S.A.'),
                      '634 – Banco Triângulo S.A.' => __('634 – Banco Triângulo S.A.'),
					  '208 – Banco UBS Pactual S.A.' => __('208 – Banco UBS Pactual S.A.'),
                      'M14 – Banco Volkswagen S.A.' => __('M14 – Banco Volkswagen S.A.'),
					  '655 – Banco Votorantim S.A.' => __('655 – Banco Votorantim S.A.'),
                      '610 – Banco VR S.A.' => __('610 – Banco VR S.A.'),
					  '370 – Banco WestLB do Brasil S.A.' => __('370 – Banco WestLB do Brasil S.A.'),
                      '021 – BANESTES S.A. Banco do Estado do Espírito Santo' => __('021 – BANESTES S.A. Banco do Estado do Espírito Santo'),
					  '719 – Banif-Banco Internacional do Funchal (Brasil)S.A.' => __('719 – Banif-Banco Internacional do Funchal (Brasil)S.A.'),
                      '073 – BB Banco Popular do Brasil S.A.' => __('073 – BB Banco Popular do Brasil S.A.'),
					  '078 – BES Investimento do Brasil S.A.-Banco de Investimento' => __('078 – BES Investimento do Brasil S.A.-Banco de Investimento'),
                      '069 – BPN Brasil Banco Múltiplo S.A.' => __('069 – BPN Brasil Banco Múltiplo S.A.'),
					  '070 – BRB – Banco de Brasília S.A.' => __('070 – BRB – Banco de Brasília S.A.'),
					  '104 – Caixa Econômica Federal' => __('104 – Caixa Econômica Federal'),
                      '477 – Citibank N.A.' => __('477 – Citibank N.A.'),
					  '081-7 – Concórdia Banco S.A.' => __('081-7 – Concórdia Banco S.A.'),
                      '487 – Deutsche Bank S.A. – Banco Alemão' => __('487 – Deutsche Bank S.A. – Banco Alemão'),
					  '751 – Dresdner Bank Brasil S.A. – Banco Múltiplo' => __('751 – Dresdner Bank Brasil S.A. – Banco Múltiplo'),
                      '062 – Hipercard Banco Múltiplo S.A.' => __('062 – Hipercard Banco Múltiplo S.A.'),
					  '399 – HSBC Bank Brasil S.A. - Banco Múltiplo' => __('399 – HSBC Bank Brasil S.A. - Banco Múltiplo'),
					  '168 – HSBC Finance (Brasil) S.A. - Banco Múltiplo' => __('168 – HSBC Finance (Brasil) S.A. - Banco Múltiplo'),
					  '492 – ING Bank N.V.' => __('492 – ING Bank N.V.'),
					  '341 – Itaú Unibanco S.A.' => __('341 – Itaú Unibanco S.A.'),
                      '488 – JPMorgan Chase Bank' => __('488 – JPMorgan Chase Bank'),
					  '260 – Nubank' => __('260 – Nubank'),
					  '409 – UNIBANCO – União de Bancos Brasileiros S.A.' => __('409 – UNIBANCO – União de Bancos Brasileiros S.A.'),
                      '230 – Unicard Banco Múltiplo S.A' => __('230 – Unicard Banco Múltiplo S.A')
					  
    ),        
'default'   => $saved_banco,        ), 
$checkout->get_value( 'banco' )); 
echo '</div>';
/*
echo '<div id="banc">';  
woocommerce_form_field( 'banc', array(        
'type'          => 'text',        
'class'         => array('banc form-row-wide'),        
'label'         => __('Nome do Banco'),        
'placeholder'   => __('Digite o nome do seu banco'),        
'required'   => true,        
'default'   => $saved_banc,        ), 
$checkout->get_value( 'banc' )); 
echo '</div>';
*/
echo '<div id="agen">';  
woocommerce_form_field( 'agen', array(        
'type'          => 'number',        
'class'         => array('agen form-row-wide'),        
'label'         => __('Número da Agência'),        
'placeholder'   => __('Digite o número da sua agencia'),        
'required'   => true,        
'default'   => $saved_agen,        ), 
$checkout->get_value( 'agen' )); 
echo '</div>';

echo '<div id="dagen">';  
woocommerce_form_field( 'dagen', array(        
'type'          => 'number',        
'class'         => array('agen form-row-wide'),        
'label'         => __('Dígito da Agência(para "x" coloque 0)'),        
'placeholder'   => __('Digite o dígito da sua agencia'),        
'required'   => false,        
'default'   => $saved_dagen,        ), 
$checkout->get_value( 'dagen' )); 
echo '</div>';

echo '<div id="cc">';  
woocommerce_form_field( 'cc', array(        
'type'          => 'number',        
'class'         => array('cc form-row-wide'),        
'label'         => __('Número da Conta Corrente'),        
'placeholder'   => __('Digite o número da sua conta corrente'),        
'required'   => true,        
'default'   => $saved_cc,        ), 
$checkout->get_value( 'cc' )); 
echo '</div>';

echo '<div id="dcc">';  
woocommerce_form_field( 'dcc', array(        
'type'          => 'number',        
'class'         => array('dcc form-row-wide'),        
'label'         => __('Dígito da Conta Corrente(para "x" coloque 0)'),        
'placeholder'   => __('Digite o dígito da sua conta corrente'),        
'required'   => false,        
'default'   => $saved_dcc,        ), 
$checkout->get_value( 'dcc' )); 
echo '</div>';
}
 
}
 
// Function that returns true/false if category is in the cart
// Is called by function bbloomer_add_acu_no_if_online_course()
 
function bloomer_check_product_category(){    
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {        
$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );          
if( bbloomer_is_category_17_in_cart( $product_id ) ){            
return  true;               
}    
}   
return false;
}
 
// Function that specifies category ID for bloomer_check_product_category()
// Is called by function bloomer_check_product_category()
 
function bbloomer_is_category_17_in_cart( $product_id ){
// ID 18 = online courses
return has_term( 17, 'product_cat', get_post( $product_id ) );
}
add_action( 'show_user_profile', 'campos_dados_banc' );
add_action( 'edit_user_profile', 'campos_dados_banc' );

/*add_action('woocommerce_checkout_process', 'bbloomer_validate_new_checkout_field');
 
function bbloomer_validate_new_checkout_field() {    
 
if ( ! $_POST['banc'] )        
wc_add_notice( __( 'Por favor digite o nome do seu banco' ), 'error' );

if ( ! $_POST['agen'] )        
wc_add_notice( __( 'Por favor digite o numero da sua agencia' ), 'error' );

if ( ! $_POST['cc'] )        
wc_add_notice( __( 'Por favor digite o numero da sua conta corrente' ), 'error' );

}*/
// Save Field Into User Meta
 
//add_action( 'woocommerce_checkout_update_user_meta', 'bbloomer_checkout_field_update_user_meta' );
 
function bbloomer_checkout_field_update_user_meta( $user_id ) { 
if ( $user_id && $_POST['nt'] ) update_user_meta( $user_id, 'nt', sanitize_text_field($_POST['nt']) );
if ( $user_id && $_POST['ct'] ) update_user_meta( $user_id, 'ct', sanitize_text_field($_POST['ct']) );
if ( $user_id && $_POST['banco'] ) update_user_meta( $user_id, 'banco', sanitize_text_field($_POST['banco']) );
if ( $user_id && $_POST['banc'] ) update_user_meta( $user_id, 'banc', sanitize_text_field($_POST['banc']) );
if ( $user_id && $_POST['agen'] ) update_user_meta( $user_id, 'agen', sanitize_text_field($_POST['agen']) );
if ( $user_id && $_POST['dagen'] ) update_user_meta( $user_id, 'dagen', sanitize_text_field($_POST['dagen']) );
if ( $user_id && $_POST['cc'] ) update_user_meta( $user_id, 'cc', sanitize_text_field($_POST['cc']) );
if ( $user_id && $_POST['dcc'] ) update_user_meta( $user_id, 'dcc', sanitize_text_field($_POST['dcc']) );
}

function campos_dados_banc( $user ) { ?>

	<h3>Dados Bancarios</h3>

	<table class="form-table">
	
		<tr>
			<th><label for="nt">Nome do Titular</label></th>

			<td>
				<input type="text" name="nt" id="nt" value="<?php echo esc_attr( get_the_author_meta( 'nt', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Nome do Titular.</span>
			</td>
		</tr>
		<tr>
			<th><label for="nt">CPF do Titular</label></th>

			<td>
				<input type="text" name="ct" id="ct" value="<?php echo esc_attr( get_the_author_meta( 'ct', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">CPF do Titular.</span>
			</td>
		</tr>	
		<tr>
			<th><label for="banc">Nome do Banco</label></th>

			<td>
				<input type="text" name="banco" id="banco" value="<?php echo esc_attr( get_the_author_meta( 'banco', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Nome do Banco.</span>
			</td>
		</tr>
		<tr>
			<th><label for="banc">Nome do Banco(campo depreciado)</label></th>

			<td>
				<input type="text" name="banc" id="banc" value="<?php echo esc_attr( get_the_author_meta( 'banc', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Nome do Banco(campo depreciado).</span>
			</td>
		</tr>
		<tr>
			<th><label for="agen">Agencia</label></th>

			<td>
				<input type="text" name="agen" id="agen" value="<?php echo esc_attr( get_the_author_meta( 'agen', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Numero da Agencia.</span>
			</td>
		</tr>
		<tr>
			<th><label for="dagen">Digito da Agencia</label></th>

			<td>
				<input type="text" name="dagen" id="dagen" value="<?php echo esc_attr( get_the_author_meta( 'dagen', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Digito da Agencia.</span>
			</td>
		</tr>
		<tr>
			<th><label for="cc">Conta corrente</label></th>

			<td>
				<input type="text" name="cc" id="cc" value="<?php echo esc_attr( get_the_author_meta( 'cc', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Numero da Conta.</span>
			</td>
		</tr>
		<tr>
			<th><label for="dcc">Digito da Conta corrente</label></th>

			<td>
				<input type="text" name="dcc" id="dc" value="<?php echo esc_attr( get_the_author_meta( 'dcc', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Digito da Conta.</span>
			</td>
		</tr>
		

	</table>
<?php }
add_action( 'personal_options_update', 'salvar_dados_banc' );
add_action( 'edit_user_profile_update', 'salvar_dados_banc' );


function salvar_dados_banc( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'banco', $_POST['banco'] );
	update_usermeta( $user_id, 'banc', $_POST['banc'] );
	update_usermeta( $user_id, 'agen', $_POST['agen'] );
	update_usermeta( $user_id, 'dagen', $_POST['dagen'] );
	update_usermeta( $user_id, 'cc', $_POST['cc'] );
	update_usermeta( $user_id, 'dcc', $_POST['dcc'] );
}
?>