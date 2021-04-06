<?php
	include('../connect.php');
	$madh= $_GET['madh'];
	$sl = "UPDATE donhang set MaTinhTrang = 4 where MaDH=".$madh;

	$sql_chitiet = "SELECT * from chitietdonhang where MaDH =".$madh;
	$rs = mysqli_query($conn, $sql_chitiet);
	if($rs){
		if($row = mysqli_fetch_row($rs)){
			$idSP = $row[1];
			$soluongmua = $row[2];
		}
	}

	$exec = mysqli_query($conn, $sl);
	if($exec){
		$sql_sl = "UPDATE sanpham set SoLuongCon = SoLuongCon + $soluongmua where MaSP = $idSP";
		$rs_sl = mysqli_query($conn, $sql_sl);
		header('location:?danh_sach_don_hang_admin.php');
	}
	else{
		echo "<script> alert('Hủy đơn hàng thành công'); location.href='danh_sach_don_hang_admin.php'; </script>";
	}
?>