<?php
{
/*$servername = "localhost";
$dbusername = "websysF181";
$dbpassword = "websysF181!!";
$dbname = "websysF181";*/
session_start();
include "connection.php";
$email = $_SESSION['semail'];
$link = mysql_connect($servername,$dbusername,$dbpassword) or die('Cannot connect to the database.');
mysql_select_db($dbname,$link) or die('Cannot select database.');
$query = "SELECT available_date FROM APP_SUPPLIER_AVAILABILITY WHERE supplier_email = \"$email\" ";
$result = mysql_query($query,$link) or die('Errant query: '.$query);

/* create one master array of the records*/
$dates = array();
if(mysql_num_rows($result)){
	while($date = mysql_fetch_assoc($result)){
		$dates[] = array('date'=>$date);
	}
}

/*output in necessary format*/
header('Content-type:application/json');
echo json_encode(array('dates'=>$dates));

@mysql_close($link);
}
?>