<?php
/**
 * Plugin Name: Count Share par JM Créa
 * Plugin URI: http://www.jm-crea.com
 * Description: Intégrez des boutons de partage vers les réseaux sociaux sur vos pages et sur vos posts. Compteurs inclus.
 * Version: 1.3
 * Author: JM Créa
 * Author URI: http://www.jm-crea.com
 */
 


/* INSTALLATION DU PLUGIN */ 
include( plugin_dir_path( __FILE__ ) . 'includes/install.php');
register_activation_hook(__FILE__, 'creer_table_cs_jm_crea');
register_activation_hook(__FILE__, 'insert_table_cs_jm_crea');
include( plugin_dir_path( __FILE__ ) . 'includes/meta-box-cs.php');
include( plugin_dir_path( __FILE__ ) . 'includes/dashboard.php');


//Paramètres depuis wp-admin
function csjmc() {
	
global $wpdb;
$table_cs = $wpdb->prefix . "count_share_by_jm_crea";
$voir_cs = $wpdb->get_row("SELECT * FROM $table_cs WHERE id_cs='1'");

echo "<h1>Counter Share by JM Créa</h1>";
echo '<p>Intégrez des boutons de partage vers les réseaux sociaux et personnalisez-les. Compteurs inclus.</p>';
echo '<p>Vous pouvez faire apparaitre les boutons à n\'importe quel endroit avec le shortcode : <code>[cs_by_jm_crea]</code></p>';
echo '<p>Un problème avec le plugin ? <a href="' . admin_url() . 'admin.php?&page=csjmc&tab=param&action=reinitialiser_cs">Reinitialisez-le !</a></p>';

if (isset($_GET['action'])&&($_GET['action'] == 'maj')) {
echo '<div class="updated"><p>Paramètres mis à jour avec succès !</p></div>';		
}
if (isset($_GET['action'])&&($_GET['action'] == 'maj-ip')) {
echo '<div class="updated"><p>Ban modifié avec succès !</p></div>';		
}
if (isset($_GET['action'])&&($_GET['action'] == 'del-ip')) {
echo '<div class="updated"><p>Ban supprimé avec succès !</p></div>';		
}
if (isset($_GET['action'])&&($_GET['action'] == 'maj-param')) {
echo '<div class="updated"><p>Paramètres mis à jour avec succès !</p></div>';		
}
if (isset($_GET['action'])&&($_GET['action'] == 'reinitialiser_cs')) {
cs_sup();
creer_table_cs_jm_crea();
insert_table_cs_jm_crea();
echo '<script>document.location.href="' . admin_url() . 'admin.php?page=csjmc&tab=param&action=reinitialiser_cs_ok"</script>';	
}
if (isset($_GET['action'])&&($_GET['action'] == 'reinitialiser_cs_ok')) {
echo '<div class="updated"><p>Plugin réinitialisé avec succès !</p></div>';		
}



if (isset($_POST['maj'])) {
//$cs_compteurs = sanitize_text_field($_POST['cs_compteurs']);
$cs_compteurs = ($_POST['cs_compteurs'] == 'ON')? 'ON' : 'OFF' ;
$cs_facebook = ($_POST['cs_facebook'] == 'ON')? 'ON' : 'OFF' ;
$cs_twitter = ($_POST['cs_twitter'] == 'ON')? 'ON' : 'OFF' ;
$cs_linkedin = ($_POST['cs_linkedin'] == 'ON')? 'ON' : 'OFF' ;
$cs_googleplus = ($_POST['cs_googleplus'] == 'ON')? 'ON' : 'OFF' ;
$cs_mail = ($_POST['cs_mail'] == 'ON')? 'ON' : 'OFF' ;
$cs_pos_haut = ($_POST['cs_pos_haut'] == 'ON')? 'ON' : 'OFF' ;
$cs_pos_bas = ($_POST['cs_pos_bas'] == 'ON')? 'ON' : 'OFF' ;
$cs_pos_posts = ($_POST['cs_pos_posts'] == 'ON')? 'ON' : 'OFF' ;
$cs_pos_pages = ($_POST['cs_pos_pages'] == 'ON')? 'ON' : 'OFF' ;
$cs_pos_woo = ($_POST['cs_pos_woo'] == 'ON')? 'ON' : 'OFF' ;
$cs_rgb_facebook = sanitize_hex_color($_POST['cs_rgb_facebook']);
$cs_rgb_twitter = sanitize_hex_color($_POST['cs_rgb_twitter']);
$cs_rgb_linkedin = sanitize_hex_color($_POST['cs_rgb_linkedin']);
$cs_rgb_googleplus = sanitize_hex_color($_POST['cs_rgb_googleplus']);
$cs_rgb_mail = sanitize_hex_color($_POST['cs_rgb_mail']);
$cs_etat_txt = ($_POST['cs_etat_txt'] == 'ON')? 'ON' : 'OFF' ;
$cs_rgb_txt_facebook = sanitize_hex_color($_POST['cs_rgb_txt_facebook']);
$cs_rgb_txt_twitter = sanitize_hex_color($_POST['cs_rgb_txt_twitter']);
$cs_rgb_txt_linkedin = sanitize_hex_color($_POST['cs_rgb_txt_linkedin']);
$cs_rgb_txt_googleplus = sanitize_hex_color($_POST['cs_rgb_txt_googleplus']);
$cs_rgb_txt_mail = sanitize_hex_color($_POST['cs_rgb_txt_mail']);
$cs_radius = sanitize_text_field($_POST['cs_radius']);
$cs_id_app_facebook = sanitize_text_field($_POST['cs_id_app_facebook']);
$cs_cle_app_facebook = sanitize_text_field($_POST['cs_cle_app_facebook']); 

global $wpdb;
$table_cs = $wpdb->prefix . 'count_share_by_jm_crea';
$wpdb->query($wpdb->prepare("UPDATE $table_cs SET cs_compteurs='$cs_compteurs',cs_facebook='$cs_facebook',cs_twitter='$cs_twitter',cs_linkedin='$cs_linkedin',cs_googleplus='$cs_googleplus',cs_mail='$cs_mail',cs_pos_haut='$cs_pos_haut',cs_pos_bas='$cs_pos_bas',cs_pos_posts='$cs_pos_posts',cs_pos_pages='$cs_pos_pages',cs_pos_woo='$cs_pos_woo',cs_etat_txt='$cs_etat_txt',cs_rgb_facebook='$cs_rgb_facebook',cs_rgb_twitter='$cs_rgb_twitter',cs_rgb_linkedin='$cs_rgb_linkedin',cs_rgb_googleplus='$cs_rgb_googleplus',cs_rgb_mail='$cs_rgb_mail',cs_rgb_txt_facebook='$cs_rgb_txt_facebook',cs_rgb_txt_twitter='$cs_rgb_txt_twitter',cs_rgb_txt_linkedin='$cs_rgb_txt_linkedin',cs_rgb_txt_googleplus='$cs_rgb_txt_googleplus',cs_rgb_txt_mail='$cs_rgb_txt_mail',cs_radius='$cs_radius',cs_id_app_facebook='$cs_id_app_facebook',cs_cle_app_facebook='$cs_cle_app_facebook' WHERE id_cs='1'",APP_POST_TYPE));

echo '<script>document.location.href="' . admin_url() . 'admin.php?page=csjmc&tab=param&action=maj"</script>';		
}


echo '<div class="wrap">
<h2 class="nav-tab-wrapper">';
if ( (isset($_GET['tab']))&&($_GET['tab'] == 'param') ) {
echo '<a class="nav-tab nav-tab-active" href="' . admin_url() . 'admin.php?page=csjmc&tab=param">Paramètres</a>';
}
else {
echo '<a class="nav-tab" href="' . admin_url() . 'admin.php?page=csjmc&tab=param">Paramètres</a>';
}
if ( (isset($_GET['tab']))&&($_GET['tab'] == 'facebook') ) {
echo '<a class="nav-tab nav-tab-active" href="' . admin_url() . 'admin.php?page=csjmc&tab=facebook">Compteur Facebook</a>';
}
else {
echo '<a class="nav-tab" href="' . admin_url() . 'admin.php?page=csjmc&tab=facebook">Compteur Facebook</a>';	
}

if ( (isset($_GET['tab']))&&($_GET['tab'] == 'autres_plugins') ) {
echo '<a class="nav-tab nav-tab-active" href="' . admin_url() . 'admin.php?page=csjmc&tab=autres_plugins">Mes autres plugins</a>';
}
else {
echo '<a class="nav-tab" href="' . admin_url() . 'admin.php?page=csjmc&tab=autres_plugins">Mes autres plugins</a>';	
}
echo '</h2></div>';

if ( (isset($_GET['tab']))&&($_GET['tab'] == 'param') ) {
include( plugin_dir_path( __FILE__ ) . 'includes/tab-param.php');
}
if ( (isset($_GET['tab']))&&($_GET['tab'] == 'autres_plugins') ) {
include( plugin_dir_path( __FILE__ ) . 'includes/tab-autres-plugins.php');	
}
if ( (isset($_GET['tab']))&&($_GET['tab'] == 'facebook') ) {
include( plugin_dir_path( __FILE__ ) . 'includes/tab-compteur-facebook.php');	
}
if (!isset($_GET['tab'])) {
echo '<script>document.location.href="' . admin_url() . 'admin.php?page=csjmc&tab=param"</script>';
}
}

include( plugin_dir_path( __FILE__ ) . 'includes/fonctions.php');

add_action( 'wp_enqueue_scripts', 'cs_fa_by_jm_crea' );
function cs_fa_by_jm_crea() {
wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
}


function head_meta_cs_jm_crea() {
echo("<meta name='Count Share By JM Créa' content='1.3' />\n");
}
add_action('wp_head', 'head_meta_cs_jm_crea');
?>