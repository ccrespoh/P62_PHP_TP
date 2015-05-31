<?php
session_start();
if (!array_key_exists('info', $_SESSION)) {
    $_SESSION = array(
        'info' => array(),
        'cours_choisi' => array(),
    );
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
    require_once 'panier.php';
    require_once 'catalog.php';
    require_once 'footer.php';
    ?>
</div>
</body>
</html>
