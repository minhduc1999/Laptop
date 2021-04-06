<?php
	include('../connect.php');
	$madh= $_GET['madh'];
	$sl="UPDATE donhang set MaTinhTrang = 2 where MaDH =".$madh;
	$exec= mysqli_query($conn, $sl);
	if($exec){
		header('location:?duyet_don_hang.php');
	}
	else{
		echo "<script> alert('Duyệt sản phẩm thành công'); location.href='duyet_don_hang.php'; </script>";
	}
?>