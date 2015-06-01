<?php
require_once 'function.php';
require_once 'data.php';

echo '<div id="main">';
require_once('login_tp.php');
inscrire_panier();
echo '</div>';

$tb_java = demander_data('java', $data);

afficher_article('java', $tb_java);

