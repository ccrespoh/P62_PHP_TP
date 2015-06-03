<?php
    require_once 'header.php';
    require_once 'function.php';
	require_once 'data.php';
    ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style/main.css"/>
    <link rel="stylesheet" href="style/formulaire.css"/>
</head>
<body>
<div id="wrapper">
    <form action="attestation.php" id="formulaire" method="post">
        <fieldset>
            <legend>Créer un compte</legend>
            <label class="left" for="user_name">Nom d'utilisateur : </label><input name="nom" id="user_name" type="text"
                                                                                    pattern="[a-zA-Z0-9]{4,8}"
                                                                                    placeholder="Entrez 4 à 8 caractàres"
                                                                                    title="chaîne de caractère de 4 à 8 caractàre"
                                                                                    required="required">
            <label class="left" for="password">Mot de passe : </label><input name="password" id="password"
                                                                              placeholder="Avec chiffre et lettre"
                                                                              title="4 à 8 caractàre" type="password"
                                                                              required="required">
            <label class="left" for="password2">Confirmer : </label><input name="password2" id="password2"
                                                                           placeholder="Confirmer mot de passe"
                                                                           title="4 à 8 caractàre" type="password"
                                                                           required="required">
            <label class="left" for="email">Adresse courriel : </label><input name="email" id="email" type="email"
                                                                              required="required">
            <label class="left" for="date">Date de naissance : </label><input id="date" type="date" required="required">

            <fieldset id="fieldset3">
                <legend >Payement :</legend>
                <label class="left" id="label_card" for="card">Carte de crédit : </label>
                <input id="card"  type="text" placeholder="Numéro de carte crédit" required="required">
                <label class="left" id="label_code" for="code">Code de sécurité : </label>
                <input id="code"  type="text" placeholder="3 chiffre" maxlength="3" value size="4" required="required">
                <label class="left" id="label_expiration" for="expire">Date d'expiration : </label><input id="expire" type="month" required="required">
            </fieldset>
            <div id="div_agree"><input id="agree" type="checkbox"><label id="label_agree" for="agree"> j'ai lu <a href="javascript:"> les modalités</a>.</label></div>
            <input id="submit" type="submit" value="Soumettre">
            <input id="reset" type="reset" value="Effacer">
        </fieldset>
    </form>
</div>
<?php
require_once 'footer.php';
?>
</body>
</html>