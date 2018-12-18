<?php
session_start();
/*$servername = "localhost";
$dbusername = "websysF181";
$dbpassword = "websysF181!!";
$dbname = "websysF181";*/
include "connection.php";
$cemail = $_SESSION['email'];
$link = mysql_connect($servername,$dbusername,$dbpassword) or die('Cannot connect to the database.');
mysql_select_db($dbname,$link) or die('Cannot select database.');
$query = "SELECT * FROM APP_ORDERS WHERE customer_email = \"$cemail\" ";
$result = mysql_query($query,$link) or die('Errant query: '.$query);


/* create one master array of the records*/
$orders = array();
if(mysql_num_rows($result)){
	while($order = mysql_fetch_assoc($result)){
		$orders[] = array('order'=>$order);
	}
}

/*output in necessary format*/
header('Content-type:application/json');
echo json_encode(array('orders'=>$orders));

@mysql_close($link);

?>