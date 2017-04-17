<?php
	session_start();
	include("connect.php");
	$name = $_POST["name"];
	$feed = $_POST["feed"];

if(isset($_SESSION["hash"])){
	$sql = "INSERT INTO tb_feedback(name,content) VALUES('".$name."','".$feed."')";
	mysql_query($sql) or die ("Error Query [".$sql."]");
}else {
	echo "error!";
}
?>