<?php session_start(); ?>


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

<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


</head>


<body>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  
  <li><a href="logout_user.php">Logout</a></li>
  
</ul>
  <!--nav bar-->
  <nav>
    <div class="nav-wrapper">
      <a href="index_user.php" class="brand-logo">&nbsp;&nbsp;DIGITAL LIBARY</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index_user.php">HOME</a></li>
        <li><a href="movielist_user.php">MOVIE LIST</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1"> <?php echo $_SESSION["username"] ?> <i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="#"><i class="material-icons center">search</i></a>
            
        </li>

      </div>
      </ul>
    </div>
  </nav>

 

  <!--cover-->
<img width=100% src="pics/cover.png">

<!--new movie-->
<div class="container">
  <div class="row">
  <div class="col l6 s12">
    <!--seac=rch image from database-->
     <li><a class="grey-text text-lighten-3" href="#!">IMAGE</a></li>
  </div>
  <div class="col l10 offset-l2 s12">
      <ul class="collapsible" data-collapsible="accordion">
          <!--first movie-->
          <li>
            <div class="collapsible-header active">First New Movie</div>
            <div class="collapsible-body"><p>Detail.</p></div>
          </li>
          <li>
            <div class="collapsible-header">Second New Movie</div>
            <div class="collapsible-body"><p>Detail.</p></div>
          </li>
          <li>
            <div class="collapsible-header">Third New Movie</div>
            <div class="collapsible-body"><p>Detail.</p></div>
          </li>
          <li>
            <div class="collapsible-header">Fouth New Movie</div>
            <div class="collapsible-body"><p>Detail.</p></div>
          </li>

      </ul>
  </div>
  </div>
</div>

<!--footer-->
<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">NOW PLAYING</h5>
                <p class="grey-text text-lighten-4">RATATOUILLE</p>
                <img src="pics/a1.jpg" width=250 heigh=300>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">CONTRACT ADMIN</h5>
                <ul>
                  <li>
                  <p><div class="row">
                      <form class="col5 s12">
                        <div class="row">
                          <div class="input-field col5 s6">
                            <i class="material-icons prefix color=white">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea" class="validate"></textarea>
                            <label for="icon_prefix2" class="white-text">Message</label>
                          </div>
                          <div class="input-field col5 s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="icon_prefix" type="text">
                            <label for="icon_prefix" class="white-text">Name</label>
                          </div>
                          <div align=center>
                            <br>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>

                        </div>
                      </form>
                    </div></p></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2015 `Jedda Inc.
            </div>
          </div>
        </footer>



<script>
$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });


$(".dropdown-button").dropdown();
</script>


</body>
</html>