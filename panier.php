<?php
session_start();
if (!array_key_exists('info', $_SESSION)) {
    $_SESSION = array(
        'info' => array(),
        'cours_choisi' => array(),
    );
}
echo "<nav><a href='?page=login' onclick='afficher_login();'><li>Sign Up</li></a><a href='inscription.php'><li>Sinscrire</li></a></nav><br/><br/>";
if (array_key_exists('action', $_GET) && ($_GET['action']=='add')) {
    $_SESSION['cours_choisi'][$_GET['name']] = true;  // utiliser 'key' unique (soit nom de cours) pour ne pas repeter
    header('Location:' . 'http://localhost/P62_PHP/P62_PHP_TP/index_tp.php?page=cloud');
}
?>
<aside>
<h3>Panier</h3>
<ul>
<?php foreach ($_SESSION['cours_choisi'] as $name=>$val){ echo "<li>$name</li><a href='?action=remove'><img src='images/button_x.png' alt='x'/></a>";}?>
</ul>
</aside>



