<?php
	if(isset($_POST['submit'])){
	include('connect.php');

	$MaKH = $_POST['MaKH'];
	$HoTen = $_POST['HoTen'];
	$gioiTinh = $_POST['GioiTinh'];
	$diaChi = $_POST['DiaChi'];
	$ngaySinh = $_POST['NgaySinh'];
	$dienThoai = $_POST['DienThoai'];
	$Email = $_POST['Email'];


	$sl= mysqli_query($conn,"UPDATE khachhang set TenKH = '$HoTen',GioiTinh = '$gioiTinh',DiaChi = '$diaChi',NgaySinh = '$ngaySinh',DienThoai = '$dienThoai',Email = '$Email' where MaKH = '$MaKH'") or die ("Lỗi truy vấn ");

	if($sl){
		echo "<script> alert('Cập nhật thành công');";
		header("location: info_khachhang.php?makh=$MaKH");
	}else{
		 echo '<p style="color:red; text-align:center;">Sửa không thành công!!!</p>';
	}
}
?>