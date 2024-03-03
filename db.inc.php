<?php
$dbhost = "localhost";
$dbname	= "movies"; // change this to be the name of your database
$dbuser	= "root"; // change this to be your DB username
// $dbpass	= "Ch33s3Tr4y"; //change this to be your password
$dbpass = "guitar_man";

try{
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

}catch(PDOException $err){
  echo "Database connection problem. ". $err->getMessage();
  exit();
}
?>