<meta charset="UTF-8">

<?php
include("connect.php");

$movie_id=$_POST['movie_id'];
$movie_name=$_POST['movie_name'];
$movie_type=$_POST['movie_type'];
$movie_detail=$_POST['movie_detail'];
$movie_pic=$_POST['movie_pic'];
$movie_trailer=$_POST['movie_trailer'];
$movie_year=$_POST['movie_year'];
$movie_like=$_POST['movie_like'];
$movie_ok=$_POST['movie_ok'];
$movie_dontlike=$_POST['movie_dontlike'];

if($movie_type == "action"){

$addmovie = "INSERT INTO tb_movie_action (movie_id,movie_name,movie_type,movie_detail,movie_pic,movie_trailer,movie_year,
									 movie_like,movie_ok,movie_dontlike) VALUES ('$movie_id','$movie_name','$movie_type','$movie_detail',
									 '$movie_pic','$movie_trailer','$movie_year','$movie_like','$movie_ok','$movie_dontlike')" ;
	
	if(mysql_query($addmovie)){
		header("location:admin.php");
		
	}
	else{
		echo mysql_error();
	}
}

else if($movie_type == "animation"){

$addmovie2 = "INSERT INTO tb_movie_animation (movie_id,movie_name,movie_type,movie_detail,movie_pic,movie_trailer,movie_year,
									 movie_like,movie_ok,movie_dontlike) VALUES ('$movie_id','$movie_name','$movie_type','$movie_detail',
									 '$movie_pic','$movie_trailer','$movie_year','$movie_like','$movie_ok','$movie_dontlike')" ;
	
	if(mysql_query($addmovie2)){
		header("location:admin.php");
		
	}
	else{
		echo mysql_error();
	}
}

else if($movie_type == "romcom"){

$addmovie3 = "INSERT INTO tb_movie_romcom (movie_id,movie_name,movie_type,movie_detail,movie_pic,movie_trailer,movie_year,
									 movie_like,movie_ok,movie_dontlike) VALUES ('$movie_id','$movie_name','$movie_type','$movie_detail',
									 '$movie_pic','$movie_trailer','$movie_year','$movie_like','$movie_ok','$movie_dontlike')" ;
	
	if(mysql_query($addmovie3)){
		header("location:admin.php");
		
	}
	else{
		echo mysql_error();
	}
}
	

?>