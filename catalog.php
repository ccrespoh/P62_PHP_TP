<?php
require_once 'function.php';
require_once 'data.php';
$menu = array_key_exists('page', $_GET) ? $_GET['page'] : null;
switch ($menu) {
    case 'cloud':
        echo '<div id="main">';
        require_once('login_tp.php');
        inscrire_panier($tb_info);
        echo '</div>';
        $tb_cloud = demander_data('cloud', $data);
        afficher_article('cloud', $tb_cloud,$tb_info);
        break;
    case 'front_end':
        echo '<div id="main">';
        require_once('login_tp.php');
        inscrire_panier($tb_info);
        echo '</div>';
        $tb_front_end = demander_data('front_end', $data);
        afficher_article('front_end', $tb_front_end,$tb_info);
        break;
    case 'ios':
        echo '<div id="main">';
        require_once('login_tp.php');
        inscrire_panier($tb_info);
        echo '</div>';
        $tb_ios = demander_data('ios', $data);
        afficher_article('ios', $tb_ios,$tb_info);
        break;
    case 'java':
        echo '<div id="main">';
        require_once('login_tp.php');
        inscrire_panier($tb_info);
        echo '</div>';
        $tb_java = demander_data('java', $data);
        afficher_article('java', $tb_java,$tb_info);
        break;
    default:
        require_once 'homepage.php';
}
?>
