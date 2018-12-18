<?php
$servername = "localhost";
$dbusername = "websysF181";
$dbpassword = "websysF181!!";
$dbname = "websysF181";

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

//if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";

echo "<a href=\"index-customer.html\" rel=\"external\">";
echo "<p>Go to Homepage</p>";
echo "</a>";

?>


