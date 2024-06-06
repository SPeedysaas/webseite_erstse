<?php
require_once ("functionen.php");

list($name,$user,$filepath,$acsess,$newid) = checkacsess();
// check if the filename is set
$filename = $filepath;
// check if file is in the directory or on the server
if (file_exists($filename)) {
    // download the file from the server
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$name");
    header("Content-Length: " . filesize( $filename) );
    header("Cache-Control: must-revalidate");
    readfile( $filename );
    exit;
}
?>
