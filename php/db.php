<?php
$host = "localhost";
$user = "root"; // Default XAMPP user
$pass = ""; // Default XAMPP password (empty)
$dbname = "helpinghands";
try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
echo "connection failed:" . $e->getMessage();
}
?>
