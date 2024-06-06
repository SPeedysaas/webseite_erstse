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
require_once("functionen.php");

list($name,$user,$filepath,$acsess,$newid) = checkacsess();

$id = $newid;
$download = "download.php?id=".$id;
?>
<a href="index.php" class="home">Home</a>

<div class="download">
<a href="<?= $download ?>" class="hochlad">DOWNLOAD</a>
<label>Download File: <?=htmlspecialchars($name)?></label>
</div>
</body>
</html>