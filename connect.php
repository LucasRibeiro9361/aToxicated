<?php
	$conn = new mysqli('localhost', 'root', 'usbw', 'db_atoxicated');
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	$conn->set_charset("utf8");
	

?>
