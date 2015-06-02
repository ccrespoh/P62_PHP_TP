<?php

require_once 'data.php';
require_once 'function.php';

session_start();

if (!array_key_exists('cours_choisi', $_SESSION)) {
    $_SESSION['cours_choisi'] = array();
}

// C'est pour merge ( les cours choisi dans session avant logedin) et ( les cours existent deja dans le base donnee de son compte)
$tb_cours_merged = array();
$new_info_client = read_txt();
if (isset($_SESSION['user_id'])) {
    $tb_cours_merged = read_txt()[$_SESSION['user_id']]['cours_choisi'];
    foreach ($_SESSION['cours_choisi'] as $name => $prix) {
        $tb_cours_merged[$name] = $prix;
    }
    $new_info_client[$_SESSION['user_id']]['cours_choisi'] = $tb_cours_merged;
    write_txt($new_info_client);
}

if (array_key_exists('action', $_GET) && ($_GET['action'] == 'add')) {
    if (isset($_SESSION['user_id'])) {
        $tb_cours_merged[$_GET['name']] = $_GET['prix'];   // utiliser 'key' unique (soit nom de cours) pour ne pas repeter
        $_SESSION['cours_choisi'] = $tb_cours_merged;
        $new_info_client[$_SESSION['user_id']]['cours_choisi'] = $tb_cours_merged;
        write_txt($new_info_client);
    } else {
        $_SESSION['cours_choisi'][$_GET['name']] = $_GET['prix'];
    }
}

if (array_key_exists('action', $_GET) && ($_GET['action'] == 'remove')) {
    if (isset($_SESSION['user_id'])) {
        unset($tb_cours_merged[$_GET['name']]);
        $_SESSION['cours_choisi'] = $tb_cours_merged;
        $new_info_client[$_SESSION['user_id']]['cours_choisi'] = $tb_cours_merged;
        write_txt($new_info_client);
    } else {
        unset($_SESSION['cours_choisi'][$_GET['name']]);  // utiliser 'key' unique (soit nom de cours) pour ne pas repeter
    }
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