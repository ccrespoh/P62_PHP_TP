<?php
require_once 'data.php';
require 'function.php';
$conn;
session_start();

if (!array_key_exists('cours_choisi', $_SESSION)) {
    $_SESSION['cours_choisi'] = array();
}

if (array_key_exists('action', $_GET) && ($_GET['action'] == 'add')) {
    if (array_key_exists('user_id', $_SESSION)) {
        $_SESSION['cours_choisi'][$_GET['name']] = $_GET['prix'];

    } else {
        $_SESSION['cours_choisi'][$_GET['name']] = $_GET['prix'];
    }
}
if (array_key_exists('action', $_GET) && ($_GET['action'] == 'remove')) {
    unset($_SESSION['cours_choisi'][$_GET['name']]);  // utiliser 'key' unique (soit nom de cours) pour ne pas repeter

}

//var_dump($_SESSION);

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
    require_once 'login_tp.php';
    require_once 'footer.php';
    ?>
</div>
</body>
</html>
