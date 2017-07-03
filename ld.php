<?php
session_start();
?>
<html>

  <head>
    <title>Debate Rank - LD Search</title>
    <?php include 'templates/headers.html'; ?>
    <link href="css/pages/index.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>
    <?php include 'templates/nav.html'; ?>
    <form class="container centercontainer" method="post" action="search.php">
      <h1 class="color--primary" align=center>Debate Rank</h1>
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

    <?php include 'templates/scripts.html'; ?>
  </body>

</html>