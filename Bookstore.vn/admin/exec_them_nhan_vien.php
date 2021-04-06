
<?php
if(isset($_POST['themnv'])){
	include('../connect.php');
	$tenNV = $_POST['tenNV'];
	$gioiTinh = $_POST['gioiTinh'];
	$diaChi = $_POST['diaChi'];
	$ngaySinh = $_POST['ngaySinh'];
	$dienThoai = $_POST['dienThoai'];
	$quyen = $_POST['quyen'];
	$taiKhoan = $_POST['taiKhoan'];
	$matKhau = $_POST['matKhau'];
	
	$sl= mysqli_query($conn,"INSERT into nhanvien(TenNV,GioiTinh,DiaChi,NgaySinh,DienThoai,TaiKhoan,MatKhau,Quyen) values('$tenNV','$gioiTinh','$diaChi','$ngaySinh','$dienThoai','$taiKhoan','$matKhau','$quyen')") or die ("Lỗi truy vấn ");
	if($sl){
		header("location: quan_ly_nhan_vien.php?");
	}
	else{
		 echo '<p style="color:red; text-align:center;">Thêm thất bại</p>';
	}
}
?>