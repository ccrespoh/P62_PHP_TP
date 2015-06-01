<?php

require_once 'function.php';


$info_client = array(
    1 => array(
        'username' => 'admin',
        'password' => '123',
        'nom' => 'Couillard',
        'prenom' => 'Philippe',
        'email' => 'abc@abc.com',
        'adress' => 'Montreal',
        'tel' => '514',
        'cart_credit' => '12345',
        'cours_choisi' => array(
            'hadoop' => 84,
            'linux' => 84,)
    ),);


var_dump(demander_info_client('admin'));