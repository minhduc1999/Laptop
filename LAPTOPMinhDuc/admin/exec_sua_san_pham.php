
<?php
	if(isset($_POST['suasp'])){
	include('../ketnoi.php');
	$idSP= $_POST['idSP'];
	$img_location ='../images/product/';
    $image_upload = $_FILES['image']['name'];
	$error= $_FILES['image']['error'];
	$tmp_name= $_FILES['image']['tmp_name'];
		if($image_upload==""){
			$image= $_POST['image'];
		}
		if($image_upload!=""){
			$image= $image_upload;
			$new_img_location= $img_location.basename($image);
			move_uploaded_file($tmp_name,$new_img_location);
			$old_image_location= $img_location.basename($_POST['image']);
			unlink($old_image_location);
		}
	$tenSP = $_POST['tenSP'];
	$giaBan = $_POST['giaBan'];
	$baoHanh = $_POST['baoHanh'];
	$idNSX = $_POST['nhaSanXuat'];
	$idLSP = $_POST['loaiSanPham'];
	$idKM = $_POST['khuyenMai'];


	$cpu = $_POST['cpu'];
	$ram = $_POST['ram'];
	$oCung = $_POST['oCung'];
	$manHinh = $_POST['manHinh'];
	$cardManHinh = $_POST['cardManHinh'];
	$congKetNoi = $_POST['congKetNoi'];
	$heDieuHanh =$_POST['heDieuHanh'];
	$trongLuong = $_POST['trongLuong'];
	$kichThuoc = $_POST['kichThuoc'];
	$namSX = $_POST['namSX'];
	$moTa = $_POST['moTa'];


	$sl= mysqli_query($conn,"UPDATE tbl_sanpham set tenSP = '$tenSP',giaBan = '$giaBan',hinhAnh = '$image',baoHanh = '$baoHanh',idNSX = '$idNSX',idLSP = '$idLSP',idKM = '$idKM' where idSP = '$idSP'") or die ("Lỗi truy vấn ");
	$sl1= mysqli_query($conn,"UPDATE tbl_chitietsanpham set CPU = '$cpu',Ram = '$ram',oCung = '$oCung',manHinh = '$manHinh',cardManHinh = '$cardManHinh' ,congKetNoi = '$congKetNoi',heDieuHanh = '$heDieuHanh',trongLuong = '$trongLuong',kichThuoc = '$kichThuoc',namSX = '$namSX',moTa = '$moTa' where idSP = '$idSP'") or die ("Lỗi truy vấn ");

	if($sl){
		if($sl1){
		echo "<script> alert('Sửa sản phẩm thành công');
		location.href = 'quan_ly_san_pham.php'; </script>";
	}
	else{
		 echo '<p style="color:red; text-align:center;">Sửa không thành công!!!</p>';
	}
}
}
?>