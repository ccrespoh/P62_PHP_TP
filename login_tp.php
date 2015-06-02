<?php
require_once 'function.php';

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

function afficher_logoff()
{
    echo '<form action = "#" method = "post" name="logoff_form">';
    echo '<input type = "submit" value = "Log off" name="logoff_btn">';
    echo '</form >';
    echo '<h2 class="red_bold">Bonjour</h2><h2 class="red_bold">';
    echo array_key_exists('username', $_SESSION)? $_SESSION['username'] . '</h2>':$_POST['name'].'</h2>';
}


echo '<div id="identification">';

if (array_key_exists('logoff_btn', $_POST)) {
    session_destroy();
    afficher_login();
} elseif (array_key_exists('name', $_POST) && username_password_correct($_POST['name'], $_POST['password'])) {
    afficher_logoff();
    $_SESSION['username'] = $_POST['name'];
} elseif (array_key_exists('username', $_SESSION)){
    afficher_logoff();
} elseif
(array_key_exists('name', $_POST)) {
    afficher_login();
    echo '<p class="red_bold">User name or password incorrect !</p>';
} else {
    afficher_login();
}
echo '</div>';

