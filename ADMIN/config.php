<?php
// database credentials
define('DB_SERVER','127.0.0.1');
define('DB_USERNAME', 'u712713341_M06nY');
define('DB_PASSWORD', 'OnlyGoods.MNL2022');
define('DB_NAME', 'u712713341_cArXN');

// attempt to connect on the database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// check if connection is successful
if ($link === false) {
	die("ERROR: Could not connect " . mysqli_connect());
}

// time zone
date_default_timezone_set('Asia/Manila');
?>