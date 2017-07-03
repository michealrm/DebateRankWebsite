<?php
session_start();
?>
<html>

  <head>
    <title>Debate Rank - Home</title>
  </head>

  <body>
    <a href="index.html">Home</a>
    <p>Search for debaters e.g. &quot;Micheal Myers&quot;, &quot;Myers and Friedberg&quot;, &quot;John Friedberg and Sophia Carranco&quot;</p>
    <form method="post" action="ld_search.php">
      <center><input type="text" name="first" value="First"> <input type="text" name="last" value="Last"><center>
	    <center><input type="submit" value="Search"></input><center>
	  <?php
	  if(!empty($_SESSION['errMsg'])) {
		  echo '<div>' . $_SESSION['errMsg'] . '</row>';
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
  </body>

</html>