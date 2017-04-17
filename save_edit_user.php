<?php
include ("connect.php");
error_reporting(E_ALL & ~E_NOTICE);
$username = $_POST['username'];
$password = $_POST['password'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$studentcode=$_POST['studentcode'];
$tel=$_POST['tel'];

$sql = "UPDATE tb_user SET username='$username',password='$password',fullname='$fullname',email='$email',studentcode='$studentcode',tel='$tel' WHERE username='$username' ";

$sql_query=mysql_query($sql);
/*if($sql_query){
	echo "Success";
}
else {
	echo "No Success";
}*/

mysql_close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Digital Libary</title>

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>    
<!--Import Google Icon Font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

</head>


<body>

<nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">&nbsp;&nbsp;DIGITAL LIBARY</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      </div>
      </ul>
    </div>
  </nav>


<div class=container align=center>
  <br><br><br>
  <h3>Success</h3><br>
  <p>go to manu</p>
  <p>for contineus.</p><br><br>

	<a href="admin.php"><button class="btn btn-mediem waves-effect waves-light">back to home</button></a>
</div>
<br><br><br>
<br><br><br>

<!--footer-->
<footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
            © 2015 `Jedda Inc.
            </div>
          </div>
</footer>





</body>
</html>

