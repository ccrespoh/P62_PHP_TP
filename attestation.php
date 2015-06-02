<?php
var_dump($_POST);
$nom=array_key_exists('nom',$_POST) ? $_POST['nom'] : null;
$password=array_key_exists('password',$_POST) ? $_POST['password'] : null;
$email=array_key_exists('email',$_POST) ? $_POST['email'] : null;

?>
<?php  //Connexion a la BD
$connexion = new mysqli('localhost', 'root','', 'p62_project');
if($connexion->connect_errno){
    echo'Erreur de connexion';
}
$sql = "INSERT INTO users (`user_name`, `password`, `email`) VALUES ('$nom', '$password', '$email')";

if ($connexion->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connexion->error;
}

$connexion->close();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>script de reception</title>
</head>
<body>
<?php
if (isset($nom) && isset($email)){
    echo "<h1>Reception d'Incription Employe</h1>";
    echo "Le utilisateur $nom, avec l'email: $email, est inscript dans le cours";
}else{
    echo "Donnees de formulaire invalidees";
}

?>
</body>
</html>