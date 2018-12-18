<?php
{
/*$servername = "localhost";
$dbusername = "websysF181";
$dbpassword = "websysF181!!";
$dbname = "websysF181";*/
include "connection.php";
$link = mysql_connect($servername,$dbusername,$dbpassword) or die('Cannot connect to the database.');
mysql_select_db($dbname,$link) or die('Cannot select database.');
$query = "SELECT supplier_id,first_name,last_name,service_desc,hourly_rate,overall_rating FROM APP_SUPPLIER WHERE service_category = \"Massages\" ";
$result = mysql_query($query,$link) or die('Errant query: '.$query);

/* create one master array of the records*/
$users = array();
if(mysql_num_rows($result)){
	while($user = mysql_fetch_assoc($result)){
		$users[] = array('user'=>$user);
	}
}

/*output in necessary format*/
header('Content-type:application/json');
echo json_encode(array('users'=>$users));

@mysql_close($link);
}
?>