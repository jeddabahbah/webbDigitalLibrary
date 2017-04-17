<?php
include("connect.php");
include("libuser.php");

session_start();
$_SESSION["hash"] = md5(date('Y-m-d H:i:s'));


if(isset($_GET["id"])){
  $movie_id = $_GET["id"];
}else{
  $movie_id = 1;
}




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

<script>
$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
</script>




</head>


<body>
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
 

 <!--movie-->
<div class="container">
    <div class="row">
        
    

        <div class="col m12" id="movie_content" align=center>
            <h3 class="center-align">MOVIE TRAILER</h3>
            <div class="row">
                <!--<img src="pics/a1.jpg" width=250 heigh=300>-->
                <?php

                    $strSQL = "SELECT * FROM tb_movies WHERE movie_id = ".$movie_id." LIMIT 0,1";

                    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

                    while($row = mysql_fetch_array($objQuery))
                    {

                      echo "<video width='640' height='360' controls preload='none' poster='".$row['movie_pic']."'>".
                            "<source src='".$row['movie_trailer']."' type='video/mp4' />".
                            "</video>
                        
                        <br></br><font face=Arial Black size=3 color=312531>".$row['movie_detail']."</font>";
                        

                    }

                ?>
                <br><br><br>
                <a class="btn vote_btn" id="1" onclick="Materialize.toast('VOTE ALREADY', 4000);">LIKE</a>
                <a class="btn vote_btn red" id="-1" onclick="Materialize.toast('VOTE ALREADY', 4000);">DON'T LIKE</a>
            </div>
        </div>

    </div>
</div>

<div class="contrainer">
  <div class="row">
     <div class="col m12" align=center>
           <ul class="collapsible" data-collapsible="accordion">
            <li>
              <div class="collapsible-header active">COMMENT</div>
              <div class="collapsible-body">
                <?php

                    $strSQL = "SELECT * FROM tb_comment WHERE movie_id = ".$movie_id." ORDER BY id DESC LIMIT 0,30";

                    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

                    while($row = mysql_fetch_array($objQuery))
                    {

                        echo "<div class=\"card-panel\" align=left><span class=\"blue-text text-darken-2\">".$row['comment']."</span></div>";

                    }

                ?>

            
              </div>
            </li>
           </ul>
           <?php 
              if(isset($_SESSION["username"])){
                           
            ?>
           <div class="col m12" align=left>
           <ul>
            <li><br><br>
                <form class="col s8" align=center>
                  <img src="pics/table.png">
                </form>
                <form class="col s4" align=center>
                <textarea class="materialize-textarea" placeholder="Your Comment" required></textarea>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name" type="text" class="validate" disabled>
                    <label for="first_name"><?=$_SESSION["username"]?></label>
                  </div>
                </div>
                <div class="btn waves-effect waves-light" id="btnCommSubmit" type="submit" name="action">Submit
                  <i class="mdi-content-send right"></i>
                </div>
              </form>
              
            </li>
           </ul>
        </div>

            <?php } ?>

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
    $('ul.tabs').tabs();
  });

     $(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'tab_id');
  });


  $("#btnCommSubmit").click( function(){
    var commentStr = $(".materialize-textarea").val();
    if(commentStr != ""){
          $.ajax({
            type: "POST",
            url: "insert.php",
            data: "mode=pushMC&id=<?=$movie_id?>&username=<?=$_SESSION["username"]?>&comment="+commentStr,
            error: function(){
              alert("ERROR: Can't send vote!!");
            },
            beforeSend : function(){
                $('#movie_content').html('<center><img width="20" height="20" src=\"img/loading.gif\" /> กำลังส่งข้อมูล ...</center>');
                $('#movie_content').slideDown('fast');
              },
            success: function(msg){
              alert("Thank for vote!"+msg);
              <?php
                  echo "$(location).attr('href', 'domovie.php?id=".$movie_id."')";
              ?>
            }
          });
      }
    });


     // Materialize.toast(message, displayLength, className, completeCallback);
  // 4000 is the duration of the toast
</script>


</body>
</html>