<?php
require_once 'function.php';
require_once 'data.php';
$tout_est_rempli = false;
$tout_est_rempli = array_key_exists('nom', $_POST);
$tout_est_rempli = array_key_exists('password', $_POST);
$tout_est_rempli = array_key_exists('password2', $_POST);

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>script de reception</title>
</head>
<body>
<?php

if ($tout_est_rempli) {
    $user_existe_pas = true;
    foreach (read_txt() as $index => $val) {
        //var_dump($val['username']);
        if ($_POST['nom'] == $val['username']) {
            //var_dump($_POST['nom']);
            //var_dump('dfdf',$val['username']);
            echo "<h2>User existe deja !!!</h2>";
            $user_existe_pas = false;
            break;
        }
    }
}

$password_same = true;
if (($_POST['password'] != $_POST['password2']) && $user_existe_pas) {
    echo "<h2>Mot de passe different !!!</h2>";
    $password_same = false;
};

if ($password_same && $user_existe_pas) {
    $nouveaux_info_clients = read_txt();

    $nouveaux_info_clients[] = array(
        'username' => $_POST['nom'],
        'password' => $_POST['password'],
        'cours_choisi' => array(),
    );

    write_txt($nouveaux_info_clients);

    echo "<h2>Inscript reussi !!!</h2>";
echo '<a href="index_tp.php">Retourner a page d\'accueil</a>';
//var_dump($_SERVER);
}
?>
</body>
</html>