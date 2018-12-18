<?php
session_start();
include "connection.php";

$email = $_SESSION['semail'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
//$email = $_POST['email'];
//$phone = $_POST['phone'];
//service_category = $_POST['service_categorys'];
$service_desc = $_POST['service_desc'];
$hourlyrate = $_POST['hourlyrate'];
//$password = $_POST['passwords'];
//$shalpassword = sha1($password);

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

//Check connection
if ($conn->connect_error){
	die("Connection failed:" . $conn->connect_error);
}

if (!empty($fname)){
	$sql1 = "UPDATE APP_SUPPLIER SET first_name = '$fname' WHERE email = \"$email\" ";
	if(!mysqli_query($conn,$sql1)){
		echo "<div style=\"padding:10px 20px;color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:20px;\">First Name Not Updated</p></div>";
}
	else{echo "<div style=\"padding:10px 20px;color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:20px;\">First Name Updated</p></div>";}
}

if (!empty($lname)){
	$sql2 = "UPDATE APP_SUPPLIER SET last_name = '$lname' WHERE email = \"$email\" ";
	if(!mysqli_query($conn,$sql2)){
	echo "<div style=\"padding:10px 20px;color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:20px;\">Last Name Not Updated</p></div>";
}
	else{echo "<div style=\"padding:10px 20px;color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:20px;\">Last Name Not Updated</p></div>";}
}

if (!empty($service_desc)){
	$sql3 = "UPDATE APP_SUPPLIER SET service_desc = '$service_desc' WHERE email = \"$email\" ";
	if(!mysqli_query($conn,$sql3)){
	echo "<div style=\"padding:10px 20px;color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:20px;\">Service Description Not Updated</p></div>";
}
	else{echo "<div style=\"padding:10px 20px;color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:20px;\">Service Description Updated</p></div>";}
}

if (!empty($hourlyrate)){
	$sql4 = "UPDATE APP_SUPPLIER SET hourly_rate = '$hourlyrate' WHERE email = \"$email\" ";
	if(!mysqli_query($conn,$sql4)){
	echo "<div style=\"padding:10px 20px;color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:20px;\">Hourly Rate Not Updated</p></div>";
}
	else{echo "<div style=\"padding:10px 20px;color:#fff;font-weight: bold;text-align:center;\"><p style=\"font-weight:bold;font-size:20px;\">Hourly Rate Updated</p></div>";}
}


//else{
//	echo "<hr><div style=\"padding:10px 20px;color:#fff;font-weight: normal;text-align:center;\">";
//	echo "<p style=\"margin-top:40px;font-weight:bold;font-size:20px;\">Profile Updated</p>";
//	echo "</div>";
//}


?>