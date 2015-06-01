<?php
require_once 'function.php';
require_once 'data.php';

echo '<div id="main">';
require_once('login_tp.php');
inscrire_panier();
echo '</div>';

$tb_front_end = demander_data('front_end', $data);

afficher_article('front_end', $tb_front_end);
