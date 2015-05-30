<?php
require_once 'function.php';
require_once 'data.php';


$tb_java = demander_data('java', $data);

afficher_article('java', $tb_java);
