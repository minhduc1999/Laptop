<?php
	include('../ketnoi.php');
	$idNV= $_GET['idNV'];
	$sl = "DELETE FROM tbl_nhanvien where idNV=".$idNV;
	$exec = mysqli_query($conn, $sl);
	if($exec){
		header('location:? quan_ly_nhan_vien.php');
	}
	else{
		echo "<script> alert('Xóa nhân viên thành công'); location.href='quan_ly_nhan_vien.php'; </script>";
	}
?>