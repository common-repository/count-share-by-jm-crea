<?php
function custom_cs() {
global $wpdb;  
$table_cs = $wpdb->prefix . "count_share_by_jm_crea";
$custom_cs = $wpdb->get_row("SELECT * FROM $table_cs WHERE id_cs='1'");


if ( ($custom_cs->cs_etat_txt == 'ON')&&($custom_cs->cs_compteurs == 'ON')) {
$padding_txt = "15px";
$padding_ico = "8px";
$padding_mail = "8px";
}
if ( ($custom_cs->cs_etat_txt == 'ON')&&($custom_cs->cs_compteurs == 'OFF')) {
$padding_txt = "18px";
$padding_ico = "8px";
$padding_mail = "8px";
}
if ( ($custom_cs->cs_etat_txt == 'OFF')&&($custom_cs->cs_compteurs == 'ON')) {
$padding_txt = "18px";
$padding_ico = "8px";	
$padding_mail = "0px";
}
if ( ($custom_cs->cs_etat_txt == 'OFF')&&($custom_cs->cs_compteurs == 'OFF')) {
$padding_txt = "8px";
$padding_ico = "5px";	
$padding_mail = "5px";
}


$creer_style_cs = "
<style>
#btn_facebook {
	background-color:" . $custom_cs->cs_rgb_facebook . ";
	padding-left:15px;
	padding-right:" . $padding_txt . ";
	padding-top:6px;
	padding-bottom:6px;
	color:" . $custom_cs->cs_rgb_txt_facebook . ";
	border-radius:" . $custom_cs->cs_radius . "px;
	display:inline-block;
	margin-bottom:8px;
	margin-right:5px;
	margin-top:10px;
}
#btn_facebook a {
	color:" . $custom_cs->cs_rgb_txt_facebook . ";
	text-decoration:none;
}
.fa-facebook { padding-right:" . $padding_ico . " }
#btn_googleplus {
	background-color:" . $custom_cs->cs_rgb_googleplus . ";
	padding-left:15px;
	padding-right:" . $padding_txt . ";
	padding-top:6px;
	padding-bottom:6px;
	color:" . $custom_cs->cs_rgb_txt_googleplus . ";
	border-radius:" . $custom_cs->cs_radius . "px;
	display:inline-block;
	margin-bottom:8px;
	margin-right:5px;
	margin-top:10px;
}
#btn_googleplus a {
	color:" . $custom_cs->cs_rgb_txt_googleplus . ";
	text-decoration:none;
}
.fa-google-plus { padding-right:" . $padding_ico . " }
#btn_linkedin {
	background-color:" . $custom_cs->cs_rgb_linkedin . ";
	padding-left:15px;
	padding-right:" . $padding_txt . ";
	padding-top:6px;
	padding-bottom:6px;
	color:" . $custom_cs->cs_rgb_txt_linkedin . ";
	border-radius:" . $custom_cs->cs_radius . "px;
	display:inline-block;
	margin-bottom:8px;
	margin-right:5px;
	margin-top:10px;
}
#btn_linkedin a {
	color:" . $custom_cs->cs_rgb_txt_linkedin . ";
	text-decoration:none;
}
.fa-linkedin { padding-right:" . $padding_ico . " }
#btn_twitter {
	background-color:" . $custom_cs->cs_rgb_twitter . ";
	padding-left:15px;
	padding-right:" . $padding_txt . ";
	padding-top:6px;
	padding-bottom:6px;
	color:" . $custom_cs->cs_rgb_txt_twitter . ";
	border-radius:" . $custom_cs->cs_radius . "px;
	display:inline-block;
	margin-bottom:8px;
	margin-right:5px;
	margin-top:10px;
}
#btn_twitter a {
	color:" . $custom_cs->cs_rgb_txt_twitter . ";
	text-decoration:none;
}
.fa-twitter { padding-right:" . $padding_ico . " }
#btn_mail {
	background-color:" . $custom_cs->cs_rgb_mail . ";
	padding-left:15px;
	padding-right:" . $padding_txt . ";
	padding-top:6px;
	padding-bottom:6px;
	color:" . $custom_cs->cs_rgb_txt_mail . ";
	border-radius:" . $custom_cs->cs_radius . "px;
	display:inline-block;
	margin-bottom:8px;
	margin-right:5px;
	margin-top:10px;
}
#btn_mail a {
	color:" . $custom_cs->cs_rgb_txt_mail . ";
	text-decoration:none;
}
.fa-envelope-o { padding-right:" . $padding_mail . "; }
</style>";


//On appel les compteurs 

/* facebook */
if ( ($custom_cs->cs_id_app_facebook !== '')&&($custom_cs->cs_cle_app_facebook !== '') ) {
$fb_details = curl_init("https://graph.facebook.com/v2.7/?access_token=" . $custom_cs->cs_id_app_facebook . "|" . $custom_cs->cs_cle_app_facebook . "&id=" . get_permalink($post->ID) . "&callback=");
}
else {
$fb_details = curl_init("http://graph.facebook.com/" . get_permalink($post->ID) . "");
}
curl_setopt($fb_details, CURLOPT_RETURNTRANSFER, TRUE);
$fb_details_exec = curl_exec($fb_details);
curl_close($fb_details);
$data = json_decode($fb_details_exec);
$cs_cf = $data->share->share_count;
if (!$cs_cf) { $cs_cf = 0; }


/* google+ */
$gp = curl_init();  
curl_setopt($gp, CURLOPT_URL, "https://clients6.google.com/rpc");
curl_setopt($gp, CURLOPT_POST, 1);
curl_setopt($gp, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . get_permalink($post->ID) . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
curl_setopt($gp, CURLOPT_RETURNTRANSFER, true);
curl_setopt($gp, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
$gp_exec = curl_exec ($gp);
curl_close ($gp);
$data = json_decode($gp_exec, true);

$cs_gp = $data[0]['result']['metadata']['globalCounts']['count'];
if (!$cs_gp) { $cs_gp = 0; }


/* linkedin */
$lk=curl_init();
curl_setopt($lk, CURLOPT_URL, "https://www.linkedin.com/countserv/count/share?url=" . get_permalink($post->ID) . "&format=json");
curl_setopt($lk, CURLOPT_RETURNTRANSFER, true);
curl_setopt($lk, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
$lk_exec = curl_exec($lk);
$data = json_decode($lk_exec, true);

$cs_lk = $data['count'];
if (!$cs_lk) { $cs_lk = 0; }


/* twitter */
$tw = curl_init();
curl_setopt($tw, CURLOPT_URL, "https://cdn.api.twitter.com/1/urls/count.json?url=" . get_permalink($post->ID) . "");
curl_setopt($tw, CURLOPT_RETURNTRANSFER, true);
curl_setopt($tw, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
$tw_exec = curl_exec($tw);
$data = json_decode($tw_exec, true);

$cs_tw = $data['count'];
if (!$cs_tw) { $cs_tw = 0; }

//On créé les bouttons
if ($custom_cs->cs_facebook == 'ON') {
if ($custom_cs->cs_etat_txt == 'ON') {
$txt_facebook = 'Facebook ';	
}
else {
$txt_facebook = '';		
}
if ($custom_cs->cs_compteurs == 'ON') {
$cs_facebook = "<a href='https://www.facebook.com/sharer/sharer.php?u=" . get_permalink($post->ID) . "' id='btn_facebook' target='_blank'><i class='fa fa-facebook'></i> " . $txt_facebook . $cs_cf . "</a>";
}
else {
$cs_facebook = "<a href='https://www.facebook.com/sharer/sharer.php?u=" . get_permalink($post->ID) . "' id='btn_facebook' target='_blank'><i class='fa fa-facebook'></i> " . $txt_facebook ."</a>";	
}
}

if ($custom_cs->cs_twitter == 'ON') {
if ($custom_cs->cs_etat_txt == 'ON') {
$txt_twitter = 'Twitter ';	
}
else {
$txt_twitter = '';		
}

if ($custom_cs->cs_compteurs == 'ON') {
$cs_twitter = "<a href='https://twitter.com/home?status=" . get_permalink($post->ID) . "' id='btn_twitter' target='_blank'><i class='fa fa-twitter'></i> " . $txt_twitter . $cs_tw . "</a>";
}
else {
$cs_twitter = "<a href='https://twitter.com/home?status=" . get_permalink($post->ID) . "' id='btn_twitter' target='_blank'><i class='fa fa-twitter'></i> " . $txt_twitter. "</a>";	
}
}
if ($custom_cs->cs_googleplus == 'ON') {
if ($custom_cs->cs_etat_txt == 'ON') {
$txt_googleplus = 'Google+ ';	
}
else {
$txt_googleplus = '';		
}
if ($custom_cs->cs_compteurs == 'ON') {
$cs_googleplus = "<a href='https://plus.google.com/share?url=" . get_permalink($post->ID) . "' id='btn_googleplus' target='_blank'><i class='fa fa-google-plus'></i> " . $txt_googleplus . $cs_gp . "</a>";
}
else {
$cs_googleplus = "<a href='https://plus.google.com/share?url=" . get_permalink($post->ID) . "' id='btn_googleplus' target='_blank'><i class='fa fa-google-plus'></i> " . $txt_googleplus . "</a>";	
}
}
if ($custom_cs->cs_linkedin == 'ON') {
if ($custom_cs->cs_etat_txt == 'ON') {
$txt_linkedin = 'Linkedin ';	
}
else {
$txt_linkedin = '';		
}
if ($custom_cs->cs_compteurs == 'ON') {
$cs_linkedin = "<a href='https://www.linkedin.com/cws/share?url=" . get_permalink($post->ID) . "' id='btn_linkedin' target='_blank'><i class='fa fa-linkedin'></i> " . $txt_linkedin . $cs_lk . "</a>";
}
else {
$cs_linkedin = "<a href='https://www.linkedin.com/cws/share?url=" . get_permalink($post->ID) . "' id='btn_linkedin' target='_blank'><i class='fa fa-linkedin'></i> " . $txt_linkedin . "</a>";	
}
}
if ($custom_cs->cs_mail == 'ON') {
if ($custom_cs->cs_etat_txt == 'ON') {
$txt_mail = 'Mail ';	
}
else {
$txt_mail = '';		
}
$cs_mail = "<a href='mailto:?&subject=". get_the_title($post->ID) ."&body=Bonjour, je viens de découvrir cet article très intéressant : " . get_permalink($post->ID) . "  Dis moi ce que tu en pense.' id='btn_mail' target='_blank'><i class='fa fa-envelope-o'></i> " . $txt_mail . "</a>";
}

$btn_share_cs = $creer_style_cs . $cs_facebook . $cs_twitter . $cs_googleplus . $cs_linkedin . $cs_mail;
return $btn_share_cs;
}




function affichage_cs($content) {
global $wpdb;  
$table_cs = $wpdb->prefix . "count_share_by_jm_crea";
$afficher_cs = $wpdb->get_row("SELECT * FROM $table_cs WHERE id_cs='1'");

//custom_cs();
global $post;

//Affichage sur les pages
if ( (is_page())&&($afficher_cs->cs_pos_pages == 'ON') ) {
if ( ($afficher_cs->cs_pos_haut == 'ON')&&($afficher_cs->cs_pos_bas == 'ON') ) {
$content = custom_cs($btn_share_cs) . $content . custom_cs($btn_share_cs);
}
elseif ( ($afficher_cs->cs_pos_haut == 'ON')&&($afficher_cs->cs_pos_bas == 'OFF') ) {
$content = custom_cs($btn_share_cs) . $content;
}
elseif ( ($afficher_cs->cs_pos_haut == 'OFF')&&($afficher_cs->cs_pos_bas == 'ON') ) {
$content = $content . custom_cs($btn_share_cs);
}
}


//Affichage sur les posts
elseif ( (is_single())&&($afficher_cs->cs_pos_posts == 'ON') ) {
if ( ($afficher_cs->cs_pos_haut == 'ON')&&($afficher_cs->cs_pos_bas == 'ON') ) {
$content = custom_cs($btn_share_cs) . $content . custom_cs($btn_share_cs);
}
elseif ( ($afficher_cs->cs_pos_haut == 'ON')&&($afficher_cs->cs_pos_bas == 'OFF') ) {
$content = custom_cs($btn_share_cs) . $content;
}
elseif ( ($afficher_cs->cs_pos_haut == 'OFF')&&($afficher_cs->cs_pos_bas == 'ON') ) {
$content = $content . custom_cs($btn_share_cs);
}
}

//Affichage sur les produits woocommerce
if (function_exists('is_product')) {
if ( (is_product())&&($afficher_cs->cs_pos_woo == 'ON') ) {
if ( ($afficher_cs->cs_pos_haut == 'ON')&&($afficher_cs->cs_pos_bas == 'ON') ) {
$content = custom_cs($btn_share_cs) . $content . custom_cs($btn_share_cs);
}
elseif ( ($afficher_cs->cs_pos_haut == 'ON')&&($afficher_cs->cs_pos_bas == 'OFF') ) {
$content = custom_cs($btn_share_cs) . $content;
}
elseif ( ($afficher_cs->cs_pos_haut == 'OFF')&&($afficher_cs->cs_pos_bas == 'ON') ) {
$content = $content . custom_cs($btn_share_cs);
}
}
}
else {
$content = $content;	
}

return $content;	
}



function sc_sc($sc_shortcode) {
global $wpdb;  
$table_cs = $wpdb->prefix . "count_share_by_jm_crea";
$afficher_cs = $wpdb->get_row("SELECT * FROM $table_cs WHERE id_cs='1'");
custom_cs($btn_share_cs);
global $post;	
$sc_shortcode = custom_cs($btn_share_cs);
return $sc_shortcode;
}


function cs_sup() {
global $wpdb;  
$table_cs = $wpdb->prefix . "count_share_by_jm_crea";
$wpdb->get_row("DROP TABLE $table_cs");
}



add_shortcode( 'cs_by_jm_crea', 'sc_sc' );
add_filter( 'the_content', 'affichage_cs' );
add_action( 'the_content', 'affichage_cs' );
?>