<?php
	include('../ketnoi.php');
	$idkh= $_GET['idkh'];
	$sl = "DELETE FROM tbl_khachhang where idKH=".$idkh;
	$exec = mysqli_query($conn, $sl);
	if($exec){
		header('location:? quan_ly_khach_hang.php');
	}
	else{
		echo "<script> alert('Xóa khách hàng thành công'); location.href='quan_ly_khach_hang.php'; </script>";
	}
?>