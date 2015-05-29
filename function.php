<?php
/**
 * @param $cata: nom de CATALOG qu'on veut
 * @param $tb_complet:  Nom de array dans data.php  ($data)
 * @return array
 */
function demander_data($cata,$tb_complet)
{
    $tab = array();
    foreach ($tb_complet as $val) {
        if ($val['cata'] == $cata) {
            $tab[] = $val;            // nouveau array commence par 0
        }
    }
    return $tab;
}


/**
 * @param $tb_cata:   array de data qu'on a extraire
 */
function afficher_article($tb_cata)
{
    echo '<div class="article">';
    foreach ($tb_cata as $val) {
        echo "<img src=img/cloud/{$val['name']}" . ".jpg alt='{$val['name']}'> ";
        echo "prix: {$val['prix']} $";
    }

    echo '</div>';
}