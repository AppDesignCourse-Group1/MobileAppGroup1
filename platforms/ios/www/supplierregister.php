<?php
session_start();
include "connection.php";

$fname = $_POST['fnames'];
$lname = $_POST['lnames'];
$email = $_POST['emails'];
$phone = $_POST['phones'];
$service_category = $_POST['service_categorys'];
$service_desc = $_POST['service_descs'];
$hourlyrate = $_POST['hourlyrates'];
$password = $_POST['passwords'];
$shalpassword = sha1($password);

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

//Check connection
if ($conn->connect_error){
	die("Connection failed:" . $conn->connect_error);
}

if (empty($fname)){
	echo "First name can not be blank.";
	die();
}

if (empty($lname)){
	echo "Last name can not be blank.";
	die();
}

if (empty($email)){
	echo "Email can not be blank.";
	die();
}

if (empty($phone)){
	echo "Phone can not be blank.";
	die();
}

if (empty($service_category)){
	echo "Service category can not be blank.";
	die();
}

$sql = "INSERT INTO APP_SUPPLIER (first_name,last_name,email,phone,service_category,service_desc,hourly_rate,password)
	VALUES ('$fname','$lname','$email','$phone','$service_category','$service_desc','$hourlyrate','$shalpassword')";
$_SESSION['semail'] = $email;
if(!mysqli_query($conn,$sql)){
	echo 'Not Inserted';
}
else{
	echo "<hr><div style=\"padding:10px 20px;color:#fff;font-weight: normal;text-align:center;\">";
	echo "<p style=\"margin-top:40px;font-weight:bold;font-size:20px;\">Thank you for register</p>";
	echo "<a href=\"#profilesupplier\">";
	echo "<button id=\"gosupplierprofile\"><p style=\"color:#fff;font-weight:bold;font-size:20px;\">Go to Homepage</p></button>";
	echo "</a>";
	echo "</div>";
}


?>