<?php
require_once 'function.php';
require_once 'data.php';

echo '<div id="main">';
require_once('login_tp.php');
inscrire_panier();
echo '</div>';

$tb_ios = demander_data('ios', $data);

afficher_article('ios', $tb_ios);

