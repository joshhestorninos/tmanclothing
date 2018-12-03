<?php
	$conn = mysqli_connect('localhost', 'root', '', 'sample');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>