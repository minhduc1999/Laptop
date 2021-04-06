
<?php
	if(isset($_POST['them'])){
	include('../connect.php');
	$img_location ='../images/product/';
	if($_FILES['image']['name']!=""){
		$image = $_FILES['image']['name'];
		$error= $_FILES['image']['error'];
		$tmp_name= $_FILES['image']['tmp_name'];
		$img_local= $img_location.basename($image);
		if(move_uploaded_file($tmp_name, $img_local)){

		}else{
			unlink('../images/product/'.$image);
		}	
	$tenSP = $_POST['tenSP'];
	$giaBan = $_POST['giaBan'];
	if($giaBan ==""){
		echo "<script> alert('Giá sản phẩm không được để trống'); </script> ";
	}
	$sql= "select max(MaSP) from sanpham";
	$qr= mysqli_query($conn, $sql);
	$row= mysqli_fetch_array($qr);
	$masp= $row['max(MaSP)']+1;
	$soluong=$_POST['soLuong'];
	if($soluong==""){
		$soluong=0;
	}
	$loaiSanPham = $_POST['loaiSanPham'];
	$nhaxuatban = $_POST['nhaXuatBan'];
	$khoiLuong  = $_POST['khoiLuong'];
	$ngayPhatHanh = $_POST['ngayPhatHanh'];
	$kichThuoc = $_POST['kichThuoc'];
	$soTrang = $_POST['soTrang'];
	$ngonNgu = $_POST['ngonNgu'];
	$tacgia = $_POST['tacGia'];
	$moTa = $_POST['moTa'];


	$sl= mysqli_query($conn,"insert into sanpham(MaSP,TenSP,MaLoai,HinhAnh,DonGia,SoLuongCon,NhaXuatBan,KhoiLuong,NgayPhatHanh,KichThuoc,SoTrang,NgonNgu,TacGia,MoTa) values('$masp','$tenSP','$loaiSanPham','$image','$giaBan','$soluong','$nhaxuatban','$khoiLuong','$ngayPhatHanh','$kichThuoc','$soTrang','$ngonNgu','$tacgia','$moTa')") or die ("Lỗi truy vấn ");
	if($sl){
		header("location: quan_ly_san_pham.php?");
	}
	else{
		 echo '<p style="color:red; text-align:center;">Thêm lỗi</p>';
	}
}
}
?>