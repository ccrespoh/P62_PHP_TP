<?php
session_start();
if (!array_key_exists('cours_choisi', $_SESSION)) {
    $_SESSION = array(
        'cours_choisi' => array(),
    );
}

if (array_key_exists('action', $_GET) && ($_GET['action'] == 'add')) {
    $_SESSION['cours_choisi'][$_GET['name']] = $_GET['prix'];
    //  header('Location:' . $_SERVER['PHP_SELF']."?page={$_GET['page']}");

}
if (array_key_exists('action', $_GET) && ($_GET['action'] == 'remove')) {
    unset($_SESSION['cours_choisi'][$_GET['name']]);  // utiliser 'key' unique (soit nom de cours) pour ne pas repeter

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
