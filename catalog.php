<?php

$cata = array_key_exists('page', $_GET) ? $_GET['page'] : null;

echo '<div id="main">';
require_once('login_tp.php');
inscrire_panier();
echo '</div>';

if (isset($_GET['page'])) {

    afficher_article($cata, demander_data($cata, $data));
} else {
    require_once 'homepage.php';
}

?>
