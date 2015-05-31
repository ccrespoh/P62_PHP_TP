<?php
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
        // mise de '?page=$cata' pour s'adapter au 'switch' dans catalog.php
        echo array_key_exists($val['name'], $_SESSION['cours_choisi']) ? "<a class='retirer' href='?page=$cata&&action=remove&&name={$val['name']}&&prix={$val['prix']}'>Retirer</a>" : "<a href='?page=$cata&&action=add&&name={$val['name']}&&prix={$val['prix']}'>Participer</a>";
        echo '</div>';
    }
    echo '</div>';
}


function inscrire_panier()
{

    echo "<nav><a href='?page=login' onclick='afficher_login();'><li>Sign Up</li></a><a href='inscription.php'><li>Sinscrire</li></a></nav><br/><br/>";

    if (array_key_exists('action', $_GET) && ($_GET['action'] == 'add')) {
        $_SESSION['cours_choisi'][$_GET['name']] = $_GET['prix'];
    }
    if (array_key_exists('action', $_GET) && ($_GET['action'] == 'remove')) {
        unset($_SESSION['cours_choisi'][$_GET['name']]);  // utiliser 'key' unique (soit nom de cours) pour ne pas repeter
        // header('Location:' .$_SERVER['PHP_SELF']);
        // header('Location:' . "http://localhost/P62_PHP/P62_PHP_TP/index_tp.php?page={$_GET['page']}");
    }

    echo '<aside>';
    echo '<h3>Panier</h3>';
    echo '<ul id="panier">';

    if (array_key_exists('page', $_GET)) {
        foreach ($_SESSION['cours_choisi'] as $name => $prix) {
            echo "<li>$name $prix</li><a href='?action=remove&&name=$name&&page={$_GET['page']}'><img src='images/button_x.png' alt='x'/></a>";
        }
    } else {
        foreach ($_SESSION['cours_choisi'] as $name => $prix) {
            echo "<li>$name $prix</li><a href='?action=remove&&name=$name'><img src='images/button_x.png' alt='x'/></a>";
        }
    }
    echo '</ul>';
    echo '</aside>';
}