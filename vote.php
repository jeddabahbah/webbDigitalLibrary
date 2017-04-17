<?php
	session_start();
	include("connect.php");
	$mid = $_POST["id"];
	$rating = $_POST["point"];

if(isset($_SESSION["hash"])){
	$sql = "INSERT INTO tb_rating(movie_id,rating) VALUES(".$mid.",".$rating.")";
	mysql_query($sql) or die ("Error Query [".$sql."]");
}else {
	echo "error!";
}
?>