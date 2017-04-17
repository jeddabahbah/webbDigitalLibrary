<?php
include ("connect.php");
$show = $_GET['show_id'];
$sql = "select * from tb_user where username='$show'";
$sql_query = mysql_query($sql);
$array = mysql_fetch_array($sql_query);
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
  <!--nav bar-->
  <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">&nbsp;&nbsp;DIGITAL LIBARY</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      </div>
      </ul>
    </div>
  </nav>
  <br>


<form action="save_edit_user.php" method="POST">
<div class="container">
    <h4>Sign in</h4>
    <div class="row" align=center>
	    
	    <div class="input-field col s6">
			<input name="username" type="text" value="<?php echo $array['username']; ?>">
			<label>Username</label>
	    </div>
                  
	    <div class="input-field col s6">
		    <input name="password" type="text" value="<?php echo $array['password']; ?>">
		    <label>Password</label>
	    </div>
    </div>

    <div class="row">
	    <div class="input-field col s6">
		    <input name="fullname" type="text" value="<?php echo $array['fullname']; ?>">
		    <label>Fullname</label>
	    </div>
	    <div class="input-field col s6">
		    <input name="email" type="text" value="<?php echo $array['email']; ?>">
		    <label>Email</label>
	    </div>
    </div>

    <div class="row">
	    <div class="input-field col s6">
		    <input name="studentcode" type="text" value="<?php echo $array['studentcode']; ?>">
		    <label>Student ID</label>
	    </div>
	    <div class="input-field col s6">
		    <input name="tel" type="text" value="<?php echo $array['tel']; ?>">
		    <label>Tel</label>
	    </div>
    </div>
	<br>
    <button class="btn btn-mediem waves-effect waves-light" type="submit">submit</button>
 </div>
</form>

<?php
mysql_close();
?>
<br>

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