<?php
    require_once 'header.php';
    require_once 'function.php';
	require_once 'data.php';
    require_once 'footer.php';
    ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style/main.css"/>
</head>
<body>
<div id="wrapper">
    <h3>Inscription</h3>
<form name="formulaire" method="post" action="attestation.php">
    <label for="nom">User:</label>
    <input type="text" name="nom"/>
    <label for="password">Password:</label>
    <input type="password" name="password"/>
    <label for="email">Email:</label>
    <input type="email" name="email"/>
    <label for="area">Section:</label>
    <input  name="area" list="area"/>
        <datalist id="area">   
    <?php
    foreach($data as $cata=>$area){
        echo"<option >$area</option>"; //OPTIONS ARE: CLOUD, FRONT END, IOS, JAVA
    }
    ?>
</datalist>
    <!--<select name="area">
        <option>Cloud</option>
        <option>Front End</option>
        <option>IOS</option>
        <option>Java</option>
    </select>-->
    <label for="course">Course:</label>
    <select name="course">
    <?php
        ?>
        $tb_cloud = demander_data('cloud', $data);
		echo "<option>afficher_article($tb_cloud);</option>
        <?php
    </select>
    <div><input type="submit" value="envoyer"/></div>
</form>

</div>
</body>
</html>