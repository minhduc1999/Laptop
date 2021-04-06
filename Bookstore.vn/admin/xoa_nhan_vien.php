<?php
	include('../connect.php');
	$manv= $_GET['manv'];
	$sl = "DELETE FROM nhanvien where MaNV=".$manv;
	$exec = mysqli_query($conn, $sl);
	if($exec){
		header('location:? quan_ly_nhan_vien.php');
	}
	else{
		echo "<script> alert('Xóa nhân viên thành công'); location.href='quan_ly_nhan_vien.php'; </script>";
	}
?>