<?php

/**
 * Form de log in
 */
function afficher_login()
{
    echo '<form action = "#" method = "post" name="login_form">';
    echo '<label for="name" > User name: </label >';
    echo '<input type = "text" id = "name" name = "name" /><br/>';
    echo '<label for="pw" > Password: </label >';
    echo '<input type = "password" id = "pw" name = "password" />';
    echo '<br/>';
    echo '<input type = "submit" value = "Se connecter" name="login_btn"/>';
    echo '<br/>';
    echo '</form ><br/>';
    echo '<form action = "inscription.php" method = "post" name="inscription_form">';
    echo '<input type = "submit" value = "Créer un compte" name="inscription_btn" />';
    echo '</form ><br/>';
}

/**  Form de log off
 * @param $id :   user_id de client, pour trouver son nom et prenom dans base donnee, et les afficher
 */
function afficher_logoff($id)
{
    echo '<form action = "#" method = "post" name="logoff_form">';
    echo '<input type = "submit" value = "Log off" name="logoff_btn">';
    echo '</form >';
    echo '<h3 class="red_bold">Bonjour</h3><h3 class="red_bold">';
    echo read_txt()[$id]['prenom'] . ' ' . read_txt()[$id]['nom'] . '</h3>';
}


/**
 *  Juger s'il faut afficher formulaire de LOG-IN ou LOG-OFF
 */
function affichier_formulaire_login_logout()
{
    global $substitut_de_SESSION_id;
    echo '<div id="identification">';
    if (array_key_exists('logoff_btn', $_POST)) {
        $substitut_de_SESSION_id = null;    // utiliser ce variable qui réagit plus vite que $_SESSION
        $_SESSION['user_id'] = null;   // utiliser 'null' pour vider, ailleure on utiliser isset au lieu de array_key_exist
        $_SESSION['cours_choisi'] = array();   //utiliser array() pour vider, parce que 'null' cause probleme ailleure
        session_destroy();
        afficher_login();
    } elseif (array_key_exists('name', $_POST) && username_password_correct($_POST['name'], $_POST['password'])) {
        $user_id = username_password_correct($_POST['name'], $_POST['password']);
        afficher_logoff($user_id);
        $_SESSION['user_id'] = $user_id;
        $substitut_de_SESSION_id = $user_id;
    } elseif (isset($_SESSION['user_id'])) {
        afficher_logoff($_SESSION['user_id']);
    } elseif
    (array_key_exists('name', $_POST)) {
        afficher_login();
        echo '<p class="red_bold">User name or password incorrect !</p>';
    } else {
        afficher_login();
    }
    echo '</div>';
}
