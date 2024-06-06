<?php 
require_once("functionen.php");
list($nutzer, $eingelogged) = checkcookie();
if (!isset($nutzer)){
    $newurl = backtobase();
    header($newurl);
}
$rows = userfiles($nutzer);
if (isset($_POST["back"])){
    $newurl = backtobase();
    header($newurl);
    
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css"href="website-button.css">
</head>    
<body>
<form method="post">
<button type="submit" name="back" class="back">Home</button>
</form>
<label class="listeweb">Du, <?= $nutzer ?>, hast diese Dateien Hochgeladen: </label>

<table>
<tr>
<th scope="row">Datei-Name</th>    
<th scope="row">Datei-ID</th>
<th scope="row">Datei-Link</th>
</tr>
<?php
foreach ($rows as $row){
?>
<tr>
<td><?= htmlspecialchars($row["name"]) ?></td>
<td><?= $row["id"] ?></td>
<td><a href="details.php?id=<?= $row["id"] ?>">link</a></td>
</tr>
<?php
}

?>
</table>
</body>
</html>