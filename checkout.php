<?php
$is_connected = (isset($_SESSION['user_id']) || isset($substitut_de_SESSION_id)) ? true : false;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Untitled</title>
    <link rel="stylesheet" href="style/main.css"/>
</head>
<body>
<div id="div_paiement">
    <?php
    echo $is_connected? '<h1 class="paiement">Page de paiement</h1><h1 class="paiement">Construction en cours...</h1>':'<h1 class="paiement">Vous n\'avez pas connecté</h1>';

    ?>

</div>
</body>
</html>