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
$newid = $_GET["id"];
$conn = new mysqli("localhost", "root", "", "SaschaProject");    
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   
$sql = "SELECT * FROM dateien WHERE id=? ";
$statement = $conn->prepare($sql);
$statement->bind_param("i",$newid);
$statement->execute();
$result = $statement->get_result();
if ($result !== false) {
    $row = $result->fetch_row();
    $name = $row[1];
    $user = $row[2];
    $acsess = $row[3];

    $filepath  = "uploads/".$name;
    if ($acsess != "open"){
        list($nutzer, $einglogged) = checkcookie();
        if (!isset($nutzer)){
            header("Location: index.php");
            exit();
        }
        else{
            return [$name,$user,$filepath,$acsess,$newid];
        }
    }
    else{
        return [$name,$user,$filepath,$acsess,$newid];
    }

}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>