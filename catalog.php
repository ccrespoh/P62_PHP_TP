<?php
$menu=array_key_exists('page',$_GET)?$_GET['page']: null;
switch($menu){
    case 'cloud':
        require_once 'cloud.php';
        break;
    case 'front_end':
        require_once 'front_end.php';
        break;
    case 'ios':
        require_once 'ios.php';
        break;
    case 'java':
        require_once 'java.php';
        break;
    default:
        require_once 'menu.php';
}
?>
