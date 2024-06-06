<?php 
function checkuser($user, $pass) {


    if (isset($_COOKIE["username"]) and $_COOKIE["password"]){
        $eingelogged = true;
    }
    else{
        $eingelogged = false;

    }
    if (isset($_COOKIE["username"]) and $_COOKIE["password"]){
        $nutzer = $_COOKIE["username"];
    }

    $connuser = new mysqli("localhost", "root", "", "SaschaProject");
    if ($connuser->connect_error) {
        die("Connection failed: " . $connuser->connect_error);
    }   
    $sql = "SELECT EXISTS(SELECT * FROM user WHERE username = '$user' AND password = '$pass')";
    $resultuser = $connuser->query($sql);
    
    
    if ($resultuser !== false){
        $exsist = $resultuser->fetch_column();
        if($exsist == 1){
            $valuepass = $pass;
            $valueuser = $user;
            $nutzer = $valueuser;

            setcookie("password", $valuepass);
            setcookie("username", $valueuser);
            $eingelogged = true;
            return $valuepass and $valueuser and $nutzer and $eingelogged;
    
    }
    else{
        echo ("Eingabe ungültig");
}
}
else {
echo "Error: " . $sql . "<br>" . $connuser->error;

}
}
function logout(){
    
    setcookie("username", "");
    setcookie("password", "");
    $eingelogged = false;
    return $eingelogged;

} 





?>