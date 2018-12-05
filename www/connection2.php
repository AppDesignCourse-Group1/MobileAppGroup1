<?php
$servername = "localhost";
$dbusername = "shiyuwu";
$dbpassword = "0109";
$dbname = "appdatabase";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, '0109');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }

//Check connection

?>