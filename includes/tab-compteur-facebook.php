<?php
echo '<div id="cadre_blanc">';
echo '<h2>Paramètres de l\'application Facebook</h2>';
echo '<p>Pour être sûr que les compteurs Facebook fonctionnent correctement, il est recommandé de créer une appli Facebook. C\'est gratuit et ça prend 2 minutes.</p>';
echo 'Pour ce faire, rendez-vous sur : <a href="https://developers.facebook.com/apps/" target="_blank">https://developers.facebook.com/apps/</a>, puis créez votre appli et y associant le nom de domaine : <code>' . get_site_url() . '</code>';
echo '<p>Une fois que c\'est fait, récupérez <strong>l\'ID</strong> et la <strong>clé</strong> comme l\'image ci-dessous.</p>';
echo '<img src="' . plugins_url( 'images/facebook-app.png', dirname(__FILE__) ) . '" alt="Facebook APP" />';
echo '</div>';
?>