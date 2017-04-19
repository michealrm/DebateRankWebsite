<?php
session_start();
?>
<html>

  <head>
    <meta charset="utf-8">
    <title>Debate Scout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i%7CMaterial+Icons" rel="stylesheet">

    <link href="css/pages/index.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>
    <form class="container centercontainer" method="post" action="search.php">
      <h1 class="color--primary" align=center>Debate Scout</h1>
      <div class="typed-headline hidden-xs" align=center>
          <span class="h4 inline-block">Search for </span>
          <span class="h4 inline-block typed-text typed-text--cursor color--primary" data-typed-strings="round history, tabroom results,bids,state points,videos,joyoftournaments results,disclosed positions,NSDA points"></span>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <input type="text" name="first" placeholder="First" />
        </div>
		<div class="col-sm-5">
          <input type="text" name="last" placeholder="Last" />
        </div>
        <input class="btn btn--lg btn--primary type--uppercase col-sm-2 center-block" type="submit" value="Search"></input>
      </div>
	  <?php
	  if(!empty($_SESSION['errMsg'])) {
		  echo '<div id="row"><center>' . $_SESSION['errMsg'] . '</center></row>';
		  unset($_SESSION['errMsg']);
	  }
	  ?>
      <div align=center>
        <a href="#">Terms of Service</a> |
        <a href="#">Privacy Policy</a> |
        <a href="#">Store</a> |
        <a href="#">About Us</a> |
        <a href="#">Contact Us</a>
      </div>

    </form>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/flickity.min.js"></script>
    <script src="js/easypiechart.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/typed.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/ytplayer.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/granim.min.js"></script>
    <script src="js/countdown.min.js"></script>
    <script src="js/twitterfetcher.min.js"></script>
    <script src="js/spectragram.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>

</html>