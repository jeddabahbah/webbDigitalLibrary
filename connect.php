<meta charset=utf-8>
<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="lib";

$con= mysql_connect($hostname,$username,$password);

if($con){
	mysql_select_db($dbname);
	mysql_query("SET NAMES UTF8");
	//echo "Connect Already";
}
else{
	echo mysql_error();
}

?>