<?php
require_once 'function.php';
require_once 'data.php';
//var_dump(demander_data('cloud', $data));

$tb_cloud = demander_data('cloud', $data);

afficher_article($tb_cloud);