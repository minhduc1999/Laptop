
<?php
	if(isset($_POST['them'])){
	include('../ketnoi.php');
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
	$sql= "select max(idSP) from tbl_sanpham";
	$qr= mysqli_query($conn, $sql);
	$row= mysqli_fetch_array($qr);
	$masp= $row['max(idSP)']+1;
	$soluong=$_POST['soLuong'];
	if($soluong==""){
		$soluong=0;
	}
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


	$sl= mysqli_query($conn,"insert into tbl_sanpham(idSP,tenSP,giaBan,hinhAnh,soLuong,baoHanh,idNSX,idLSP,idKM) values('$masp','$tenSP','$giaBan','$image','$soluong','$baoHanh','$idNSX','$idLSP','$idKM')") or die ("Lỗi truy vấn ");
	$sl1= mysqli_query($conn,"insert into tbl_chitietsanpham(CPU,Ram,oCung,manHinh,cardManHinh,congKetNoi,heDieuHanh,trongLuong,kichThuoc,namSX,moTa,idSP) values('$cpu','$ram','$oCung','$manHinh','$cardManHinh','$congKetNoi','$heDieuHanh','$trongLuong','$kichThuoc','$namSX','$moTa','$masp')") or die ("Lỗi truy vấn ");
	if($sl){
		header("location: quan_ly_san_pham.php?");
	}
	else{
		 echo '<p style="color:red; text-align:center;">Thêm lỗi</p>';
	}
}
}
?>