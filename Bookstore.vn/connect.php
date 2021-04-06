<?php
	$conn= mysqli_connect("localhost","root","");
	mysqli_select_db($conn, "db_bansach");
	mysqli_query($conn, "SET names 'utf8'");
	if(!$conn){
		echo "Không thể kết nối đến Database!".mysqli_connect_error($conn);
	}
?>