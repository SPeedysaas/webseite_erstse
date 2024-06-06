<?php 
require_once("functionen.php");
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css"href="website-button.css">
</head>
<body>
<form>

<?php

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
    if ($acses != "open"){
        list($nutzer, $einglogged) = checkcookie();
        if (!isset($nutzer)){
            header("Location: index.php");
        }
    }

    
    
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;

}  
$conn->close();

?>
<a href="index.php" class="home">Home</a>

<div class="download">
<a href="<?= htmlspecialchars($filepath) ?>" class="hochlad">DOWNLOAD</a>
<label>Download File: <?=htmlspecialchars($name)?></label>
</div>
</body>
</html>