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
        if (isset($_SESSION['user_id']) || isset($substitut_de_SESSION_id)) {
            $array_a_choisi = read_txt()[$_SESSION['user_id']]['cours_choisi'];
        } else {
            $array_a_choisi = $_SESSION['cours_choisi'];
        }
        // mise de '?page=$cata' pour s'adapter au 'switch' dans catalog.php
        echo array_key_exists($val['name'], $array_a_choisi) ? "<a class='retirer' href='?page=$cata&&action=remove&&name={$val['name']}&&prix={$val['prix']}'>Retirer</a>" : "<a href='?page=$cata&&action=add&&name={$val['name']}&&prix={$val['prix']}'>Participer</a>";
        echo '</div>';
    }
    echo '</div>';
}


/**  Afficher le panier
 */
function afficher_panier()
{
    echo '<aside>';
    echo '<h3>Votre panier</h3>';
    //echo '<ul id="panier">';
    global $tb_cours_merged;
    /**
     *  Afficher cours choisis dans le panier
     */
    echo '<table>';
    echo count($_SESSION['cours_choisi'])>0? '<tr><th>Cours</th><th>Prix</th><th>Retirer</th></tr>':'';
    if ((isset($_SESSION['user_id']) || isset($substitut_de_SESSION_id)) && array_key_exists('page', $_GET)) {   // Si on est loged-in ( $_SESSION['user_id'] est declaré)
        foreach ($tb_cours_merged as $name => $prix) {
            echo "<tr><td>$name</td><td> $prix</td><td><a href='?action=remove&&name=$name&&page={$_GET['page']}'><img  src='images/button_x.png' alt='x'/></a></td></tr>";
        }
    } elseif (array_key_exists('page', $_GET)) {   // Si n'est pas loged-in mais il y a une requete de GET (Catalog spécifié)
        foreach ($_SESSION['cours_choisi'] as $name => $prix) {
            echo "<tr><td>$name</td><td> $prix</td><td><a href='?action=remove&&name=$name&&page={$_GET['page']}'><img  src='images/button_x.png' alt='x'/></a></td></tr>";
        }
    } else {   // Si n'est pas loged-in mais il y a une requete de GET ( Sans Catalog spécifié)
        foreach ($_SESSION['cours_choisi'] as $name => $prix) {
            echo "<tr><td>$name</td><td> $prix</td><td><a href='?action=remove&&name=$name'><img  src='images/button_x.png' alt='x'/></a></td></tr>";
        }
    }
    echo '</table>';

    /**
     *  Calculer prix total
     */
    $sum = 0;
    foreach ($_SESSION['cours_choisi'] as $name => $prix) {
        $sum = $prix + $sum;
    }
  echo '<h3><span class="red_bold">',count($_SESSION['cours_choisi']),' ','</span>cours choisis</h3>';
    echo '<h3 >', 'Prix total: <span class="red_bold">', $sum,' ','</span>$</h3>';
    echo '<form id="checkout" action="#" method="post"><input type="submit"  name="checkout" value="checkout" /></form>';
    echo '</aside>';
}


/**
 *    Sauvegarder array dans fichier txt
 * @param $tb :   Array des clients
 */
function write_txt($tb)    // 此处 用 file_put_contents 更方便
{
    $tb_client = fopen("client.txt", "w") or die("Unable to open file!");
    fwrite($tb_client, json_encode($tb));
    fclose($tb_client);
}


/**   Lire array dans fichier txt
 * @return mixed:  Sorti de array
 */
function read_txt()
{
    $tb = json_decode(file_get_contents("client.txt"), true);  // 此处的true用于强制转换成PHP格式的array
    return $tb;
}


/**  juger si username et password dans ( $_POST ) correspondent a base de donnee
 * @param $username
 * @param $password
 * @return bool|int|string:   Si oui, renvoyer indice de array. Si non, renvoyer boolean false.
 */
function username_password_correct($username, $password)
{
    $id = false;
    foreach (read_txt() as $index => $val) {
        if (($username == $val['username']) && ($val['password'] == $password)) {
            $id = $index;
            break;
        }
    }
    return $id;
}