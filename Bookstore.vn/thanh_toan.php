<?php require ("include/header.php") ?>
<?php 
	if (isset($_SESSION['user'])){
		if (isset($_SESSION['gio_hang'])) {
			$id = getValueKH($_SESSION['user'],0);
			$fullname = getValueKH($_SESSION['user'],1);
			$address = getValueKH($_SESSION['user'],6);
			$phone = getValueKH($_SESSION['user'],5);
			$mail = getValueKH($_SESSION['user'],4);
			$tongtien = $_SESSION['gio_hang_tongtien'];
			$query_insert = "INSERT INTO donhang(MaKH,MaNV,HoTen,DienThoai,DiaChi,TongTien,MaTinhTrang) Values('$id','1','$fullname','$phone','$address','$tongtien', '1')";
			$rq = mysqli_query($conn, $query_insert);

			if ($rq){
				foreach ($_SESSION['gio_hang'] as $key => $value) {
				# code...
					$query_select = "SELECT Max(MaDH) FROM donhang";
					$id_donhang = mysqli_fetch_row(mysqli_query($conn, $query_select))[0];
					$gia = getValueProduct($key,4)*$value;
					$idsp = getValueProduct($key,0);
					$query_insert_ct = "INSERT INTO chitietdonhang(MaDH,MaSP,SoLuongBan,DonGia) Values('$id_donhang','$idsp', '$value', '$gia')";
					$rq2 = mysqli_query($conn, $query_insert_ct);

					$soluongcon = getValueProduct($key,5) - $value;
					$query_sl = "UPDATE sanpham set SoLuongCon = $soluongcon where MaSP = $idsp";
					$rq3 = mysqli_query($conn, $query_sl);

					$to = $mail;
					$mess = "Đặt hàng thành công!!!Đơn hàng của bạn sẽ được chuyển sau 3 ngày nữa!!!";
					$sub = "Simple Email Test via PHP";
					$headers = "MIME-Version: 1.0"."\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
					$headers .= 'From: <mduc221199@gmail.com>'."\r\n";

					if(mail($to,$sub,$mess,$headers)){
						echo "Kiểm tra mail";
					}else{
						echo "Fail";
					}
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