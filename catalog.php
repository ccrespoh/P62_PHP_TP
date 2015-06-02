<?php
require_once 'function.php';
require_once 'data.php';
$cata = array_key_exists('page', $_GET) ? $_GET['page'] : null;

echo '<div id="main">';
require_once('login_tp.php');
inscrire_panier();
echo '</div>';

if(isset($_GET['page'])){
    /*if(isset($_SESSION['user_id'])){
       $array_a_choisi=read_txt()[$_SESSION['user_id']]['cour_choisi'];
    }else{
        $array_a_choisi=$data;
    }*/
    afficher_article($cata, demander_data($cata, $data));
}else{
    require_once 'homepage.php';
}

?>
