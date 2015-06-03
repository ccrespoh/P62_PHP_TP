<?php
require_once 'data.php';

$connexion = null;  // Variable de connection 'a la

function start_db() {
    global $connexion;
    $connexion = new mysqli('localhost', 'root','', 'p62_project');
    //var_dump($connexion);
    if($connexion->connect_errno){
        exit('Erreur de connexion');
    }
    return $connexion;
}

/**
 * @param $cata : nom de CATALOG qu'on veut
 * @param $tb_complet :  Nom de array dans data.php, soit $data
 * @return array
 */
function demander_data($cata, $tb_complet)
{
    $tab = array();
    foreach ($tb_complet as $val) {
        if ($val['cata'] == $cata) {
            $tab[] = $val;            // nouveau array commence par 0 (dans [ ] est vide)
        }
    }
    return $tab;
}


/**
 * @param $cata :    nom de CATALOG qu'on veut
 * @param $tb_cata :     array de data qu'on a extraire de $data
 */
function afficher_article($cata, $tb_cata)
{
    global $resultat;
    echo '<div class="article">';
    echo $cata == 'cloud' ? '<h2>Cours de Cloud Computing</h2>' : "<h2>Cours de $cata</h2>";
    foreach ($tb_cata as $val) {
        echo '<div>';
        echo "<img src=img/$cata/{$val['name']}" . ".jpg alt='{$val['name']}'> ";
        echo '<table>';
        echo '<tr>';
        echo '<td>Nom de cours</td><td>Nombre d\'heure</td><td>Nombre d\'étudiants</td><td>Prix</td>';
        echo '</tr>';
        echo '<tr>';
        echo "<th>{$val['name']}</th><th>{$val['heures']}</th><th>{$val['personnes']}</th><th>{$val['prix']} $</th>";
        echo '</tr>';
        echo '</table>';
        if (isset($_SESSION['user_id'])) {
            $array_a_choisi = $resultat[$_SESSION['user_id']]['cours_choisi'];
        }else{
            $array_a_choisi = $_SESSION['cours_choisi'];
        }
        // mise de '?page=$cata' pour s'adapter au 'switch' dans catalog.php
        echo array_key_exists($val['name'], $_SESSION['cours_choisi']) ? "<a class='retirer' href='?page=$cata&&action=remove&&name={$val['name']}&&prix={$val['prix']}'>Retirer</a>" : "<a href='?page=$cata&&action=add&&name={$val['name']}&&prix={$val['prix']}'>Participer</a>";
        echo '</div>';
    }
    echo '</div>';
}


/**  creer la partie d'inscription, de login, et de panier
 */
function inscrire_panier()
{
    global $consultation;
    echo '<aside>';
    echo '<h3>Panier</h3>';
    echo '<ul id="panier">';


    if (isset($_SESSION['user_id'])) {
        foreach ($_SESSION['cours_choisi'] as $name => $prix) {
            echo "<li>$name $prix</li><a href='?action=remove&&name=$name'><img src='images/button_x.png' alt='x'/></a>";
        }
    } elseif (array_key_exists('page', $_GET)) {
        foreach ($_SESSION['cours_choisi'] as $name => $prix) {
            echo "<li>$name $prix</li><a href='?action=remove&&name=$name&&page={$_GET['page']}'><img src='images/button_x.png' alt='x'/></a>";
        }
    } else {
        foreach ($_SESSION['cours_choisi'] as $name => $prix) {
            echo "<li>$name $prix</li><a href='?action=remove&&name=$name'><img src='images/button_x.png' alt='x'/></a>";
        }
    }
    echo '</ul>';

    $sum = 0;
    foreach ($_SESSION['cours_choisi'] as $name => $prix) {
        $sum = $prix + $sum;
    }

    echo '<h6>', 'Prix Total=', $sum, '</h6>';
    echo '<input type="button" name="checkout" value="checkout" />';
    echo '</aside>';
}
?>
<?php

//var_dump($_POST);
$name=array_key_exists('nom',$_POST) ? $_POST['nom'] : null;
$password=array_key_exists('password',$_POST) ? $_POST['password'] : null;

function user_exists($username, $password) {
    $conn = start_db();
    //var_dump($_POST);
    $name=array_key_exists('nom',$_POST) ? $_POST['nom'] : null;
    $password=array_key_exists('password',$_POST) ? $_POST['password'] : null;
    $consultation = "SELECT * FROM users WHERE `user_name`='$username' AND `password`='$password'";
    //var_dump($consultation);
    $resultat = $conn->query($consultation);
   // var_dump( $resultat) ;
    return ($resultat->num_rows > 0); // Userexists
}

