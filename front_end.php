<?php
require_once 'function.php';
require_once 'data.php';


$tb_front_end = demander_data('front_end', $data);

afficher_article('front_end', $tb_front_end);
