
<?php
	include('../connect.php');
	$tenLSP = $_POST['TenLoai'];

	
	$sl= mysqli_query($conn,"insert into loaisanpham(TenLoai) values('$tenLSP')") or die ("Lỗi truy vấn ");
	if($sl){
		header("location: quan_ly_danh_muc.php?");
	}
	else{
		 echo '<p style="color:red; text-align:center;">Thêm lỗi</p>';
	}
?>