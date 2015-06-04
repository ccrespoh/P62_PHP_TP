<?php

$cata = array_key_exists('page', $_GET) ? $_GET['page'] : null;

echo '<div id="main">';

affichier_formulaire_login_logout();

require_once 'exchange_DB_SESSION.php';

afficher_panier();

echo '</div>';

if (isset($_GET['page'])) {
    afficher_article($cata, demander_data($cata, $data));
} elseif (array_key_exists('checkout', $_POST)) {
    require_once 'checkout.php';
} else {
    require_once 'homepage.php';
}

?>
