<?php
	if(isset($_POST['sua'])){
	include('../connect.php');

	$idLoai = $_POST['MaLoai'];
	$tenLoai = $_POST['tenLoai'];

	$sl= mysqli_query($conn,"UPDATE loaisanpham set TenLoai = '$tenLoai' where MaLoai= '$idLoai'") or die ("Lỗi truy vấn ");

	if($sl){
		echo "<script> alert('Sửa danh mục thành công');
		window.location = 'quan_ly_danh_muc.php'; </script>";
	}else{
		 echo '<p style="color:red; text-align:center;">Sửa không thành công!!!</p>';
	}
}
?>