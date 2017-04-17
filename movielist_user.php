
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
  <br>
 <!--movie-->


 <div class="container">

    <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">First Style</a></li>
        <li class="tab col s3"><a href="#test2">Second Style</a></li>
        <li class="tab col s3"><a href="#test4">Thrid Style</a></li>
      </ul>
    </div>

    <div id="test1" class="col s12">
            <br>
            <!-- Poster 1 -->
            <div class="item" id="poster_1">
				<div class="movie_holder" id="loader_1" style="background-image: url('pics/a1.jpg')">
					<div class="hitbox" onmousemove="mousepos(event,1);" onmouseout="hide('info_1');"></div>
						<div id="msg_1"></div>
						<div class="info_holder" id="info_1" style="display: none; position: absolute; left: 283px; top: 451px;">
							<div class="w_content" >
								<div class="blurb">
								<h2>Cop Car</h2>
									<ul class="genre">
										<li class="year">2015</li>
											<li>Thriller</li>					</ul>
								This slowly brews into one of the best thrillers that I’ve seen. Every character and aspect of this script is fully utilized to their potential. Nothing feels like an afterthought. There is even more to consume after the climax, and it’s unnerving. You should see this.
								</div>
								<ul class="allVotes" id="ratings_2529">
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!"><br><span>Like this</span></li>
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-ok.png" alt="It's OK"><br><span>Say It's OK</span></li>
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"><br><span>Don't like</span></li>
								</ul>
							</div>
								<img style="visibility:hidden;" src="images/hurf.gif" onload="loadImg('pics/a1.jpg')" alt="Movie Poster">
							
						</div>
					</div>
					<ul class="vote">
						<li><a title="Like this movie" class="vote_2529_1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!" class="cursor"></a></li>
						<li><a title="This movie is OK" class="vote_2529_0"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-ok.png" alt="It's OK" class="cursor"></a></li>
						<li><a title="Don't like this" class="vote_2529_-1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"></a></li>
						<li class="trailer">
								<a href="https://s3.amazonaws.com/iwalom-videos/ant_man.flv" rel="shadowbox;width=860;height=500" title="Ant-Man" class="trailer">Trailer</a>
						</li>
					</ul>
					<div class="offset" id="60"></div>
			 </div>

			<div class="item" id="poster_2">
				<div class="movie_holder" id="loader_2" style="background-image: url('pics/a2.jpg')">
					<div class="hitbox" onmousemove="mousepos(event,2);" onmouseout="hide('info_2');"></div>
						<div id="msg_2"></div>
						<div class="info_holder" id="info_2" style="display: none; position: absolute; left: 283px; top: 451px;">
							<div class="w_content">
								<div class="blurb">
								<h2>Cop Car</h2>
									<ul class="genre">
										<li class="year">2015</li>
											<li>Thriller</li>					</ul>
								This slowly brews into one of the best thrillers that I’ve seen. Every character and aspect of this script is fully utilized to their potential. Nothing feels like an afterthought. There is even more to consume after the climax, and it’s unnerving. You should see this.
								</div>
								<ul class="allVotes" id="ratings_2529">
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!"><br><span>Like this</span></li>
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-ok.png" alt="It's OK"><br><span>Say It's OK</span></li>
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"><br><span>Don't like</span></li>
								</ul>
							</div>
								<img style="visibility:hidden;" src="images/hurf.gif" onload="loadImg('pics/a2.jpg')" alt="Movie Poster">
							
						</div>
					</div>
					<ul class="vote">
						<li><a title="Like this movie" class="vote_2529_1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!" class="cursor"></a></li>
						<li><a title="This movie is OK" class="vote_2529_0"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-ok.png" alt="It's OK" class="cursor"></a></li>
						<li><a title="Don't like this" class="vote_2529_-1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"></a></li>
						<li class="trailer">
								<a href="https://s3.amazonaws.com/iwalom-videos/ant_man.flv" rel="shadowbox;width=860;height=500" title="Ant-Man" class="trailer">Trailer</a>
						</li>
					</ul>
					<div class="offset" id="60"></div>
			 </div>

			 <div class="item" id="poster_3">
				<div class="movie_holder" id="loader_3" style="background-image: url('pics/a3.jpg')">
					<div class="hitbox" onmousemove="mousepos(event,3);" onmouseout="hide('info_3');"></div>
						<div id="msg_3"></div>
						<div class="info_holder" id="info_3" style="display: none; position: absolute; left: 283px; top: 451px;">
							<div class="w_content">
								<div class="blurb">
								<h2>Cop Car</h2>
									<ul class="genre">
										<li class="year">2015</li>
											<li>Thriller</li>					</ul>
								This slowly brews into one of the best thrillers that I’ve seen. Every character and aspect of this script is fully utilized to their potential. Nothing feels like an afterthought. There is even more to consume after the climax, and it’s unnerving. You should see this.
								</div>
								<ul class="allVotes" id="ratings_2529">
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!"><br><span>Like this</span></li>
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-ok.png" alt="It's OK"><br><span>Say It's OK</span></li>
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"><br><span>Don't like</span></li>
								</ul>
							</div>
								<img style="visibility:hidden;" src="images/hurf.gif" onload="loadImg('pics/a3.jpg')" alt="Movie Poster">
							
						</div>
					</div>
					<ul class="vote">
						<li><a title="Like this movie" class="vote_2529_1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!" class="cursor"></a></li>
						<li><a title="This movie is OK" class="vote_2529_0"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-ok.png" alt="It's OK" class="cursor"></a></li>
						<li><a title="Don't like this" class="vote_2529_-1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"></a></li>
						<li class="trailer">
								<a href="https://s3.amazonaws.com/iwalom-videos/ant_man.flv" rel="shadowbox;width=860;height=500" title="Ant-Man" class="trailer">Trailer</a>
						</li>
					</ul>
					<div class="offset" id="60"></div>
			 </div>

			 <div class="item" id="poster_4">
				<div class="movie_holder" id="loader_4" style="background-image: url('pics/a4.jpg')">
					<div class="hitbox" onmousemove="mousepos(event,4);" onmouseout="hide('info_4');"></div>
						<div id="msg_4"></div>
						<div class="info_holder" id="info_4" style="display: none; position: absolute; left: 283px; top: 451px;">
							<div class="w_content">
								<div class="blurb">
								<h2>Cop Car</h2>
									<ul class="genre">
										<li class="year">2015</li>
											<li>Thriller</li>					</ul>
								This slowly brews into one of the best thrillers that I’ve seen. Every character and aspect of this script is fully utilized to their potential. Nothing feels like an afterthought. There is even more to consume after the climax, and it’s unnerving. You should see this.
								</div>
								<ul class="allVotes" id="ratings_2529">
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!"><br><span>Like this</span></li>
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-ok.png" alt="It's OK"><br><span>Say It's OK</span></li>
									<li>0<img src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"><br><span>Don't like</span></li>
								</ul>
							</div>
								<img style="visibility:hidden;" src="images/hurf.gif" onload="loadImg('pics/a4.jpg')" alt="Movie Poster">
							
						</div>
					</div>
					<ul class="vote">
						<li><a title="Like this movie" class="vote_2529_1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-like.png" alt="Like it!" class="cursor"></a></li>
						<li><a title="This movie is OK" class="vote_2529_0"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-ok.png" alt="It's OK" class="cursor"></a></li>
						<li><a title="Don't like this" class="vote_2529_-1"><img onmouseover="this.className='cursor';" src="https://s3.amazonaws.com/iwalom/images/vote-dislike.png" alt="Dislike"></a></li>
						<li class="trailer">
								<a href="https://s3.amazonaws.com/iwalom-videos/ant_man.flv" rel="shadowbox;width=860;height=500" title="Ant-Man" class="trailer">Trailer</a>
						</li>
					</ul>
					<div class="offset" id="60"></div>
			 </div>
          
         </div>
    <div id="test2" class="col s12"><div class="col l4">
             <li><a class="grey-text text-lighten-3" href="#!">IMAGE4</a></li>
             <li><a class="grey-text text-lighten-3" href="#!">IMAGE5</a></li>
             <li><a class="grey-text text-lighten-3" href="#!">IMAGE6</a></li>
          </div></div>
    <div id="test4" class="col s12"><div class="col l4">
             <li><a class="grey-text text-lighten-3" href="#!">IMAGE7</a></li>
             <li><a class="grey-text text-lighten-3" href="#!">IMAGE8</a></li>
             <li><a class="grey-text text-lighten-3" href="#!">IMAGE9</a></li>
          </div></div>


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
</script>


</body>
</html>