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
 * @param $tb :  utiliser $tb_info pour choisir si c'est des infos de base donnee ou $_SESION
 */
function afficher_article($cata, $tb_cata, $tb)
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
        echo array_key_exists($val['name'], $tb['cours_choisi']) ? "<a class='retirer' href='?page=$cata&&action=remove&&name={$val['name']}&&prix={$val['prix']}'>Retirer</a>" : "<a href='?page=$cata&&action=add&&name={$val['name']}&&prix={$val['prix']}'>Participer</a>";
        echo '</div>';
    }
    echo '</div>';
}


/**  creer la partie d'inscription, de login, et de panier
 * @param $tb : utiliser $tb_info pour choisir si c'est des infos de base donnee ou $_SESION
 */
function inscrire_panier($tb)
{

    echo '<aside>';
    echo '<h3>Panier</h3>';
    echo '<ul id="panier">';

    if (array_key_exists('page', $_GET)) {
        foreach ($tb['cours_choisi'] as $name => $prix) {
            echo "<li>$name $prix</li><a href='?action=remove&&name=$name&&page={$_GET['page']}'><img src='images/button_x.png' alt='x'/></a>";
        }
    } else {
        foreach ($tb['cours_choisi'] as $name => $prix) {
            echo "<li>$name $prix</li><a href='?action=remove&&name=$name'><img src='images/button_x.png' alt='x'/></a>";
        }
    }
    echo '</ul>';
    echo '</aside>';
}


/**
 *    Mettre array dans fichier txt
 * @param $tb :   Array des clients
 */
function write_txt($tb)
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


/**       Trouver informations d'un client dans 'client.txt', et former un array
 * @param $username : chercher par username
 * @return mixed:  return un array de ce client
 */
function demander_info_client($username)
{
    $tb = array();
    foreach (read_txt() as $val) {
        if ($username == $val['username']) {
            $tb = $val;
            break;
        }
    }
    return $tb;
}