<?php

define('NAME', 'admin');
define('PASSWORD', '123');

$name_ok = array_key_exists('name', $_POST) && ($_POST['name'] == NAME);
$password_ok = array_key_exists('password', $_POST) && ($_POST['password'] == PASSWORD);
$cookie_exist = array_key_exists('status', $_COOKIE) && ($_COOKIE['status'] == 'login');
$logoff_clique = array_key_exists('logoff_btn', $_POST) && ($_POST['logoff_btn'] == 'Log off');

function afficher_login()
{
    echo '<h2>Formulaire Login</h2>';
    echo '<form action = "#" method = "post" name="login_form">';
    echo '<label for="name" > User name: </label >';
    echo '<input type = "text" id = "name" name = "name" >';
    echo '<label for="pw" > Password: </label >';
    echo '<input type = "password" id = "pw" name = "password" >';
    echo '<input type = "submit" value = "Log in" name="login_btn">';
    echo '</form >';
}

function afficher_logoff()
{
    echo '<h2>Maintenant vous etes login !</h2>';
    echo '<form action = "#" method = "post" name="logoff_form">';
    echo '<input type = "submit" value = "Log off" name="logoff_btn">';
    echo '</form >';
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Untitled</title>
    <!--<link rel="stylesheet" href="style/main.css"/>-->
</head>
<body>
<div id="main_wrapper">
    <?php

    // 注意： 本人发现 设置或清除cookie后，需要刷新页面才能成功更新cookie的状态 ？？？？？？

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
        echo '<h3>User name or password incorrect !</h3>';
    } else {
        afficher_login();
    }
    ?>
</div>
</body>
</html>