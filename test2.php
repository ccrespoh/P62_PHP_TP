<?php



//$d=json_encode( file_get_contents("new.txt"));
//var_dump($d);


$e=array(
    'a'=>array(
        'a.1'=>1,
        'a.2'=>2,
    ),
    'b'=>array(
        'b.1'=>1,
        'b.2'=>2,
    ),
);


$E=array(
    'a'=>array(
        'a.1'=>1,
        'a.2'=>2,
    ),
    'd'=>array(
        'a.1'=>1,
        'a.2'=>2,
    ),
    'b'=>array(
        'b.1'=>1,
        'b.2'=>2,
    ),
);

$e1=json_encode($e);
//var_dump($e2);
//写入TXT
$myfile = fopen("new.txt", "w") or die("Unable to open file!");
fwrite($myfile, $e1);
fclose($myfile);


echo file_get_contents("new.txt");

//从TXT解码出来
$e2=json_decode(file_get_contents("new.txt"),true);  // 此处的true用于强制转换成PHP格式的array
$e2['c']=array(
    'c.1'=>1,
    'c.2'=>2,
);
$e3=json_encode($E/*$e2*/);


//写入TXT
$myfile = fopen("new.txt", "w") or die("Unable to open file!");
fwrite($myfile, $e3);
fclose($myfile);
