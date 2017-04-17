<?php
include ("connect.php");
include("libuser.php");
session_start();
$_SESSION["hash"] = md5(date('Y-m-d H:i:s'));

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

<script>
  $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
</script>


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


<!--admin-->
<h4 align=center>Welcome Sir!</h4>
<div class="container">
  <div class="col s12">
      <ul class="collapsible popout" data-collapsible="accordion">

        <!--user list-->
          <li>
            <div class="collapsible-header">User list</div>
            <div class="collapsible-body">
            <from>
              <table class="highlight">
                <thead>
                  <tr>
                      <th data-field="username">Username</th>
                      <th data-field="password">Password</th>
                      <th data-field="fullname">Fullname</th>
                      <th data-field="email">E-mail</th>
                      <th data-field="studentcode">Student ID</th>
                      <th data-field="tel">Tel.</th>
                  </tr>
                </thead>
            <tbody>
            <?php
            while($array = mysql_fetch_array($dd))
            {
                echo "<tr>";
                echo "<td>".$array['username']."</td>";
                echo "<td>".$array['password']."</td>";
                echo "<td>".$array['fullname']."</td>";
                echo "<td>".$array['email']."</td>";
                echo "<td>".$array['studentcode']."</td>";
                echo "<td>".$array['tel']."</td>";
                echo "<td><a href='edit_user.php?&show_id=".$array['username']."'>edit</a></td>";
                echo "<td><a href='del_user.php?&username=".$array['username']."'>delete</a></td>";
                echo "</tr>";
            }
              
            ?>

            </tbody>
            </table>

           </from>
          </div>
          </li>


<!--movie list-->
          <li>
            <div class="collapsible-header">Movie list</div>
            <div class="collapsible-body">
          



          <div class="row">
            <div class="col s12">
              <ul class="tabs">

              <?php
              $strSQL = "SELECT * FROM tb_movietype ORDER BY id ASC LIMIT 0,5";
              $obj = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

              while($rowt = mysql_fetch_array($obj))
              { ?>

                <li class="tab col s3"><a href="#<?=$rowt["code"]?>"><?=$rowt["name"]?></a></li>

              <?php } ?>
              </ul>
            </div>
            <br>
<?php
  $strSQL = "SELECT * FROM tb_movietype ORDER BY id ASC LIMIT 0,5";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

  while($rowtype = mysql_fetch_array($objQuery))
  { ?>

            <div id="<?=$rowtype["code"]?>" class="col s12">
            
            <from>
              <table class="highlight">
                <thead>
                  <tr>
                      <th data-field="movie_id">MovieID</th>
                      <th data-field="movie_name">Name</th>
                      <th data-field="movie_type">Type</th>
                      <th data-field="movie_detail">Detail</th>
                      <th data-field="movie_pic">Pics</th>
                      <th data-field="movie_trailer">VDOS</th>
                      <th data-field="movie_year">Year</th>

                  </tr>
                </thead>
            <tbody>

            <?php

                    $strSQL = "SELECT * FROM tb_movies WHERE movie_type = '".$rowtype["code"]."' ORDER BY movie_id ASC LIMIT 0,9";

                    $objQuer = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

                    while($row = mysql_fetch_array($objQuer))
                    { 

                echo "<tr>";
                echo "<td>".$row['movie_id']."</td>";
                echo "<td>".$row['movie_name']."</td>";
                echo "<td>".$row['movie_type']."</td>";
                echo "<td>".$row['movie_detail'].split(" ",150)[0]."</td>";
                echo "<td>".$row['movie_pic']."</td>";
                echo "<td>".$row['movie_trailer']."</td>";
                echo "<td>".$row['movie_year']."</td>";



                
                echo "<td><a href='del_user.php?&username=".$row['movie_id']."'>delete</a></td>";
                echo "</tr>";

            }
              
            ?>

            </tbody>
            </table>

            </from>
            </div>

          <?php } ?>



          </div>


          </div>
          </li>





  <!--update now playing-->
      
          <li>
            <div class="collapsible-header">Update now playing</div>
            <div class="collapsible-body">
              <form>
                <div class = container>
                <div class="row">
                       <form class="col s12"> 
                        <div class="input-field col s12">
                              <div class="input-field col s12">
                              <select id="nowPM">
                                <option value="" disabled selected>Choose your movie</option>
                                <?php  
                                $strSQL = "SELECT * FROM tb_movies ORDER BY movie_id ASC LIMIT 0,20";

                                $objQuer = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

                                while($row = mysql_fetch_array($objQuer))
                                 { 
                                  echo "<option value=\"".$row["movie_id"]."\">".$row["movie_name"]."</option>";
                                 } ?>
                              </select>
                              <label>Choose movie</label>
                            </div>
                        </div>
                </div>

              <!-- Modal Trigger -->
              <div class="waves-effect waves-light btn" id="btnAddNP">Add now playing</div>
              
          </li>




<!--add newmovie-->
          <li>
            <div class="collapsible-header">Add movie</div>
            <div class="collapsible-body">
              <div class=container align=center>
              <form method="post" action="add_movie.php">
                  
                <div class="row">
                       <form class="col s12"> 
                        <div class="input-field col s12">
                            <input id="movie_name" name="movie_name" type="text">
                            <label>Name Movie</label>
                        </div>
                </div>

                <div class="row">
                       <form class="col s12"> 
                        <div class="input-field col s12">
                            <select id="movie_type">
                                <?php  
                                $strSQL = "SELECT * FROM tb_movietype ORDER BY id ASC LIMIT 0,10";

                                $objQuer = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

                                while($row = mysql_fetch_array($objQuer))
                                 { 
                                  echo "<option value=\"".$row["code"]."\">".$row["name"]."</option>";
                                 } ?>
                              </select>
                            <label>Type movie</label>
                        </div>
                </div>

                <div class="row">
                       <form class="col s12"> 
                        <div class="input-field col s12">
                            <input name="movie_detail" id="movie_detail" type="text">
                            <label>Detail</label>
                        </div>
                </div>

                <div class="row">
                       <form class="col s12"> 
                        <div class="input-field col s12">
                            <input name="movie_pic" id="movie_pic" type="text">
                            <label>Pic movie</label>
                        </div>
                </div>
             
                <div class="row">
                       <form class="col s12"> 
                        <div class="input-field col s12">
                            <input name="movie_trailer" id="movie_trailer" type="text">
                            <label>VDO movie</label>
                        </div>
                </div>

                <div class="row">
                       <form class="col s12"> 
                        <div class="input-field col s12">
                            <input name="movie_year" id="movie_year" type="text">
                            <label>Movie year</label>
                        </div>
                </div>

                
               <div id="btnAddMovie" class="btn btn-mediem waves-effect waves-light" type=submit>add</div>



              </form>

                


              </div>
            </div>

          </li>



          <li>
            <div class="collapsible-header">Contact admin</div>
            <?php  
                $strSQL = "SELECT * FROM tb_feedback ORDER BY id DESC LIMIT 0,15";

                $objQuer = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

                while($row = mysql_fetch_array($objQuer))
                 { 
                     echo "<div class=\"collapsible-body\"><p>".$row["content"]."</p></div>";
                } ?>
            

          </li>
          
      </ul>
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
//movie list
  $(document).ready(function(){
    $('ul.tabs').tabs();
  });

  $(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'tab_id');
  });
$(document).ready(function() {
    $('select').material_select();
  });
//update movie
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });


  $('#modal1').closeModal();

    $("#btnAddNP").click( function(){
      var mid = $("#nowPM").val();
      $.ajax({
        type: "POST",
        url: "insert.php",
        data: "mode=pushNP&mid="+mid,
        error: function(){
          alert("ERROR: Can't send command!!");
        },
        success: function(msg){
          alert("Now Playing is Update!!!");
          $("#nowPM").val("");
        }
      });
    });

    $("#btnAddMovie").click( function(){
      var mName = $("#movie_name").val();
      var mType = $("#movie_type").val();
      var mPic = $("#movie_pic").val();
      var mDetail = $("#movie_detail").val();
      var mYear = $("#movie_year").val();
      var mTrailer = $("#movie_trailer").val();
      
      $.ajax({
        type: "POST",
        url: "insert.php",
        data: "mode=pushNM&mName="+mName+"&mType="+mType+"&mPic="+mPic+"&mDetail="+mDetail+"&mYear="+mYear+"&mTrailer="+mTrailer,
        error: function(){
          alert("ERROR: Can't send command!!");
        },
        success: function(msg){
          alert("Movie Added!!!"+msg);
          //$("#nowPM").val("");
        }
      });
    });

  
</script>

</body>
</html>