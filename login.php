<?php
include ("connect.php");
include("libuser.php");
$sql="SELECT * FROM tb_user";
$dd=mysql_query($sql);
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

<body >
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">

  <?php if(checkAdmin($_SESSION["username"])){ ?><li><a href="admin.php">Admin</a></li><?php } ?>
  <li><a href="logout_user.php">Logout</a></li>
  
</ul>
  <!--nav bar-->
  <nav class="navbar">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">&nbsp;&nbsp;DIGITAL LIBARY</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">HOME</a></li>
        <li><a href="movielist.php">MOVIE LIST</a></li>

        <?php if(isset($_SESSION["username"])){?>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"> <?php echo $_SESSION["username"] ?> <i class="material-icons right">arrow_drop_down</i></a></li>
        <?php }else {?>
            <li><a href="login.php">LOGIN</a></li>
        <?php } ?>

        <li><a href="#"><i class="material-icons center">search</i></a>
            
        </li>

      </div>
      </ul>
    </div>
  </nav>

<br>
 <!--login-->

<div class="container">
  <div class="row">

    <div class="col s4">
      <img src="pics/table.png">
    </div>
        
        <div class="col s4">
          <div class="center-align">
            <i class="medium material-icons prefix">perm_identity</i>
            <div class="row">
              <br>
                
                <form class="col s12" action="check_login.php" method="post">
                    <div class="row">
                       <form class="col s12"> 
                        <div class="input-field col s12">
                            <input name="myuser" type="text" id="myuser">
                            <label>Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="mypass" type="text" id="mypass">
                            <label>Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <br>
                    </div>  
                    <br>

                    <button class="btn btn-mediem waves-effect waves-light" type="submit" name="submit" value="LOGIN">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">sign up</a>
                    
                    </form>   

                    <div class="divider"></div>
                    <br>
                    <form class="col s12" method="post" action="add_user.php">
                    <div class="row">
                        <div class="col m12">
                            <p class="center-align">
                                
                                
                                <!-- Modal Structure -->                          
                                <div id="modal1" class="modal">
                                  <div class="modal-content">                                  

                                    <div class="container">
                                    <h4>Sign in</h4>
                                        <div class="row" align=center>
                                        <div class="input-field col s6">
                                            <input name="username" type="text">
                                            <label>Username</label>
                                          </div>
                  
                                            <div class="input-field col s6">
                                                <input name="password" type="text">
                                                <label>Password</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input name="fullname" type="text">
                                                <label>Fullname</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input name="email" type="text">
                                                <label>Email</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input name="studentcode" type="text">
                                                <label>Student ID</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input name="tel" type="text">
                                                <label>Tel</label>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-mediem waves-effect waves-light" type="submit">sign in</button>
                                   </div>
                                </div>
                              

                             


                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="col s4">
      <img src="pics/table.png">
    </div>


  </div>
</div>


<!--footer-->
<footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
            © 2015 `Jedda Inc.
            </div>
          </div>
        </footer>


<script>
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
         
    $('#modal1').openModal(); 
    $('#modal1').closeModal();

  $('.modal-trigger').leanModal({
  dismissible: true, // Modal can be dismissed by clicking outside of the modal
  opacity: .5, // Opacity of modal background
  in_duration: 300, // Transition in duration
  out_duration: 200, // Transition out duration
   ready: function() { alert('Ready'); }, // Callback for Modal open
   complete: function() { alert('Closed'); } // Callback for Modal close
    }
  );
    
</script>




</body>
</html>