<?php

$info_client = array(
    'info' => array(
        'username' => 'admin',
        'password' => '123',
        'nom' => 'Couillard',
        'prenom' => 'Philippe',
        'email' => 'abc@abc.com',
        'adress' => 'Montreal',
        'tel' => '514',
        'cart_credit' => '12345'),
    'cours_choisi' => array(
        'hadoop' => 84,
        'linux' => 84,)
);

session_start();
var_dump($_COOKIE);

$tb_info = array();

//juger s'il faut utiliser informations de base donnees ou de $_SESSION
if (array_key_exists('status', $_COOKIE) && ($_COOKIE['status'] == 'login')) {
    $tb_info = $info_client;
    var_dump('cookie');
} elseif (!array_key_exists('cours_choisi', $_SESSION)) {
    $_SESSION['cours_choisi']= array();

    var_dump('session vide');
    var_dump($_SESSION['cours_choisi']);

} else {
    $tb_info = $_SESSION;
    var_dump('session existe deja');
}

if (array_key_exists('action', $_GET) && ($_GET['action'] == 'add')) {
    $tb_info['cours_choisi'][$_GET['name']] = $_GET['prix'];
    //  header('Location:' . $_SERVER['PHP_SELF']."?page={$_GET['page']}");

}
if (array_key_exists('action', $_GET) && ($_GET['action'] == 'remove')) {
    unset($tb_info['cours_choisi'][$_GET['name']]);  // utiliser 'key' unique (soit nom de cours) pour ne pas repeter

}


?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style/main.css"/>
</head>
<body>
<div id="wrapper">
    <?php
    require_once 'header.php';
    require_once 'catalog.php';
    require_once 'footer.php';
    ?>
</div>
</body>
</html>
