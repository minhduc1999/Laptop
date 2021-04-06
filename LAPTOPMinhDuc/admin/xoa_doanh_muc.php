<?php
	include('../ketnoi.php');
	$idLSP= $_GET['idLSP'];
	$sl = "DELETE FROM tbl_loaisanpham where idLSP=".$idLSP;
	$exec = mysqli_query($conn, $sl);
	if($exec){
		header('location:? quan_ly_danh_muc.php');
	}
	else{
		echo "<script> alert('Xóa danh mục thành công'); location.href='quan_ly_danh_muc.php'; </script>";
	}
?>