<?php
session_start();
include "connection.php";

$email = $_SESSION['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$city = $_POST['city'];

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

//Check connection
if ($conn->connect_error){
	die("Connection failed:" . $conn->connect_error);
}

if (!empty($fname)){
	$sql1 = "UPDATE APP_CUSTOMER SET first_name = '$fname' WHERE email = \"$email\" ";
	if(!mysqli_query($conn,$sql1)){
		echo "<div style=\"color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:12px;\"></p></div>";
}
	else{echo "<div style=\"color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:12px;\">First Name Updated</p></div>";}
}

if (!empty($lname)){
	$sql2 = "UPDATE APP_CUSTOMER SET last_name = '$lname' WHERE email = \"$email\" ";
	if(!mysqli_query($conn,$sql2)){
	echo "<div style=\"color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:12px;\"></p></div>";
}
	else{echo "<div style=\"color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:12px;\">Last Name Updated</p></div>";}
}

if (!empty($address)){
	$sql3 = "UPDATE APP_CUSTOMER SET address = '$address' WHERE email = \"$email\" ";
	if(!mysqli_query($conn,$sql3)){
	echo "<div style=\"color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:12px;\"></p></div>";
}
	else{echo "<div style=\"color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:12px;\">Address Updated</p></div>";}
}

if (!empty($city) && ($city != 'City')){
	$sql4 = "UPDATE APP_CUSTOMER SET city = '$city' WHERE email = \"$email\" ";
	if(!mysqli_query($conn,$sql4)){
	echo "<div style=\"color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:12px;\"></p></div>";
}
	else{echo "<div style=\"color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:12px;\">City Updated</p></div>";}
}


//else{
//	echo "<hr><div style=\"padding:10px 20px;color:#fff;font-weight: normal;text-align:center;\">";
//	echo "<p style=\"margin-top:40px;font-weight:bold;font-size:20px;\">Profile Updated</p>";
//	echo "</div>";
//}


?>