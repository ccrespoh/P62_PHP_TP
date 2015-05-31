<?php
require_once 'function.php';
require_once 'data.php';

inscrire_panier();

$tb_ios = demander_data('ios', $data);

afficher_article('ios', $tb_ios);

