<?php
// Cette boucle a pour but de creer aleatoirement un array
/*$data = array();
for ($i = 1; $i <= 55; $i++) {
    $data[$i] = array(
        'cata' => 'cloud',
        'name' => '',
        'prix' => rand(40, 200),
        'personnes' => rand(20, 200),
        'heures' => rand(50, 300),
    );
}*/
//var_export($data);

/*$info_client = array(
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
            'linux' => 84,),
    ),
    2 => array(
        'username' => 'minmin',
        'password' => '123',
        'nom' => 'Philippe',
        'prenom' => 'Couillard',
        'email' => 'abc@abc.com',
        'adress' => 'Montreal',
        'tel' => '514',
        'cart_credit' => '12345',
        'cours_choisi' => array(
            'hadoop' => 84,
            'linux' => 84,),
    ),
);*/

$data = array(
    1 => array(
        'cata' => 'cloud',
        'name' => 'docker',
        'prix' => 188,
        'personnes' => 172,
        'heures' => 90,),
    2 => array(
        'cata' => 'cloud',
        'name' => 'hadoop',
        'prix' => 84,
        'personnes' => 58,
        'heures' => 275,
    ),
    3 => array(
        'cata' => 'cloud',
        'name' => 'kvm',
        'prix' => 150,
        'personnes' => 146,
        'heures' => 89,
    ),
    4 => array(
        'cata' => 'cloud',
        'name' => 'linux',
        'prix' => 84,
        'personnes' => 185,
        'heures' => 188,
    ),
    5 => array(
        'cata' => 'cloud',
        'name' => 'openstack',
        'prix' => 156,
        'personnes' => 121,
        'heures' => 191,
    ),
    6 => array(
        'cata' => 'cloud',
        'name' => 'php',
        'prix' => 68,
        'personnes' => 89,
        'heures' => 264,
    ),
    7 => array(
        'cata' => 'cloud',
        'name' => 'postgresql',
        'prix' => 176,
        'personnes' => 94,
        'heures' => 75,
    ),
    8 => array(
        'cata' => 'cloud',
        'name' => 'spark',
        'prix' => 160,
        'personnes' => 108,
        'heures' => 202,
    ),
    9 => array(
        'cata' => 'cloud',
        'name' => 'storm',
        'prix' => 95,
        'personnes' => 80,
        'heures' => 228,
    ),
    10 => array(
        'cata' => 'cloud',
        'name' => 'tomcat',
        'prix' => 137,
        'personnes' => 36,
        'heures' => 102,
    ),
    11 => array(
        'cata' => 'front_end',
        'name' => 'bootstrap',
        'prix' => 76,
        'personnes' => 156,
        'heures' => 252,
    ),
    12 => array(
        'cata' => 'front_end',
        'name' => 'css3',
        'prix' => 114,
        'personnes' => 65,
        'heures' => 273,
    ),
    13 => array(
        'cata' => 'front_end',
        'name' => 'fusioncharts',
        'prix' => 113,
        'personnes' => 145,
        'heures' => 179,
    ),
    14 => array(
        'cata' => 'front_end',
        'name' => 'github',
        'prix' => 98,
        'personnes' => 111,
        'heures' => 298,
    ),
    15 => array(
        'cata' => 'front_end',
        'name' => 'highcharts',
        'prix' => 76,
        'personnes' => 21,
        'heures' => 284,
    ),
    16 => array(
        'cata' => 'front_end',
        'name' => 'html5',
        'prix' => 192,
        'personnes' => 39,
        'heures' => 94,
    ),
    17 => array(
        'cata' => 'front_end',
        'name' => 'javascript',
        'prix' => 72,
        'personnes' => 140,
        'heures' => 145,
    ),
    18 => array(
        'cata' => 'front_end',
        'name' => 'ajax',
        'prix' => 154,
        'personnes' => 70,
        'heures' => 232,
    ),
    19 => array(
        'cata' => 'front_end',
        'name' => 'jquery',
        'prix' => 161,
        'personnes' => 193,
        'heures' => 209,
    ),
    20 => array(
        'cata' => 'front_end',
        'name' => 'mysql',
        'prix' => 78,
        'personnes' => 103,
        'heures' => 238,
    ),
    21 => array(
        'cata' => 'ios',
        'name' => 'afnetworking',
        'prix' => 78,
        'personnes' => 161,
        'heures' => 102,
    ),
    22 => array(
        'cata' => 'ios',
        'name' => 'asihttprequest',
        'prix' => 111,
        'personnes' => 121,
        'heures' => 164,
    ),
    23 => array(
        'cata' => 'ios',
        'name' => 'box2d',
        'prix' => 75,
        'personnes' => 178,
        'heures' => 193,
    ),
    24 => array(
        'cata' => 'ios',
        'name' => 'cocos2d',
        'prix' => 178,
        'personnes' => 59,
        'heures' => 149,
    ),
    25 => array(
        'cata' => 'ios',
        'name' => 'fmdatabase',
        'prix' => 158,
        'personnes' => 34,
        'heures' => 153,
    ),
    26 => array(
        'cata' => 'ios',
        'name' => 'gdata',
        'prix' => 175,
        'personnes' => 23,
        'heures' => 227,
    ),
    27 => array(
        'cata' => 'ios',
        'name' => 'json',
        'prix' => 125,
        'personnes' => 120,
        'heures' => 274,
    ),
    28 => array(
        'cata' => 'ios',
        'name' => 'mbprogresshud',
        'prix' => 176,
        'personnes' => 161,
        'heures' => 147,
    ),
    29 => array(
        'cata' => 'ios',
        'name' => 'MBProgressHUDl',
        'prix' => 93,
        'personnes' => 34,
        'heures' => 274,
    ),
    30 => array(
        'cata' => 'ios',
        'name' => 'opengles',
        'prix' => 149,
        'personnes' => 164,
        'heures' => 178,
    ),
    31 => array(
        'cata' => 'ios',
        'name' => 'sdweb',
        'prix' => 53,
        'personnes' => 69,
        'heures' => 116,
    ),
    32 => array(
        'cata' => 'ios',
        'name' => 'three20',
        'prix' => 157,
        'personnes' => 32,
        'heures' => 178,
    ),
    33 => array(
        'cata' => 'ios',
        'name' => 'unity3d',
        'prix' => 71,
        'personnes' => 169,
        'heures' => 66,
    ),
    34 => array(
        'cata' => 'java',
        'name' => 'activiti',
        'prix' => 78,
        'personnes' => 121,
        'heures' => 150,
    ),
    35 => array(
        'cata' => 'java',
        'name' => 'ant',
        'prix' => 167,
        'personnes' => 165,
        'heures' => 259,
    ),
    36 => array(
        'cata' => 'java',
        'name' => 'extjs',
        'prix' => 127,
        'personnes' => 105,
        'heures' => 61,
    ),
    37 => array(
        'cata' => 'java',
        'name' => 'jbpm',
        'prix' => 197,
        'personnes' => 172,
        'heures' => 257,
    ),
    38 => array(
        'cata' => 'java',
        'name' => 'maven',
        'prix' => 89,
        'personnes' => 104,
        'heures' => 151,
    ),
    39 => array(
        'cata' => 'java',
        'name' => 'model_view_controller',
        'prix' => 50,
        'personnes' => 99,
        'heures' => 115,
    ),
    40 => array(
        'cata' => 'java',
        'name' => 'mybatis',
        'prix' => 170,
        'personnes' => 184,
        'heures' => 244,
    ),
    41 => array(
        'cata' => 'java',
        'name' => 'oracle',
        'prix' => 174,
        'personnes' => 49,
        'heures' => 196,
    ),
    42 => array(
        'cata' => 'java',
        'name' => 'python',
        'prix' => 66,
        'personnes' => 49,
        'heures' => 63,
    ),
    43 => array(
        'cata' => 'java',
        'name' => 'spring_mvc',
        'prix' => 168,
        'personnes' => 192,
        'heures' => 226,
    ),
    44 => array(
        'cata' => 'java',
        'name' => 'spring_security',
        'prix' => 132,
        'personnes' => 161,
        'heures' => 295,
    ),
    45 => array(
        'cata' => 'java',
        'name' => 'spring4',
        'prix' => 108,
        'personnes' => 77,
        'heures' => 111,
    ),
    46 => array(
        'cata' => 'java',
        'name' => 'struts',
        'prix' => 134,
        'personnes' => 166,
        'heures' => 145,
    ),
);

