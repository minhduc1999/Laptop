
<?php
	include('../ketnoi.php');
	$tenLSP = $_POST['tenLSP'];

	
	$sl= mysqli_query($conn,"insert into tbl_loaisanpham(tenLSP) values('$tenLSP')") or die ("Lỗi truy vấn ");
	if($sl){
		header("location: quan_ly_danh_muc.php?");
	}
	else{
		 echo '<p style="color:red; text-align:center;">Thêm lỗi</p>';
	}
?>