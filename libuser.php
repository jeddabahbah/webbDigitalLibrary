<?php


function checkAdmin($usern){

	$strUserSQL = "SELECT * FROM tb_user WHERE username = '".$usern."' LIMIT 0,1";
	$objUserQuery = mysql_query($strUserSQL) or die ("Error Query [".$strUserSQL."]");
	$user = mysql_fetch_array($objUserQuery);
	if($user["user_type_id"] == 1){
		return true;
	}else {
		return false;
	}
}


?>