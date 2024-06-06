<?php
require_once("functionen.php");
list($nutzer,$eingelogged) = checkcookie();
if (isset($nutzer) or $_POST["back"]){
    $newurl = backtobase();
    header($newurl);
}


if (isset($_POST["user"]) and isset($_POST["pass"]) == $_POST["passconf"]){
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $original = checkinfo($user);
    if ($original){
        $neu = adduser($user,$pass);
    }
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css"href="website-button.css">    
</head>
<body>
<form method="post">
<input type="submit" name="back" class="back" value="Home">
</form>
<div>
<form method="post">   
<label for="user">Username: </label>
<input type="text" name="user" minlength="3" maxlength="16">
<label for="pass">Passwort: </label>
<input type="password" name="pass" minlength="3" maxlength="16"> 
<label for="passconf">Passwort bestätigen: </label>
<input type="password" name="passconf" minlength="3" maxlength="16"> 
<button>Fertig</button>
</form>
</div>

</body>    
</html>