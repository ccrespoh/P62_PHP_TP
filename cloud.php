<?php
require_once 'function.php';
require_once 'data.php';


$tb_cloud = demander_data('cloud', $data);

afficher_article('cloud', $tb_cloud);

if (array_key_exists('action', $_GET)) {
     $_SESSION['cours_choisi'][$_GET['name']]=true;  // utiliser 'key' unique (soit nom de cours) pour ne pas repeter
}
