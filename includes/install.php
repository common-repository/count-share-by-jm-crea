<?php


//On créé le menu
function menu_cs_jm_crea() {
add_menu_page('Count Share', 'Count Share', 'manage_options', 'csjmc', 'csjmc', plugins_url('count-share-by-jm-crea/images/cs.png') );
}
add_action('admin_menu', 'menu_cs_jm_crea');


function creer_table_cs_jm_crea() {
	global $wpdb;
    $table_cs = $wpdb->prefix . 'count_share_by_jm_crea';
    $sql = "CREATE TABLE IF NOT EXISTS $table_cs (
      id_cs int(11) NOT NULL AUTO_INCREMENT,
	  cs_compteurs text DEFAULT NULL, 
      cs_facebook text DEFAULT NULL,
	  cs_twitter text DEFAULT NULL,
	  cs_linkedin text DEFAULT NULL,
	  cs_googleplus text DEFAULT NULL,
	  cs_mail text DEFAULT NULL,
	  cs_pos_haut text DEFAULT NULL,
	  cs_pos_bas text DEFAULT NULL,
	  cs_pos_posts text DEFAULT NULL,
	  cs_pos_pages text DEFAULT NULL,
	  cs_pos_woo text DEFAULT NULL,
	  cs_rgb_facebook text DEFAULT NULL,
	  cs_rgb_twitter text DEFAULT NULL,
	  cs_rgb_linkedin text DEFAULT NULL,
	  cs_rgb_googleplus text DEFAULT NULL,
	  cs_rgb_mail text DEFAULT NULL,
	  cs_etat_txt text DEFAULT NULL,
	  cs_rgb_txt_facebook text DEFAULT NULL,
	  cs_rgb_txt_twitter text DEFAULT NULL,
	  cs_rgb_txt_linkedin text DEFAULT NULL,
	  cs_rgb_txt_googleplus text DEFAULT NULL,
	  cs_rgb_txt_mail text DEFAULT NULL,
	  cs_radius text DEFAULT NULL,
	  cs_id_app_facebook text DEFAULT NULL,
	  cs_cle_app_facebook text DEFAULT NULL,
      UNIQUE KEY id (id_cs)
    );";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
//On insere les infos dans la table
function insert_table_cs_jm_crea() {
   global $wpdb;
   $table_cs = $wpdb->prefix . 'count_share_by_jm_crea';
   $wpdb->insert( 
        $table_cs, 
        array('cs_compteurs'=>'ON','cs_facebook'=>'ON','cs_twitter'=>'ON','cs_linkedin'=>'ON','cs_googleplus'=>'ON','cs_mail'=>'ON','cs_pos_haut'=>'ON','cs_pos_bas'=>'ON','cs_pos_posts'=>'ON','cs_pos_pages'=>'ON','cs_pos_woo'=>'ON','cs_rgb_facebook'=>'#3b5998','cs_rgb_twitter'=>'#00aced','cs_rgb_linkedin'=>'#007bb6','cs_rgb_googleplus'=>'#dd4b39','cs_rgb_mail'=>'#888888','cs_etat_txt'=>'ON','cs_rgb_txt_facebook'=>'#FFFFFF','cs_rgb_txt_twitter'=>'#FFFFFF','cs_rgb_txt_linkedin'=>'#FFFFFF','cs_rgb_txt_googleplus'=>'#FFFFFF','cs_rgb_txt_mail'=>'#FFFFFF','cs_radius'=>'3','cs_id_app_facebook'=>'','cs_cle_app_facebook'=>''), 
        array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')
		);
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 dbDelta( $sql );
}
register_activation_hook( __FILE__, 'creer_table_cs_jm_crea' );
register_activation_hook( __FILE__, 'insert_table_cs_jm_crea' );


//Appel du css
function style_cs_jm_crea() {
wp_register_style('css_cs_jm_crea', plugins_url( 'css/style.css', dirname(__FILE__) ));
wp_enqueue_style('css_cs_jm_crea');	
}
add_action( 'admin_enqueue_scripts', 'style_cs_jm_crea' );



?>