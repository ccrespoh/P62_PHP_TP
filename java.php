<?php
require_once 'function.php';
require_once 'data.php';

inscrire_panier();

$tb_java = demander_data('java', $data);

afficher_article('java', $tb_java);

