<?php 
include("connect.php");
include("libuser.php");

session_start();
$_SESSION["hash"] = md5(date('Y-m-d H:i:s'));




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Digital Libary</title>



<!--Import jQuery before materialize.js-->
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

 

  <!--cover-->
<img width=100% src="pics/cover.png">

<!--new movie-->
<div class="container">
  <div class="row">
  <div class="col l4">
    <!--seac=rch image from <database--><br><br>
    <?php
          $strSQL = "SELECT * FROM tb_movies ORDER BY movie_id DESC LIMIT 0,1";
          $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
          $intPic = mysql_fetch_array($objQuery)["movie_pic"];
      ?>
     <img id="posterPic" src="<?=$intPic?>" width=250 heigh=300>
  </div>
  <div class="col l8">
      <ul class="collapsible" data-collapsible="accordion">
          <!--first movie-->

          <?php

                    $strSQL = "SELECT * FROM tb_movies ORDER BY movie_id DESC LIMIT 0,5";

                    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

                    while($row = mysql_fetch_array($objQuery))
                    { ?>

                         <li id="newlist_<?=$row["movie_id"]?>_<?=$row["movie_pic"]?>">
                          <div class="collapsible-header active"><?=$row["movie_name"]?></div>
                          <div class="collapsible-body"><p><?=$row["movie_detail"]?></p></div>
                        </li>

                <?php } ?>

      </ul>
  </div>
  </div>
</div>


 <?php

        $strSQL = "SELECT MV.movie_name, MV.movie_pic FROM tb_playlist PL INNER JOIN tb_movies MV ON PL.movie_id = MV.movie_id ORDER BY playing_id DESC LIMIT 0,1";

        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

        $row = mysql_fetch_array($objQuery);
  ?>
<!--footer-->
<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">NOW PLAYING</h5>
                <p class="grey-text text-lighten-4"><?=$row["movie_name"]?></p>
                <img src="<?=$row["movie_pic"]?>" width=250 heigh=300>
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
                            <div class="btn waves-effect waves-light" id="btn_feedsub" type="submit" name="action">Submit
                              <i class="mdi-content-send right"></i>
                            </div>
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

<script>
$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });

  $('li[id^="newlist_"]').click( function(){
    var picURL = (this.id).split('_')[2];
    $("#posterPic").attr("src",picURL);
    });

  $("#btn_feedsub").click( function(){
      var name = $("#icon_prefix").val();
      var feedback = $("#icon_prefix2").val();
      $.ajax({
        type: "POST",
        url: "feedback.php",
        data: "name="+name+"&feed="+feedback,
        error: function(){
          alert("ERROR: Can't send vote!!");
        },
        success: function(msg){
          alert("Thank for feedback!");
          $("#icon_prefix").val("");
          $("#icon_prefix2").val("");
        }
      });
    });

</script>


</body>
</html>