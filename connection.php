<?php
// $servername   = "localhost";
// $database = "pawdb";
// $username = "root";
// $password = "";

// Create connection
// $conn = new mysqli($servername, $username, $password, $database);
// Check connection
// if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
// }
//   echo "Connected successfully";


$db_name="pawdb";
$servername = "localhost";
$username = "root";
$password = "";

try {
  $db = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} 
catch(PDOException $e)
 {
  echo( "Connection failed: ") . $e->getMessage();
}
?>