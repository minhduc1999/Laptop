
<?php
	if(isset($_POST['suasp'])){
	include('../connect.php');
	$idSP= $_POST['MaSP'];
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
	$nhaXuatBan = $_POST['nhaXuatBan'];
	$khoiLuong = $_POST['khoiLuong'];
	$ngayPhatHanh = $_POST['ngayPhatHanh'];
	$kichThuoc = $_POST['kichThuoc'];
	$soTrang = $_POST['soTrang'];
	$ngonNgu = $_POST['ngonNgu'];
	$tacGia = $_POST['tacGia'];
	$loaiSanPham = $_POST['loaiSanPham'];
	$moTa = $_POST['moTa'];

	$sl= mysqli_query($conn,"UPDATE sanpham set TenSP = '$tenSP', MaLoai = $loaiSanPham,HinhAnh = '$image',DonGia = '$giaBan',NhaXuatBan = '$nhaXuatBan',KhoiLuong = '$khoiLuong',NgayPhatHanh = '$ngayPhatHanh',KichThuoc = '$kichThuoc',SoTrang = '$soTrang',NgonNgu = '$ngonNgu',TacGia = '$tacGia',MoTa = '$moTa' where MaSP = '$idSP'") or die ("Lỗi truy vấn ");

	if($sl){
		echo "<script> alert('Sửa sản phẩm thành công');
		location.href = 'quan_ly_san_pham.php'; </script>";
	}
	else{
		 echo '<p style="color:red; text-align:center;">Sửa không thành công!!!</p>';
	}
}
?>