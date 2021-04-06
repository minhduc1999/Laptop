<?php
	include('../ketnoi.php');
	$madh= $_GET['madh'];
	$sl = "DELETE FROM tbl_donhang where idDH=".$madh;

	$sql_chitiet = "SELECT * from tbl_chitietdonhang where idDH =".$madh;
	$rs = mysqli_query($conn, $sql_chitiet);
	if($rs){
		if($row = mysqli_fetch_row($rs)){
			$idSP = $row[1];
			$soluongmua = $row[2];
		}
	}

	$exec = mysqli_query($conn, $sl);
	if($exec){
		$sql_sl = "UPDATE tbl_sanpham set soLuong = soLuong + $soluongmua where idSP = $idSP";
		$rs_sl = mysqli_query($conn, $sql_sl);
		header('location:?danh_sach_don_hang_admin.php');
	}
	else{
		echo "<script> alert('Xóa sản phẩm thành công'); location.href='danh_sach_don_hang_admin.php'; </script>";
	}
?>