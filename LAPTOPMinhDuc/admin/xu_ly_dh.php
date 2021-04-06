<?php
	include('../ketnoi.php');
	$madh= $_GET['madh'];
	$sl="UPDATE tbl_donhang set tinhTrang = 'Đã giao' where idDH=".$madh;
	$exec= mysqli_query($conn, $sl);
	if($exec){
		header('location:?danh_sach_don_hang.php');
	}
	else{
		echo "<script> alert('Xử lý thành công'); location.href='danh_sach_don_hang.php'; </script>";
	}
?>