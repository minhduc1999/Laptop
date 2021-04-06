
<?php
	if(isset($_POST['sua'])){
	include('../connect.php');

	$idKH = $_POST['MaKH'];
	$tenKH = $_POST['tenKH'];
	$diaChi = $_POST['diaChi'];
	$gmail = $_POST['gmail'];
	$dienThoai = $_POST['dienThoai'];
	$taiKhoan = $_POST['taiKhoan'];
	$matKhau = $_POST['matKhau'];

	$sl= mysqli_query($conn,"UPDATE khachhang set TenKH = '$tenKH',Email = '$gmail',DienThoai = '$dienThoai',diaChi = '$diaChi',TaiKhoan = '$taiKhoan',MatKhau = '$matKhau' where MaKH = '$idKH'") or die ("Lỗi truy vấn ");

	if($sl){
		echo "<script> alert('Sửa khách hàng thành công');
		window.location = 'quan_ly_khach_hang.php'; </script>";
	}else{
		 echo '<p style="color:red; text-align:center;">Sửa không thành công!!!</p>';
	}
}
?>