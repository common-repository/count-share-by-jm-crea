<?php
echo "<div id='cadre_blanc'>";
echo "<h2>Paramètrez vos bouttons</h2>";
echo '
<form action="" method="post" enctype="multipart/form-data" name="form1">
<table border="0" cellspacing="8" cellpadding="0">
  <tr>
    <td colspan="2"><h3>Etat des bouttons</h3></td>
  </tr>
  <tr>
    <td><strong>Facebook : </strong></td>
    <td>';
	if ($voir_cs->cs_facebook == 'ON') {
	echo '
	<input type="radio" name="cs_facebook" id="cs_facebook" value="ON" checked="checked"> Activer 
    <input type="radio" name="cs_facebook" id="cs_facebook" value="OFF"> Désactiver';
	}
	else {
	echo '
	<input type="radio" name="cs_facebook" id="cs_facebook" value="ON" > Activer 
    <input type="radio" name="cs_facebook" id="cs_facebook" value="OFF" checked="checked"> Désactiver';	
	}
	echo '
   </td>
  </tr>
  <tr>
    <td><strong>Twitter : </strong></td>
    <td>';
	if ($voir_cs->cs_twitter == 'ON') {
	echo '
	<input type="radio" name="cs_twitter" id="cs_twitter" value="ON" checked="checked"> Activer 
    <input type="radio" name="cs_twitter" id="cs_twitter" value="OFF"> Désactiver';
	}
	else {
	echo '
	<input type="radio" name="cs_twitter" id="cs_twitter" value="ON" > Activer 
    <input type="radio" name="cs_twitter" id="cs_twitter" value="OFF" checked="checked"> Désactiver';	
	}
	echo '
</td>
  </tr>
  <tr>
    <td><strong>Google + : </strong></td>
    <td>';
	if ($voir_cs->cs_googleplus == 'ON') {
	echo '
	<input type="radio" name="cs_googleplus" id="cs_googleplus" value="ON" checked="checked"> Activer 
    <input type="radio" name="cs_googleplus" id="cs_googleplus" value="OFF"> Désactiver';
	}
	else {
	echo '
	<input type="radio" name="cs_googleplus" id="cs_googleplus" value="ON" > Activer 
    <input type="radio" name="cs_googleplus" id="cs_googleplus" value="OFF" checked="checked"> Désactiver';	
	}
	echo '
	</td>
  </tr>
  <tr>
    <td><strong>Linkedin : </strong></td>
    <td>';
	if ($voir_cs->cs_linkedin == 'ON') {
	echo '
	<input type="radio" name="cs_linkedin" id="cs_linkedin" value="ON" checked="checked"> Activer 
    <input type="radio" name="cs_linkedin" id="cs_linkedin" value="OFF"> Désactiver';
	}
	else {
	echo '
	<input type="radio" name="cs_linkedin" id="cs_linkedin" value="ON" > Activer 
    <input type="radio" name="cs_linkedin" id="cs_linkedin" value="OFF" checked="checked"> Désactiver';	
	}
	echo '</td>
  </tr>
  <tr>
    <td><strong>Mail : </strong></td>
    <td>';
	if ($voir_cs->cs_mail == 'ON') {
	echo '
    <input type="radio" name="cs_mail" id="cs_mail" value="ON" checked="checked">
Activer
<input type="radio" name="cs_mail" id="cs_mail" value="OFF">
Désactiver';
	}
	else {
	echo '
<input type="radio" name="cs_mail" id="cs_mail" value="ON" >
Activer
<input type="radio" name="cs_mail" id="cs_mail" value="OFF" checked="checked">
Désactiver';	
	}
	echo '</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><h3>Paramètres  des boutons</h3></td>
  </tr>
  <tr>
    <td><strong>Facebook : </strong> <small>Par défaut : <code>#3b5998</code></small></td>
    <td><input name="cs_rgb_facebook" type="text" id="couleurs_facebook" size="10" value="' . $voir_cs->cs_rgb_facebook . '"  data-default-color="' . $voir_cs->cs_rgb_facebook . '" /> </td>
  </tr>
  <tr>
    <td><strong>Twitter :</strong> <small>Par défaut : <code>#00aced</code></small></td>
    <td><input name="cs_rgb_twitter" type="text" id="couleurs_twitter" size="10"  value="' . $voir_cs->cs_rgb_twitter . '"  data-default-color="' . $voir_cs->cs_rgb_twitter . '"> </td>
  </tr>
  <tr>
    <td><strong>Google + :</strong> <small>Par défaut : <code>#dd4b39</code></small></td>
    <td><input name="cs_rgb_googleplus" type="text" id="couleurs_googleplus" size="10" value="' . $voir_cs->cs_rgb_googleplus . '"  data-default-color="' . $voir_cs->cs_rgb_googleplus . '"> </td>
  </tr>
  <tr>
    <td><strong>Linkedin :</strong> <small>Par défaut : <code>#007bb6</code></small></td>
    <td><input name="cs_rgb_linkedin" type="text" id="couleurs_linkedin" size="10" value="' . $voir_cs->cs_rgb_linkedin . '"  data-default-color="' . $voir_cs->cs_rgb_linkedin . '"> </td>
  </tr>
  <tr>
    <td><strong>Mail :</strong> <small>Par défaut : <code>#888888</code></small></td>
    <td><input name="cs_rgb_mail" type="text" id="couleurs_mail" size="10" value="' . $voir_cs->cs_rgb_mail . '"  data-default-color="' . $voir_cs->cs_rgb_mail . '"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><h3>Paramètres des compteurs</h3></td>
  </tr>
  <tr>
    <td>Afficher les compteurs :</td>
    <td>';
	if ($voir_cs->cs_compteurs == 'ON') {
	echo '
    <input type="radio" name="cs_compteurs" id="cs_compteurs" value="ON" checked="checked">
Activer
<input type="radio" name="cs_compteurs" id="cs_compteurs" value="OFF">
Désactiver';
	}
	else {
	echo '
<input type="radio" name="cs_compteurs" id="cs_compteurs" value="ON" >
Activer
<input type="radio" name="cs_compteurs" id="cs_compteurs" value="OFF" checked="checked">
Désactiver';	
	}
	echo '</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><h3>Paramètres des textes</h3></td>
  </tr>
  <tr>
    <td><strong>Ajouter les textes aux boutons :</strong></td>
    <td>';
	if ($voir_cs->cs_etat_txt == 'ON') {
	echo '
    <input type="radio" name="cs_etat_txt" id="cs_etat_txt" value="ON" checked="checked">
Activer
<input type="radio" name="cs_etat_txt" id="cs_etat_txt" value="OFF">
Désactiver';
	}
	else {
	echo '
<input type="radio" name="cs_etat_txt" id="cs_etat_txt" value="ON" >
Activer
<input type="radio" name="cs_etat_txt" id="cs_etat_txt" value="OFF" checked="checked">
Désactiver';	
	}
	echo '</td>
  </tr>
  <tr>
    <td><strong>Facebook : </strong> <small>Par défaut : <code>#FFFFFF</code></small></td>
    <td><input name="cs_rgb_txt_facebook" type="text" id="cs_rgb_txt_facebook" size="10" value="' . $voir_cs->cs_rgb_txt_facebook . '"  data-default-color="' . $voir_cs->cs_rgb_txt_facebook . '" /> </td>
  </tr>
  <tr>
    <td><strong>Twitter :</strong> <small>Par défaut : <code>#FFFFFF</code></small></td>
    <td><input name="cs_rgb_txt_twitter" type="text" id="cs_rgb_txt_twitter" size="10" value="' . $voir_cs->cs_rgb_txt_twitter. '"  data-default-color="' . $voir_cs->cs_rgb_txt_twitter . '" /> </td>
  </tr>
  <tr>
    <td><strong>Google + :</strong> <small>Par défaut : <code>#FFFFFF</code></small></td>
    <td><input name="cs_rgb_txt_googleplus" type="text" id="cs_rgb_txt_googleplus" size="10" value="' . $voir_cs->cs_rgb_txt_googleplus . '"  data-default-color="' . $voir_cs->cs_rgb_txt_googleplus . '" /> </td>
  </tr>
  <tr>
    <td><strong>Linkedin :</strong> <small>Par défaut : <code>#FFFFFF</code></small></td>
    <td><input name="cs_rgb_txt_linkedin" type="text" id="cs_rgb_txt_linkedin" size="10" value="' . $voir_cs->cs_rgb_txt_linkedin . '"  data-default-color="' . $voir_cs->cs_rgb_txt_linkedin . '" /> </td>
  </tr>
  <tr>
    <td><strong>Mail :</strong> <small>Par défaut : <code>#FFFFFF</code></small></td>
    <td><input name="cs_rgb_txt_mail" type="text" id="cs_rgb_txt_mail" size="10" value="' . $voir_cs->cs_rgb_txt_mail . '"  data-default-color="' . $voir_cs->cs_rgb_txt_mail . '" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><h3>Radius</h3></td>
  </tr>
  <tr>
    <td><strong>Bords arrondis :</strong></td>
    <td><select name="cs_radius" id="cs_radius">
	  <option value="' . $voir_cs->cs_radius . '">' . $voir_cs->cs_radius . '</option>';
	  $i = 0;
	  $fin = 30;
	  while($i <= $fin) {
	 echo '<option value="' . $i . '">' . $i . '</option>';
	 $i++;
	  }
	 echo '</select>
	 </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><h3>Positionnement</h3></td>
  </tr>
  <tr>
    <td><strong>En haut du contenu :</strong></td>
    <td>';
	if ($voir_cs->cs_pos_haut == 'ON') {
	echo '
	<input type="radio" name="cs_pos_haut" id="cs_pos_haut" value="ON" checked="checked"> OUI
    <input type="radio" name="cs_pos_haut" id="cs_pos_haut" value="OFF"> NON';
	}
	else {
	echo '
	<input type="radio" name="cs_pos_haut" id="cs_pos_haut" value="ON" > OUI
    <input type="radio" name="cs_pos_haut" id="cs_pos_haut" value="OFF" checked="checked"> NON';	
	}
	echo '
</td>
  </tr>
  <tr>
    <td><strong>En bas du contenu :</strong></td>
    <td>';
	if ($voir_cs->cs_pos_bas == 'ON') {
	echo '
	<input type="radio" name="cs_pos_bas" id="cs_pos_bas" value="ON" checked="checked"> OUI
    <input type="radio" name="cs_pos_bas" id="cs_pos_bas" value="OFF"> NON';
	}
	else {
	echo '
	<input type="radio" name="cs_pos_bas" id="cs_pos_bas" value="ON" > OUI
    <input type="radio" name="cs_pos_bas" id="cs_pos_bas" value="OFF" checked="checked"> NON';	
	}
	echo '
</td>
  </tr>
  <tr>
    <td><strong>Sur les posts (articles) :</strong></td>
    <td>';
	if ($voir_cs->cs_pos_posts == 'ON') {
	echo '
    <input type="radio" name="cs_pos_posts" id="cs_pos_posts" value="ON" checked="checked">
OUI
<input type="radio" name="cs_pos_posts" id="cs_pos_posts" value="OFF">
NON';
	}
	else {
	echo '
<input type="radio" name="cs_pos_posts" id="cs_pos_posts" value="ON" >
OUI
<input type="radio" name="cs_pos_posts" id="cs_pos_posts" value="OFF" checked="checked">
NON';	
	}
	echo ' </td>
  </tr>
  <tr>
    <td><strong>Sur les pages :</strong></td>
    <td>';
	if ($voir_cs->cs_pos_pages == 'ON') {
	echo '
    <input type="radio" name="cs_pos_pages" id="cs_pos_pages" value="ON" checked="checked">
OUI
<input type="radio" name="cs_pos_pages" id="cs_pos_pages" value="OFF">
NON';
	}
	else {
	echo '
<input type="radio" name="cs_pos_pages" id="cs_pos_pages" value="ON" >
OUI
<input type="radio" name="cs_pos_pages" id="cs_pos_pages" value="OFF" checked="checked">
NON';	
	}
	echo ' </td>
  </tr>
  <tr>
    <td><strong>Sur les produits Woocommerce :</strong></td>
    <td>';
	if ($voir_cs->cs_pos_woo == 'ON') {
	echo '
    <input type="radio" name="cs_pos_woo" id="cs_pos_woo" value="ON" checked="checked">
OUI
<input type="radio" name="cs_pos_woo" id="cs_pos_woo" value="OFF">
NON';
	}
	else {
	echo '
<input type="radio" name="cs_pos_woo" id="cs_pos_woo" value="ON" >
OUI
<input type="radio" name="cs_pos_woo" id="cs_pos_woo" value="OFF" checked="checked">
NON';	
	}
	echo ' </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><h3>API Facebook</h3></td>
  </tr>
  <tr>
    <td><strong>ID de l\'appli :</strong></td>
    <td><input name="cs_id_app_facebook" type="password" id="cs_id_app_facebook"  value="' . $voir_cs->cs_id_app_facebook . '"  /></td>
  </tr>
  <tr>
    <td><strong>Clé de l\'appli :</strong></td>
    <td><input name="cs_cle_app_facebook" type="password" id="cs_cle_app_facebook" value="' . $voir_cs->cs_cle_app_facebook . '"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="maj" id="maj" value="Mettre à jour" class="button button-primary"></td>
  </tr>
</table>';
echo '</form>';
echo '</div>';
?>
<script type="text/javascript">
jQuery(document).ready(function($) {   
$('#couleurs_facebook').wpColorPicker();
$('#couleurs_twitter').wpColorPicker();
$('#couleurs_googleplus').wpColorPicker();
$('#couleurs_linkedin').wpColorPicker();
$('#couleurs_mail').wpColorPicker();

$('#cs_rgb_txt_facebook').wpColorPicker();
$('#cs_rgb_txt_twitter').wpColorPicker();
$('#cs_rgb_txt_googleplus').wpColorPicker();
$('#cs_rgb_txt_linkedin').wpColorPicker();
$('#cs_rgb_txt_mail').wpColorPicker();
});             
</script>
