<?php
session_start();
$is_connected = (isset($_SESSION['user_id']) || isset($substitut_de_SESSION_id)) ? true : false;
//var_dump('dfdf',$is_connected);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Untitled</title>
    <link rel="stylesheet" href="style/main.css"/>
</head>
<body>
<div id=wrapper>
    <?php
    require_once 'header.php';
    echo '<div id="div_paiement">';

    echo $is_connected ? '<h1 class="paiement">Page de paiement</h1>' : '<h1 class="paiement">Vous n\'avez pas connecté</h1>';

   // require_once 'footer.php';

    ?>

</div>
</div>
</body>
</html>