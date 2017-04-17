
<?php
include("connect.php");
include("libuser.php");
session_start();



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

<!-- Popup mouse over -->
<script src="js/script2.0.js"></script>
<link type="text/css" rel="stylesheet" href="css/mod.css"/>

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
 <br>
 <!--movie-->


 <div class="container">

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
        <!--<li class="tab col s3"><a href="#test2">Second Style</a></li>
        <li class="tab col s3"><a href="#test4">Thrid Style</a></li>-->

      </ul>
    </div>

<?php
	$strSQL = "SELECT * FROM tb_movietype ORDER BY id ASC LIMIT 0,5";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

	while($rowtype = mysql_fetch_array($objQuery))
	{ ?>

    <div id="<?=$rowtype["code"]?>" class="col s12">
            <br>
            <!-- Poster 1 -->

          	<?php

                    $strSQL = "SELECT * FROM tb_movies WHERE movie_type = '".$rowtype["code"]."' ORDER BY movie_id ASC LIMIT 0,9";

                    $objQuer = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

                    while($row = mysql_fetch_array($objQuer))
                    { ?>

					<div class="item" id="poster_<?=$row["movie_id"]?>">
						<a href="domovie.php?id=<?=$row["movie_id"]?>" title="<?=$row["movie_name"]?>" class="trailer">
						<div class="movie_holder" id="loader_<?=$row["movie_id"]?>" style="background-image: url('<?=$row["movie_pic"]?>')">
							<div class="hitbox" onmousemove="mousepos(event,<?=$row["movie_id"]?>);" onmouseout="hide('info_<?=$row["movie_id"]?>');"></div>
								<div id="msg_<?=$row["movie_id"]?>"></div>
								<div class="info_holder" id="info_<?=$row["movie_id"]?>" style="display: none; position: absolute; left: 283px; top: 451px;">
									<div class="w_content" >
										<div class="blurb">
										<h2><?=$row["movie_name"]?></h2>
											<ul class="genre">
												<li class="year"><?=$row["movie_year"]?></li>
													<li>Thriller</li>					</ul>
										<?=str_split($row["movie_detail"], 500)[0]."...";?>
										</div>
										<?php 
											$strVoteLikeSQL = "SELECT COUNT(*) AS `likevote` FROM `tb_rating` WHERE `movie_id` = ".$row["movie_id"]." AND `rating` = 1";
                    						$objVoteLikeQuery = mysql_query($strVoteLikeSQL) or die ("Error Query [".$strVoteDLikeSQL."]");
                    						$rev = mysql_fetch_array($objVoteLikeQuery);
                    						$strVoteDLikeSQL = "SELECT COUNT(*) AS `dlikevote` FROM `tb_rating` WHERE `movie_id` = ".$row["movie_id"]." AND `rating` = -1";
                    						$objVoteDLikeQuery = mysql_query($strVoteDLikeSQL) or die ("Error Query [".$strVoteDLikeSQL."]");
                    						$drev = mysql_fetch_array($objVoteDLikeQuery);
										?>
										<ul class="allVotes" id="ratings_2529">
											<li><?=$rev["likevote"]?><img src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!"><br><span>Like this</span></li>
											<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-ok.png" alt="It's OK"><br><span>Say It's OK</span></li>
											<li><?=$drev["dlikevote"]?><img src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"><br><span>Don't like</span></li>
										</ul>

										<? } ?>
									</div>
										<img style="visibility:hidden;" src="images/hurf.gif" onload="loadImg('<?=$row["movie_pic"]?>')" alt="Movie Poster">
									
								</div>
							</div>
						</a>
							<ul class="vote">
								<li><a title="Like this movie" class="vote_btn" id="vote_<?=$row["movie_id"]?>_1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!" class="cursor"></a></li>
								<li><a title="Don't like this" class="vote_btn" id="vote_<?=$row["movie_id"]?>_-1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"></a></li>
								<li class="trailer">
										<a href="domovie.php?id=<?=$row["movie_id"]?>" title="<?=$row["movie_name"]?>" class="trailer">Trailer</a>
								</li>
							</ul>
							<div class="offset" id="60"></div>
					 </div>

               <?php } ?>

          
         </div>

<?php } ?>

   

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

$(".vote_btn").click( function(){
    var mid = (this.id).split('_')[1];
    var vote = (this.id).split('_')[2];
      $.ajax({
        type: "POST",
        url: "vote.php",
        data: "id="+mid+"&point="+vote,
        error: function(){
          alert("ERROR: Can't send vote!!");
        },
        success: function(msg){
          alert("Thank for vote!");
          <?php
              echo "$(location).attr('href', 'movielist.php')";
          ?>
        }
      });
    });

</script>


</body>
</html>