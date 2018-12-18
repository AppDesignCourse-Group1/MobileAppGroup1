<?php
session_start();
include "connection.php";

$date = $_POST['choosedate'];
$email = $_SESSION['semail'];


$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

//Check connection
if ($conn->connect_error){
	die("Connection failed:" . $conn->connect_error);
}

$sql = "INSERT INTO APP_CUSTOMER (first_name,last_name,email,phone,address,city,password)
	VALUES ('$fname','$lname','$email','$phone','$address','$city','$shalpassword')";
$sql = "INSERT INTO APP_SUPPLIER_AVAILABILITY (available_date,supplier_email) VALUES ('$date','$email')";

if(!mysqli_query($conn,$sql)){
	echo 'Not Inserted';
}
else{
	
	echo "<p style=\"margin-top:20px;font-weight:bold;font-size:12px;\"> $date Added</p>";

}


?>