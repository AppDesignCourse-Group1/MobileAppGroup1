<?php
$servername = "localhost";
$dbusername = "shiyuwu";
$dbpassword = "0109";
$dbname = "mydatabase";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$password = $_POST['password'];
//$state = $_POST['state'];
//$country = $_POST['country'];

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

if (empty($password)){
	echo "Password can not be blank.";
	die();
}

$sql = "INSERT INTO customers (first_name,last_name,email,phone,address,city)
	VALUES ('$fname','$lname','$email','$phone','$address','$city')";

if($conn->quey($sql) === TRUE){
	echo "Thank you for register";
} else{
	echo"Error:" . $sql . "<br" . $conn->error;
}

$conn->close();
?>