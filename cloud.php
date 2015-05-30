<?php
require_once 'function.php';
require_once 'data.php';


$tb_cloud = demander_data('cloud', $data);

afficher_article('cloud', $tb_cloud);

if (array_key_exists('action', $_GET)) {
    // $_SESSION['cours_choisi']['name'] = $_GET['name'];
    header('Location:'."http://www.google.com");
    
}
