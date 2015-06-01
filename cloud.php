<?php
require_once 'function.php';
require_once 'data.php';

echo '<div id="main">';
require_once('login_tp.php');
inscrire_panier();
echo '</div>';


$tb_cloud = demander_data('cloud', $data);

afficher_article('cloud', $tb_cloud);


//var_dump($_SESSION);
