<?php require ("include/header.php") ?>

<?php 
if(isset($_SESSION['user'])){
	$sanpham = $_POST['sanpham'];
	$soluongcapnhat = $_POST['so-luong-cap-nhat'];
	$soluonghiencon = getValueProduct($sanpham, 5);
	$gia = $_POST['gia'];
	$soluongtronggiohang = $_SESSION['gio-hang'][$sanpham];
	if ($soluongcapnhat <= 0){
		$_SESSION['gio_hang_soluong']--;
		$_SESSION['gio_hang_tongtien'] -= $gia*$soluongtronggiohang;
		unset($_SESSION['gio_hang'][$sanpham]);
		echo "<script> alert('Cập nhật giỏ hàng thành công!!!)</script>";
		echo "<script> window.location = 'gio_hang.php';</script>";
	}
	if ($soluongcapnhat > $soluonghiencon){
		echo "<script> alert('Số lượng cập nhật vượt quá số lượng còn!!!')</script>";
		echo "<script> window.location = 'gio_hang.php';</script>";
	}
	if ($soluongcapnhat > $soluongtronggiohang){
		$_SESSION['gio_hang_tongtien'] += $gia*($soluongcapnhat-$soluongtronggiohang);
		$_SESSION['gio_hang'][$sanpham] = $soluongcapnhat;
		echo "<script> alert('Cập nhật giỏ hàng thành công!)</script>";
		echo "<script> window.location = 'gio_hang.php';</script>";
	}
	else {
		$_SESSION['gio_hang_tongtien'] -= $gia*($soluongtronggiohang-$soluongcapnhat);
		$_SESSION['gio_hang'][$sanpham] = $soluongcapnhat;
		echo "<script> alert('Cập nhật giỏ hàng thành công!!!)</script>";
		echo "<script> window.location = 'gio_hang.php';</script>";
	}
}else{
	echo "<script> window.location = 'dang_nhap.php';</script>";
}
?>