<?php
$dbhost = "localhost";
$dbname	= "sample"; // change this to be the name of your database
$dbuser	= "sample"; // change this to be your DB username
$dbpass	= "Ch33s3Tr4y"; //change this to be your password

try{
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

}catch(PDOException $err){
  echo "Database connection problem. ". $err->getMessage();
  exit();
}
?>