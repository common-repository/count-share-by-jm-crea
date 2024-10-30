<?php
//Appel du css
function style3_cs_jm_crea() {
wp_register_style('style3_cs_jm_crea', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
wp_enqueue_style('style3_cs_jm_crea');	
}
add_action( 'admin_enqueue_scripts', 'style3_cs_jm_crea' );


function custom_dashboard_cs() {
global $wpdb;  
$table_cs = $wpdb->prefix . "count_share_by_jm_crea";
$custom_cs = $wpdb->get_row("SELECT * FROM $table_cs WHERE id_cs='1'");


$padding_txt = "8px";
$padding_ico = "8px";

$creer_style_cs = "
<style>
#btn_facebook {
	background-color:" . $custom_cs->cs_rgb_facebook . ";
	padding-left:5px;
	padding-right:" . $padding_txt . ";
	padding-top:6px;
	padding-bottom:6px;
	color:" . $custom_cs->cs_rgb_txt_facebook . ";
	border-radius:" . $custom_cs->cs_radius . "px;
	display:inline-block;
	margin-bottom:3px;
	margin-right:3px;
	margin-top:0px;
}
#btn_facebook a {
	color:" . $custom_cs->cs_rgb_txt_facebook . ";
	text-decoration:none;
}
.fa-facebook { padding-right:" . $padding_ico . " }
#btn_googleplus {
	background-color:" . $custom_cs->cs_rgb_googleplus . ";
	padding-left:5px;
	padding-right:" . $padding_txt . ";
	padding-top:6px;
	padding-bottom:6px;
	color:" . $custom_cs->cs_rgb_txt_googleplus . ";
	border-radius:" . $custom_cs->cs_radius . "px;
	display:inline-block;
	margin-bottom:3px;
	margin-right:3px;
	margin-top:0px;
}
#btn_googleplus a {
	color:" . $custom_cs->cs_rgb_txt_googleplus . ";
	text-decoration:none;
}
.fa-google-plus { padding-right:" . $padding_ico . " }
#btn_linkedin {
	background-color:" . $custom_cs->cs_rgb_linkedin . ";
	padding-left:5px;
	padding-right:" . $padding_txt . ";
	padding-top:6px;
	padding-bottom:6px;
	color:" . $custom_cs->cs_rgb_txt_linkedin . ";
	border-radius:" . $custom_cs->cs_radius . "px;
	display:inline-block;
	margin-bottom:3px;
	margin-right:3px;
	margin-top:0px;
}
#btn_linkedin a {
	color:" . $custom_cs->cs_rgb_txt_linkedin . ";
	text-decoration:none;
}
.fa-linkedin { padding-right:" . $padding_ico . " }
#btn_twitter {
	background-color:" . $custom_cs->cs_rgb_twitter . ";
	padding-left:5px;
	padding-right:" . $padding_txt . ";
	padding-top:6px;
	padding-bottom:6px;
	color:" . $custom_cs->cs_rgb_txt_twitter . ";
	border-radius:" . $custom_cs->cs_radius . "px;
	display:inline-block;
	margin-bottom:3px;
	margin-right:3px;
	margin-top:0px;
}
#btn_twitter a {
	color:" . $custom_cs->cs_rgb_txt_twitter . ";
	text-decoration:none;
}
.fa-twitter { padding-right:" . $padding_ico . " }
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


$cs_facebook = "<div id='btn_facebook'><i class='fa fa-facebook'></i> " . $cs_cf . "</div>";
$cs_twitter = "<div id='btn_twitter'><i class='fa fa-twitter'></i> " . $cs_tw . "</div>";
$cs_googleplus = "<div id='btn_googleplus'><i class='fa fa-google-plus'></i> " . $cs_gp . "</div>";
$cs_linkedin = "<div id='btn_linkedin'><i class='fa fa-linkedin'></i> " . $cs_lk . "</div>";


$btn_share_cs = $creer_style_cs . $cs_facebook . $cs_twitter . $cs_googleplus . $cs_linkedin ;
echo $btn_share_cs;  
}


function dashboard_cs_jmcrea_posts( $post, $callback_args ) {
?>
<table cellpadding="8">
<?php
$recentPosts = new WP_Query();
$recentPosts->query('showposts=5');
?>
<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
<tr >
<td><?php the_post_thumbnail( array(50,50) ); ?> </td> <td> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><br><small><?php the_date();?></small></td> <td><?php custom_dashboard_cs(); ?>
</tr>
<?php endwhile; ?>
</table>	
<?php

}


function dashboard_cs_jm_crea() {
wp_add_dashboard_widget('dashboard_widget', 'Les derniers articles', 'dashboard_cs_jmcrea_posts');
}

add_action('wp_dashboard_setup', 'dashboard_cs_jm_crea' );
?>