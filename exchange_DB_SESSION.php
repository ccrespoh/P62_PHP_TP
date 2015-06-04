<?php
/**
 * Si est loged-in, merge informations suivantes:
 * ( les cours choisi dans session avant loged-in) et ( les cours existent deja dans le base donnee de son compte)
 */

$tb_cours_merged = array();
$new_info_client = read_txt();
if (isset($_SESSION['user_id']) || isset($substitut_de_SESSION_id)) {   // Si est loged-in ( $_SESSION['user_id'] est declaré)
    $tb_cours_merged = read_txt()[$_SESSION['user_id']]['cours_choisi'];
    foreach ($_SESSION['cours_choisi'] as $name => $prix) {
        $tb_cours_merged[$name] = $prix;
    }
    $new_info_client[$_SESSION['user_id']]['cours_choisi'] = $tb_cours_merged;
    write_txt($new_info_client);   // Merge les donnees et ecrire dans fichier txt
    $_SESSION['cours_choisi'] = $tb_cours_merged;
}


// Lors de cliquer 'Participer', choisir dans quel array ajouter le cours
if (array_key_exists('action', $_GET) && ($_GET['action'] == 'add')) {
    if (isset($_SESSION['user_id']) || isset($substitut_de_SESSION_id)) {   // Si est loged-in ( Si $_SESSION['user_id'] est declaré)
        $tb_cours_merged[$_GET['name']] = $_GET['prix'];   //  Array $tb_cours_merged est deja rempli par les codes en haut
        $_SESSION['cours_choisi']=$tb_cours_merged/*[$_GET['name']] = $_GET['prix']*/;     // Ajouter le cours dans $_SESSION
        $new_info_client[$_SESSION['user_id']]['cours_choisi'] = $tb_cours_merged;
        write_txt($new_info_client);  // En meme temps, ajouter le cours dans fichier txt
    } else {
        $_SESSION['cours_choisi'][$_GET['name']] = $_GET['prix'];
        header('Location:' . $_SERVER['PHP_SELF'] . "?page={$_GET['page']}");
    }
}

// Lors de cliquer 'Retirer', choisir de quel array retirer le cours
if (array_key_exists('action', $_GET) && ($_GET['action'] == 'remove')) {
    if (isset($_SESSION['user_id']) || isset($substitut_de_SESSION_id)) {    // Si est loged-in ( $_SESSION['user_id'] est declaré)
        unset($tb_cours_merged[$_GET['name']]);
        unset($_SESSION['cours_choisi'][$_GET['name']]) /*= $tb_cours_merged*/;  // Retirer le cours de $_SESSION
        $new_info_client[$_SESSION['user_id']]['cours_choisi'] = $tb_cours_merged;
        write_txt($new_info_client);   // En meme temps, retirer le cours du fichier txt
    } else {
        unset($_SESSION['cours_choisi'][$_GET['name']]);  // utiliser 'key' unique (soit nom de cours) pour ne pas repeter
    }
}
