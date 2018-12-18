<?php
session_start();
include "connection.php";

$date = $_POST['dateform'];
$time = $_POST['timex'];
$duration = $_POST['durationx'];
$category = 'Personal Chef';

//$_SESSION['date'] = $date;
//$_SESSION['time'] = $time;
//$_SESSION['duration'] = $duration;
if ($_SESSION['semail'] != null){
	$semail = $_SESSION['semail'];
}
	else{
		$semail = 'davidtan@gmail.com';
	}

$cemail = $_SESSION['email'];

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);
if (empty($date)){
	echo "Please select date";
	die();
}

if (empty($time)){
	echo "Please select time";
	die();
}

if (empty($duration)){
	echo "Please select duration";
	die();
}

$query = "SELECT hourly_rate from APP_SUPPLIER WHERE email = \"$semail\" ";
//$link = mysql_connect($servername,$dbusername,$dbpassword) or die('Cannot connect to the database.');
$result = mysqli_query($conn,$query) or die('Errant query: '.$query);
$rows = mysqli_num_rows($result);
if ($rows){
	while ($row = mysqli_fetch_array($result)){
		$hourlyrate = $row['hourly_rate'];
	}
}

$totalprice = $duration * $hourlyrate;




$sql = "INSERT INTO APP_ORDERS (date,time,duration,supplier_email,customer_email,service_category,total_price) VALUES ('$date','$time','$duration','$semail','$cemail','$category','$totalprice')";
//$result2 = mysql_query($query2,$link) or die('Errant query: '.$query2);

if(!mysqli_query($conn,$sql)){
	echo '<p style=\"color:#fff;\">Not Inserted</p>';
}
else{
	echo '<p style=\"font-weight:bold;font-size:12px;color:#fff;\">Order Created</p>';
	echo "<hr><div style=\"padding:10px 20px;color:#fff;font-weight: normal;text-align:center;\">";
	echo "<p style=\"font-weight:bold;font-size:12px;\">Order Detail</p>";
	echo "<p style=\"font-weight:bold;font-size:12px;\">Date: $date </p>";
	echo "<p style=\"font-weight:bold;font-size:12px;\">Time: $time </p>";
	echo "<p style=\"font-weight:bold;font-size:12px;\">Total Price: $totalprice </p>";
	echo "</div>";
}

//$_SESSION['totalprice'] =  $totalprice;







?>