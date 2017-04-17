<?php
ob_start();
include ("connect.php");
$username=$_GET['username'];

$sql="DELETE FROM tb_user WHERE username='$username'";
if(mysql_query($sql)){
	header("location:admin.php");
}
else {
	echo mysql_error();
}


?>