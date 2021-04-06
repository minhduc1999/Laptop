<?php session_start(); ?>
<?php
	include('../connect.php');
	$madh= $_GET['madh'];
	$manv = $_SESSION['MaNV'];

	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$ngaygiao = date("Y-m-d");

	$sl="UPDATE donhang set MaTinhTrang = 3, MaNV = $manv, NgayGiao = '$ngaygiao' where MaDH=".$madh;
	$exec= mysqli_query($conn, $sl);
	if($exec){
		header('location:?danh_sach_don_hang.php');
	}
	else{
		echo "<script> alert('Xử lý thành công'); location.href='danh_sach_don_hang.php'; </script>";
	}
?>