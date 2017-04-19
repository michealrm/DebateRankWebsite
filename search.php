<html>

 <?php
	session_start();
	if(!isset($_POST["first"]) || !isset($_POST["last"])) {
		header('Location: index.html');
	}
	require_once('php/mysql_connect.php');
	$first = $_POST["first"];
	$last = $_POST["last"];
	$stmt = $dbc->prepare('SELECT id, first, last, school FROM debaters WHERE first=? AND last=?');
	$stmt->bind_param('ss', $first, $last);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows == 0) {
		$_SESSION['errMsg'] = $_POST["first"] . " " . $_POST["last"] . " was not found.";
		header('Location: index.php');
	}
	else if($result->num_rows == 1) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		header('Location: profile.php?id=' . $row["id"]);
	}
 ?>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="css/pages/template.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Debate Scout</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="#">Store</a></li>
          <li><a href="#">About Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>

    <section class="bg--primary">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <h1>Search for "<?php echo $_POST["first"] . ' ' . $_POST["last"]; ?>"</h1>
                </div>
                <div class="col-sm-2">
                    <h3 align=right><?php echo $result->num_rows; ?> results</h3>
                </div>
            </div>
        </div>
    </section>

    <br><br>

    <div class="row">
        <div class="col-sm-1"></div>
        <table class="border--round col-sm-10">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>School</th>
                    <th>Year</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
			<?php
				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					echo '<tr><td>' . $row['first'] . ' ' . $row['last'] . '</td><td>' . $row['school'] . '</td><td></td><td><a class="btn btn--lg btn--primary type--uppercase center-block" type=submit href="profile.php?id=' . $row['id'] . '"><span class="btn__text">Profile</span></a></td></tr>';
				}
			?>
                </tr>
            </tbody>
        </table>
        <div class="col-sm-1"></div>
    </div>

    <h2 align=center>See duplicates? Report them <a href="#">here</a></h2>
    <br>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>

</html>