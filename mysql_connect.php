<?php

DEFINE ('DB_USER', 'phpconnect');
DEFINE ('DB_PASSWORD', 'T0vpliuOcAIW');
DEFINE ('DB_HOST', '107.180.58.65');
DEFINE ('DB_NAME', 'debaterank');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>