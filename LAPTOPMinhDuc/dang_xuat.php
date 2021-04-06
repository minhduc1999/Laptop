<?php 
	session_start();
	unset($_SESSION['user']);
	echo "<script> alert('Đăng xuất thành công!!!');</script>";
	echo "<script> window.location = 'index.php';</script>";
 ?>