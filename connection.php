<?php
$servername = "localhost";
$dbusername = "websysF181";
$dbpassword = "websysF181!!";
$dbname = "websysF181";

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$city = $_GET['city'];
//$password = $_POST['password'];
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

$sql = "INSERT INTO APP_CUSTOMER (first_name,last_name,email,phone,address,city)
	VALUES ('$fname','$lname','$email','$phone','$address','$city')";

if($conn->query($sql) === TRUE){
	echo "Thank you for register";
} else{
	echo"Error:" . $sql . "<br" . $conn->error;
}

$conn->close();
?>