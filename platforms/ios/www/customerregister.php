<?php
$servername = "localhost";
$dbusername = "websysF181";
$dbpassword = "websysF181!!";
$dbname = "websysF181";



$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$password = $_POST['password'];
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

if (empty($address)){
	echo "Address can not be blank.";
	die();
}

if (empty($city)){
	echo "City can not be blank.";
	die();
}


$sql = "INSERT INTO APP_CUSTOMER (first_name,last_name,email,phone,address,city,password)
	VALUES ('$fname','$lname','$email','$phone','$address','$city','$shalpassword')";

if(!mysqli_query($conn,$sql)){
	echo 'Not Inserted';
}
else{
	echo "<hr><div style=\"padding:10px 20px;color:#fff;font-weight: normal;text-align:center;\">";
	echo "<p style=\"margin-top:40px;font-weight:bold;font-size:20px;\">Thank you for register</p>";
	echo "<a href=\"Homepage.html\" rel=\"external\">";
	echo "<p style=\"color:#fff;font-weight:bold;font-size:20px;\">Go to Homepage</p>";
	echo "</a>";
	echo "</div>";
}

?>