<?php 

$DB_Hostname="localhost";
$DB_Username="root";
$DB_Password="";
$DB_Name="voting";

$connect = mysqli_connect($DB_Hostname, $DB_Username, $DB_Password, $DB_Name) or die("Connection failed.");
//Extra for testing our database is connected or not
// if ($connect) {
// 	echo "Connected!";
// }else{
// 	echo "Not Connected'!";
// }

 ?>