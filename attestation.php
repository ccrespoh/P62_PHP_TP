<?php
var_dump(($_POST));
$nom=array_key_exists('nom',$_POST) ? $_POST['nom'] : null;
$password=array_key_exists('password',$_POST) ? $_POST['password'] : null;
$email=array_key_exists('email',$_POST) ? $_POST['email'] : null;
$area=array_key_exists('area',$_POST) ? $_POST['area'] : null;
$course=array_key_exists('course',$_POST) ? $_POST['course'] : null;
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>script de reception</title>
</head>
<body>
<?php
if (isset($nom) && isset($email) && isset($area)&& isset($course)){
    echo "<h1>Reception d'Incription Employe</h1>";
    echo "Le utilisateur $nom, avec l'email: $email, est inscript dans le cours $course, dans le domaine $area;
}else{
    echo "Donnees de formulaire invalidees";
}
?>
</body>
</html>