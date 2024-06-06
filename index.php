<?php
    require_once(__DIR__.'/functionen.php');
    
    list($nutzer, $eingelogged) = checkcookie();
    $user = isset($_POST["username"]) ? $_POST["username"] : null;
    $pass = isset($_POST["password"]) ? $_POST["password"] : null;
    $logout = isset($_POST["logout"]) ? $_POST["logout"] : null;
    $acsess = $_POST["acsess"];


    if (isset($acsess)){
        $acsess = "open";
    }
    else{
        $acsess = "closed";
    }

    
    if (isset($logout)){
        $eingelogged = logout();

    }

    


    if (!isset($user) and $pass or $eingelogged == true);
    else{
        list($nutzer, $eingelogged) = checkuser($user, $pass);
    }   

    if (!isset($_FILES["files"]) or $_FILES["files"]["error"] !=0 or !$eingelogged){
    }
    else{
        
        
        move_uploaded_file($_FILES["files"]["tmp_name"], __DIR__."/uploads/".$_FILES["files"]["name"]);

        $read = ($_FILES["files"]["name"]);
        $usercookie = $_COOKIE["username"];


        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn = new mysqli("localhost", "root", "", "SaschaProject");    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }   
        $sql = "INSERT INTO dateien(name,username,acsess) VALUES ('$read','$usercookie','$acsess');";
        $result = $conn->query($sql);
        
        if ($result !== false) {
            $id = $conn->insert_id;

                header("Location:  details.php?id=$id");
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
        
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css"href="website-button.css">
    
</head>
<body>

<?php if (!$eingelogged) {?>


<div class="login">
<div class="unterdiv">
<a href="register.php" class="register">Du kannst dich hier regestrieren</a>

<form method="post">
<label for="username">Username: </label>
<input type="text" name="username" minlength="3" maxlength="16" />



<label for="pass">Password: </label>
<input type="password" name="password" minlength="3" maxlength="16"/>


<button>Fertig</button>
</form>
</div>
</div>

<?php } else{?>
<div class="userlogin">
<label for="nutzer">Du Bist Eingelogged: <?= htmlentities($nutzer);?></label>

<form method="post">
<input type="hidden" value="logout" name="logout">
<button>Logout</button>
<a href="liste.php" >Link zu deine Dateien</a> 
</form>

</div>
<div>

</div>
<?php }?>

<div class="buttonons">
<form method="post" enctype="multipart/form-data">
    <label for="acsess">Deine dateine oeffentlich hochladen: </label>
    <input type="checkbox" name="acsess" class="acsess">
    <input name="files" class="upload" type="file" class="datei">
    <button class="hochlad">Hochladen</button>
</form>
</div>
</body>
</html>
