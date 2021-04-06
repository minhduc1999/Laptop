<?php
	include('../connect.php');
	$makh= $_GET['makh'];
	$sl = "DELETE FROM khachhang where MaKH=".$makh;
	$exec = mysqli_query($conn, $sl);
	if($exec){
		header('location:? quan_ly_khach_hang.php');
	}
	else{
		echo "<script> alert('Xóa khách hàng thành công'); location.href='quan_ly_khach_hang.php'; </script>";
	}
?>