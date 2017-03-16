<?php
	$HOST="localhost";
	$USER="root";
	$PASS="";
	$DB="online";
	$con=mysqli_connect($HOST,$USER,$PASS,$DB);
	if(!$con){
		echo "Database Connection Error!";
	}
?>