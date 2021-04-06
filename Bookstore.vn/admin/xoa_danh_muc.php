<?php
	include('../connect.php');
	$idLSP= $_GET['MaLoai'];
	$sl = "DELETE FROM loaisanpham where MaLoai=".$idLSP;
	$exec = mysqli_query($conn, $sl);
	if($exec){
		header('location:? quan_ly_danh_muc.php');
	}
	else{
		echo "<script> alert('Xóa danh mục thành công'); location.href='quan_ly_danh_muc.php'; </script>";
	}
?>