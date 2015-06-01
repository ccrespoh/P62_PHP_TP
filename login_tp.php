
<?php

$name_ok = array_key_exists('name', $_POST) && ($_POST['name'] == 'admin');
$password_ok = array_key_exists('password', $_POST) && ($_POST['password'] == 123);
$cookie_exist = array_key_exists('status', $_COOKIE) && ($_COOKIE['status'] == 'login');
$logoff_clique = array_key_exists('logoff_btn', $_POST) && ($_POST['logoff_btn'] == 'Log off');

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
	echo  'Bonjour '.$_POST['name'];
    echo '<form action = "#" method = "post" name="logoff_form">';
    echo '<input type = "submit" value = "Log off" name="logoff_btn">';
    echo '</form >';
}

?>

    <?php
    echo '<div id="identification">';
    if ($logoff_clique) {
        setcookie('status', null);
        afficher_login();
    } elseif ($name_ok && $password_ok) {
        setcookie('status', 'login',time()+3600*24);
        afficher_logoff();
    } elseif ($cookie_exist) {
        afficher_logoff();
    } elseif (array_key_exists('name', $_POST) || array_key_exists('password', $_POST)) {
        afficher_login();
        echo '<p>User name or password incorrect !</p>';
    } else {
        afficher_login();
    }
    echo '</div>';
    ?>
