<html>

 <?php
	session_start();
	if(!isset($_POST["first"]) || !isset($_POST["last"])) {
		header('Location: ld.php');
	}
	require_once('php/mysql_connect.php');

	$first = $_POST["first"];
	$last = $_POST["last"];
	$stmt = $dbc->prepare('SELECT id, first, last, school FROM debaters WHERE first=? AND last=?');
	$stmt->bind_param('ss', $first, $last);
	$stmt->execute();
	$stmt->bind_result($id, $first, $last, $school);
	mysqli_stmt_store_result($stmt);
	if(mysqli_stmt_num_rows($stmt) == 0) {
		$_SESSION['errMsg'] = $_POST["first"] . " " . $_POST["last"] . " was not found.";
		header('Location: index.php');
	}
	else if(mysqli_stmt_num_rows($stmt) == 1) {
		$stmt->fetch();
		header('Location: profile.php?id=' . $id);
	}
 ?>
  <head>
    <title>Debate Scout</title>
    <?php include 'templates/headers.html'; ?>

    <link href="css/pages/template.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>

    <?php include 'templates/nav.html'; ?>

    <section class="bg--primary">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <h1>Search for "<?php echo $_POST["first"] . ' ' . $_POST["last"]; ?>"</h1>
                </div>
                <div class="col-sm-2">
                    <h3 align=right><?php echo mysqli_stmt_num_rows($stmt); ?> results</h3>
                </div>
            </div>
        </div>
    </section>

    <br><br>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
        <table class="border--round">
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
				while($stmt->fetch()) {
					echo '<tr><td>' . $first . ' ' . $last . '</td><td>' . $school . '</td><td></td><td><a class="btn btn--lg btn--primary type--uppercase center-block" type=submit href="profile.php?id=' . $id . '"><span class="btn__text">Profile</span></a></td></tr>';
				}
			?>
                </tr>
            </tbody>
        </table>
      </div>
        <div class="col-sm-1"></div>
    </div>

    <h2 align=center>See duplicates? Report them <a href="#">here</a></h2>
    <br>

    <?php include 'templates/scripts.html'; ?>
  </body>

</html>
