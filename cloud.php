<?php
require_once 'function.php';
require_once 'data.php';


$tb_cloud = demander_data('cloud', $data);

afficher_article('cloud', $tb_cloud);


