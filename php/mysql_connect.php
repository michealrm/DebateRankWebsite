<?php

DEFINE ('DB_USER', 'debatescouttest');
DEFINE ('DB_PASSWORD', 'Taboo0522');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'debatescout');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>