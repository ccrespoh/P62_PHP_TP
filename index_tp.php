<?php

require_once 'data.php';
require_once 'function.php';

session_start();

if (!array_key_exists('cours_choisi', $_SESSION)) {
    $_SESSION['cours_choisi'] = array();
}

/**
 * Si est loged-in, merge information:
 * ( les cours choisi dans session avant loged-in) et ( les cours existent deja dans le base donnee de son compte)
 */
$tb_cours_merged = array();
$new_info_client = read_txt();
if (isset($_SESSION['user_id'])) {   // Si est loged-in ( $_SESSION['user_id'] est declaré)
    $tb_cours_merged = read_txt()[$_SESSION['user_id']]['cours_choisi'];
    foreach ($_SESSION['cours_choisi'] as $name => $prix) {
        $tb_cours_merged[$name] = $prix;
    }
    $new_info_client[$_SESSION['user_id']]['cours_choisi'] = $tb_cours_merged;
    write_txt($new_info_client);   // Merge les donnees et ecrire dans .txt
}

// Lors de cliquer 'Participer', choisir dans quel array ajouter le cours
if (array_key_exists('action', $_GET) && ($_GET['action'] == 'add')) {
    if (isset($_SESSION['user_id'])) {   // Si est loged-in ( $_SESSION['user_id'] est declaré)
        $tb_cours_merged[$_GET['name']] = $_GET['prix'];   // utiliser 'key' unique (soit nom de cours) pour ne pas repeter
        $_SESSION['cours_choisi'] = $tb_cours_merged;     // Ajouter le cours dans $_SESSION
        $new_info_client[$_SESSION['user_id']]['cours_choisi'] = $tb_cours_merged;
        write_txt($new_info_client);  // En meme temps, ajouter le cours dans fichier txt
    } else {
        $_SESSION['cours_choisi'][$_GET['name']] = $_GET['prix'];
    }
}

// Lors de cliquer 'Retirer', choisir de quel array retirer le cours
if (array_key_exists('action', $_GET) && ($_GET['action'] == 'remove')) {
    if (isset($_SESSION['user_id'])) {    // Si est loged-in ( $_SESSION['user_id'] est declaré)
        unset($tb_cours_merged[$_GET['name']]);
        $_SESSION['cours_choisi'] = $tb_cours_merged;  // Retirer le cours de $_SESSION
        $new_info_client[$_SESSION['user_id']]['cours_choisi'] = $tb_cours_merged;
        write_txt($new_info_client);   // En meme temps, retirer le cours du fichier txt
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