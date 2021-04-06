<?php
	include('../connect.php');
	$idSP= $_GET['masp'];
	$sl = "DELETE FROM sanpham where MaSP=".$idSP;
	$exec = mysqli_query($conn, $sl);
	if($exec){
		header('location:? quan_ly_san_pham.php');
	}
	else{
		echo "<script> alert('Xóa sản phẩm thành công'); location.href='quan_ly_san_pham.php'; </script>";
	}
?>