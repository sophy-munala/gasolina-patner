<?php
try{
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "gasolina";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
	die("Database connention failed");
	}
	
}
catch(Exception $e) {

}
//$conn = mysqli_connect('localhost','root', '', 'patner');

?>