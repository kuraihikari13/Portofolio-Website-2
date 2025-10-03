<?php
	
	$con = mysqli_connect("localhost", "root", "", "amaliyah");

	if(mysqli_connect_errno())
	{
		echo "Database Connection Failed";
	}
?>