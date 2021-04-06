<?php require ("include/header.php") ?>
<?php 
	if (isset($_SESSION['user'])){
		if (isset($_SESSION['gio_hang'])) {
			$id = getValueKH($_SESSION['user'],0);
			$fullname = getValueKH($_SESSION['user'],1);
			$address = getValueKH($_SESSION['user'],3);
			$phone = getValueKH($_SESSION['user'],5);
			$tongtien = $_SESSION['gio_hang_tongtien'];
			$query_insert = "INSERT INTO tbl_donhang(idKH,idNV,diaChi,hoTen,dienThoai,tongTien,tinhTrang) Values('$id','2','$address','$fullname','$phone','$tongtien', 'Chờ xử lý')";
			$rq = mysqli_query($conn, $query_insert);

			if ($rq){
				foreach ($_SESSION['gio_hang'] as $key => $value) {
				# code...
					$query_select = "SELECT Max(idDH) FROM tbl_donhang";
					$id_donhang = mysqli_fetch_row(mysqli_query($conn, $query_select))[0];
					$gia = getValueProduct($key,2)*$value;
					$idsp = getValueProduct($key,0);
					$query_insert_ct = "INSERT INTO tbl_chitietdonhang(idDH,idSP,soLuong,thanhTien) Values('$id_donhang','$idsp', '$value', '$gia')";
					$rq2 = mysqli_query($conn, $query_insert_ct);

					$soluongcon = getValueProduct($key,4) - $value;
					$query_sl = "UPDATE tbl_sanpham set soLuong = $soluongcon where idSP = $idsp";
					$rq3 = mysqli_query($conn, $query_sl);
				}
			}

			unset($_SESSION['gio_hang']);
			unset($_SESSION['gio_hang_tongtien']);
			unset($_SESSION['gio_hang_soluong']);
			echo "<script> alert('Đặt mua hàng thành công!)</script>";
			echo "<script> window.location = 'index.php';</script>";
		}
	}
?>