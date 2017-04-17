<?php
	session_start();
	$error = "";
	$myuser = trim($_POST['myuser']);
	$mypass = trim($_POST['mypass']);
	if(empty($myuser)||empty($mypass)){
		$error .= "<br>username or password not include.</br>";
		echo $error;
		exit();
	}

	include("connect.php");
	$strSQL="SELECT * FROM tb_user WHERE username='".$myuser."' and password='".$mypass."' ";
	$objQuery=mysql_query($strSQL);
	$objResult=mysql_fetch_array($objQuery);

	if(!$objResult){
		echo "wrong username adn password";
	}
	else{
	$_SESSION["username"]=$objResult["username"];
	$_SESSION["password"]=$objResult["password"];

	session_write_close();

	if($objResult["user_type_id"]=="1"){
		header("location:admin.php");
	}
	else{
		header("location:index_user.php");
	}
}
mysql_close();
?>