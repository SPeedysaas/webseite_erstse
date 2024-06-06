<?php 
function checkcookie(){
    if (isset($_COOKIE["username"]) and $_COOKIE["password"]){
        $eingelogged = true;
        $nutzer = $_COOKIE["username"];
    }
    else{
        $eingelogged = false;
        $nutzer = null;

}
return [$nutzer, $eingelogged];
}


function checkuser($user, $pass) {


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
            return [$nutzer, $eingelogged];
    
    }
    else{
    
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
function userfiles($nutzer){
    $connuser = new mysqli("localhost", "root", "", "SaschaProject");
    if ($connuser->connect_error) {
        die("Connection failed: " . $connuser->connect_error);
    }   
    $sql = "SELECT * FROM dateien WHERE username = '$nutzer' AND name <> ''";
    $resultuser = $connuser->query($sql);
    if ($resultuser !== false){
    
    $rows = $resultuser->fetch_all(MYSQLI_ASSOC);

    return $rows;
    }
    else {
    echo "Error: " . $sql . "<br>" . $connuser->error;
    
    }

}
function backtobase(){
    $url = $_SERVER['REQUEST_URI'];
    if (str_contains($url, "uploads")){
        $newurl = "Location: /index.php"; 
    }
    else{
        $newurl = "Location: index.php";
    }
    return $newurl;
    

}
function checkinfo($user){
    $connuser = new mysqli("localhost", "root", "", "SaschaProject");
    if ($connuser->connect_error) {
        die("Connection failed: " . $connuser->connect_error);
    }   

    $stmt = $connuser->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $original = false;
    } else {
        $original = true; 
    }

    return $original;
}
function adduser($user,$pass){
    $connuser = new mysqli("localhost", "root", "", "SaschaProject");
    if ($connuser->connect_error) {
        die("Connection failed: " . $connuser->connect_error);
    }   
    $sql = "INSERT INTO user(username,password) VALUES('$user','$pass')";
    $resultuser = $connuser->query($sql);
    if ($resultuser !== false){
    setcookie("username", $user);
    setcookie("password", $pass);
    header("Location: index.php");
    
    }
    else {
    echo "Error: " . $sql . "<br>" . $connuser->error;
    
    }

}
function checkacsess(){
    

}





?>