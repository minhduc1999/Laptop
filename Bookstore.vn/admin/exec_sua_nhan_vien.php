
<?php
	if(isset($_POST['sua'])){
	include('../connect.php');

	$idNV = $_POST['idNV'];
	$tenNV = $_POST['tenNV'];
	$gioiTinh = $_POST['gioiTinh'];
	$diaChi = $_POST['diaChi'];
	$ngaySinh = $_POST['ngaySinh'];
	$dienThoai = $_POST['dienThoai'];
	$taiKhoan = $_POST['taiKhoan'];
	$matKhau = $_POST['matKhau'];
	$quyen = $_POST['quyen'];

	$sl= mysqli_query($conn,"UPDATE nhanvien set TenNV = '$tenNV',GioiTinh = '$gioiTinh',DiaChi = '$diaChi',NgaySinh = '$ngaySinh',DienThoai = '$dienThoai',TaiKhoan = '$taiKhoan',MatKhau = '$matKhau',Quyen = '$quyen' where MaNV = '$idNV'") or die ("Lỗi truy vấn ");

	if($sl){
		echo "<script> alert('Sửa nhân viên thành công');
		window.location = 'quan_ly_nhan_vien.php'; </script>";
	}else{
		 echo '<p style="color:red; text-align:center;">Sửa không thành công!!!</p>';
	}
}
?>