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
    <title>Debate Rank - &quot;<?php echo $_POST["first"] . ' ' . $_POST["last"]?>&quot;</title>
  </head>

  <body>
    <h1>Search for "<?php echo $_POST["first"] . ' ' . $_POST["last"]; ?>"</h1>
    <h2><?php echo mysqli_stmt_num_rows($stmt); ?> results</h2>

    <br><br>

        <table align=center>
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

    <h2 align=center>See duplicates? Report them <a href="mailto:help@debaterank.com?Subject=Duplicate%20name:%20<?php echo $_POST["first"] . '%20' . $_POST["last"]?>">here</a></h2>
    <br>

  </body>

</html>