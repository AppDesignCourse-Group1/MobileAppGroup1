<?php
{
session_start();
include "connection.php";
$link = mysql_connect($servername,$dbusername,$dbpassword) or die('Cannot connect to the database.');
mysql_select_db($dbname,$link) or die('Cannot select database.');
if ($_SESSION['semail'] != null){
	$supplier_email = $_SESSION['semail'];
}
	else{
		$supplier_email = 'davidtan@gmail.com';
	}

//$user_id = intval($_GET['user']);
//$user_id = 13;
$query = "SELECT * FROM APP_SUPPLIER WHERE email = \"$supplier_email\" ";
$result = mysql_query($query,$link) or die ('Errant query:  '.$query);

/* create one master array of the records */
$users = array();
  if(mysql_num_rows($result)) {
    while($user = mysql_fetch_assoc($result)) {
      $users[] = array('user'=>$user);
    }
 }

header('Content-type: application/json');
echo json_encode(array('users'=>$users));

@mysql_close($link);
}
?>