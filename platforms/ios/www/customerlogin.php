<?php
session_start();
include "connection.php";

$email = $_POST['cemail'];
$password = $_POST['cpass'];
$shalpassword = sha1($password);

$link = mysql_connect($servername,$dbusername,$dbpassword) or die('Cannot connect to the database.');
mysql_select_db($dbname,$link) or die('Cannot select database.');
$query = "SELECT password from APP_CUSTOMER WHERE email = \"$email\" ";
$result = mysql_query($query,$link) or die('Errant query: '.$query);

	while($row = mysql_fetch_assoc($result)){
		$password1= $row['password'];
	}



//Check connection


if (empty($email)){
	echo "Email can not be blank.";
	die();
}


if (empty($password)){
	echo "Password can not be blank.";
	die();
}


if ($password1 == $shalpassword){
	$_SESSION['email'] = $email;
	echo "<p style=\"color:#aab6ba;font-weight:bold;font-size:14px;\" id=\"success\">Success!</p>";
	echo "<a href=\"#menu\">";
	echo "<p style=\"color:#aab6ba;font-weight:bold;font-size:14px;\">Go to Homepage</p>";
	echo "</a>";
}
else{
	echo "<p style=\"color:#aab6ba;font-weight:bold;font-size:14px;\">Wrong password or email</p>";
}

?>