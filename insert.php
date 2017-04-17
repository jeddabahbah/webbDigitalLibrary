<?php
	session_start();
	include("connect.php");



if(isset($_POST["mode"])){
	if($_POST["mode"] == "pushMC"){
		pushMovieComment();
	}else if($_POST["mode"] == "pushNP"){
		pushNowPlaying();
	}else if($_POST["mode"] == "pushNM"){
		pushMovie();
	}


}

function pushMovieComment(){

	if(isset($_SESSION["hash"])){
		$mid = $_POST["id"];
		$user = $_POST["username"];
		$comm = $_POST["comment"];
		$sql = "SELECT * FROM tb_user WHERE username = '".$user."'";
		$QuerygetUser = mysql_query($sql) or die ("Error Query [".$sql."]");
		$uid = mysql_fetch_array($QuerygetUser)["id"];


		$sql = "INSERT INTO tb_comment(movie_id,uid,comment) VALUES(".$mid.",".$uid.",'".$comm."')";
		mysql_query($sql) or die ("Error Query [".$sql."]");
	}else {
		echo "error!";
	}

}


function pushNowPlaying(){

	if(isset($_SESSION["hash"])){
		$mid = $_POST["mid"];
		$datet = date("Y-m-d H:i:s");
		$sql = "INSERT INTO tb_playlist(movie_id,datetime) VALUES(".$mid.",'".$datet."')";
		mysql_query($sql) or die ("Error Query [".$sql."]");
	}else {
		echo "error!";
	}

}


function pushMovie(){

	if(isset($_SESSION["hash"])){
	  $mName = $_POST["mName"];
      $mType = $_POST["mType"];
      $mPic = $_POST["mPic"];
      $mDetail = $_POST["mDetail"];
      $mYear = $_POST["mYear"];
      $mTrailer = $_POST["mTrailer"];

		$sql = "INSERT INTO tb_movies VALUES(NULL,'".$mType."','".$mName."','".$mDetail."','".$mPic."','".$mTrailer."','".$mYear."')";
		mysql_query($sql) or die ("Error Query [".$sql."]");
	}else {
		echo "error!";
	}

}

?>