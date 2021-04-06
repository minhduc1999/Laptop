<?php
	if(isset($_POST['submit'])){
	include('connect.php');
	$makh = $_POST['makh'];
	$TaiKhoan = $_POST['TaiKhoan'];
	$old_password= $_POST['old_pass'];	

	$sql= "SELECT * from khachhang where MatKhau='$old_password' and TaiKhoan='$TaiKhoan'";
	$qr= mysqli_query($conn, $sql);
	$num= mysqli_num_rows($qr);
	if($num>0){
	$password= $_POST['new_pass'];

	$re_password= $_POST['re_pass'];

	if($password==$re_password){
	$sl="UPDATE khachhang set MatKhau = '$password' where MaKH = '$makh'";
	$exec= mysqli_query($conn, $sl);
	if(isset($exec)){
		echo "<script> alert('Đổi mật khẩu thành công!!!');</script>";
		echo "<script> location.href='info_khachhang.php?makh=$makh'; </script>";
	}
	else{
		echo "<script> alert('Đổi mật khẩu thất bại!!!');</script>";
		echo "<script> location.href='javascript: history.back(-1);'; </script>";
	}
	}else{
		echo "<script> alert('Mật khẩu bạn nhập lại không đúng');</script>";
		echo "<script> location.href='javascript: history.back(-1);'; </script>";	
	}
}else{
	echo "<script> alert('Mật khẩu cũ không đúng');</script>";
	echo "<script> location.href='javascript: history.back(-1);'; </script>";	
}
}	
?>