<?php 

function dangky($username,$fullname,$psw,$psw_repeat,$diachi,$sdt,$email){
	$server_name ='localhost';
	$user = 'root';
	$password = '';
	$database_name = 'db_bansach';
	$conn = mysqli_connect($server_name, $user, $password, $database_name);
	mysqli_query($conn,"SET NAMES 'UTF8'");

	$sql = "select * from khachhang where TaiKhoan = '".$username."'";
	$rs = mysqli_query($conn, $sql);

	if($rs){
		if(mysqli_num_rows($rs) > 0){
			echo "<script>alert('Tài khoản này đã được sử dụng');</script>";
		}else{
			if(strlen($username) < 5){
				echo "<script>alert('Tên Đăng Nhập Quá Ngắn');</script>";
			}
			else if($psw != $psw_repeat){
				echo "<script>alert('Mật khẩu nhập lại không khớp');</script>";
			}
			else if(strlen($psw) < 2){
				echo "<script>alert('Mật khẩu phải từ 2 ký tự trở lên');</script>";
			}
			else{
				$query_insert = "INSERT INTO khachhang(TaiKhoan,TenKH,MatKhau,DiaChi,DienThoai,Email) VALUES ('".$username."','".$fullname."','".$psw."','".$diachi."','".$sdt."','".$email."')";
				if($rs_insert = mysqli_query($conn,$query_insert))
					echo "<script>alert('Đăng Ký Thành Công');</script>";
			}

		}
	}
}

function dangNhap($taiKhoan, $pass){
	$server_name ='localhost';
	$user = 'root';
	$password = '';
	$database_name = 'db_bansach';
	$conn = mysqli_connect($server_name, $user, $password, $database_name);

	$query_login = "SELECT * FROM khachhang where TaiKhoan = '".$taiKhoan."' AND MatKhau = '".$pass."'";

	if($rs = mysqli_query($conn,$query_login)){
		if(mysqli_num_rows($rs) > 0){
			return true;
		}else{
			return false;
		}
	}
}

function TachChuoi($str){

	if(strlen($str) > 18){
		return substr($str, 0, 18)." ...";
	}
	return $str;
}

function  getValueProduct($masp, $vitri){
	
	$server_name ='localhost';
	$user = 'root';
	$password = '';
	$database_name = 'db_bansach';
	$conn = mysqli_connect($server_name, $user, $password, $database_name);
	mysqli_query($conn,"SET NAMES 'UTF8'");

	$sql = "select * from sanpham where MaSP = '".$masp."'";

	$value ;
	if($rs = mysqli_query($conn,$sql)){
		while ($row = mysqli_fetch_row($rs)) {
			$value = $row[$vitri];
		}
	}
	return $value;
}

function getValueAD($username, $vt){
	$server_name ='localhost';
	$user = 'root';
	$password = '';
	$database_name = 'db_bansach';

	$conn = mysqli_connect($server_name, $user, $password, $database_name);
	mysqli_query($conn,"SET NAMES 'UTF8'");

	$sql = "select * from nhanvien where TaiKhoan = '".$username."'";

	$value ;
	if($rs = mysqli_query($conn,$sql)){
		while ($row = mysqli_fetch_row($rs)) {
			$value = $row[$vt];
		}
	}
	return $value;
}

function getValueKH($username, $vt){
	$server_name ='localhost';
	$user = 'root';
	$password = '';
	$database_name = 'db_bansach';

	$conn = mysqli_connect($server_name, $user, $password, $database_name);
    mysqli_query($conn,"SET NAMES 'UTF8'");
    
	$sql = "select * from khachhang where TaiKhoan = '".$username."'";

	$value ;
	if($rs = mysqli_query($conn,$sql)){
		while ($row = mysqli_fetch_row($rs)) {
			$value = $row[$vt];
		}
	}
	return $value;
}

function giamSoLuonCon($sanpham,$soluong){
	$server_name ='localhost';
	$user = 'root';
	$password = '';
	$database_name = 'db_bansach';

	$conn = mysqli_connect($server_name, $user, $password, $database_name);

	$sql = "UPDATE sanpham SET SoLuongCon = $soluong WHERE MaSP = '".$sanpham."'";

	if($rs = mysqli_query($conn,$sql)){
		return true;
	}else{
		return false;
	}

}

function CapNhatSoLuong($idDH, $sanpham, $soluong, $gia){
	$server_name ='localhost';
	$user = 'root';
	$password = '';
	$database_name = 'db_bansach';

	$conn = mysqli_connect($server_name, $user, $password, $database_name);

	$sql = "UPDATE chitietdonhang SET SoLuongBan = $soluong , DonGia = $gia WHERE MaDH = '".$idDH."' AND MaSP = '".$sanpham."'";

	if($rs = mysqli_query($conn,$sql)){
		return true;
	}else{
		return false;
	}
}

function TaoOrder($idDH,$sanpham,$soluong,$gia){
	$server_name ='localhost';
	$user = 'root';
	$password = '';
	$database_name = 'db_bansach';

	$conn = mysqli_connect($server_name, $user, $password, $database_name);

	$query_insert_cart = "INSERT INTO chitietdonhang (MaDH,MaSP,SoLuongBan,DonGia) VALUES 
	('".$idDH."','".$sanpham."','".$soluong."','".$gia."')";

	if($rs_insert_cart = mysqli_query($conn,$query_insert_cart)){
		return true;
	}

	return false;

}

function KiemTraOrder($idDH, $sanpham, $soluong_congvao){
	$server_name ='localhost';
	$user = 'root';
	$password = '';
	$database_name = 'db_bansach';

	$conn = mysqli_connect($server_name, $user, $password, $database_name);

	$sql = "SELECT * FROM chitietdonhang WHERE MaDH = '".$idDH."' AND MaSP = '".$sanpham."'";

	$gia = getValueProduct($sanpham,4);
	$soluongcon = getValueProduct($sanpham,5);
	$soluongconsauorder = $soluongcon - $soluong_congvao;

	if($rs = mysqli_query($conn,$sql)){
		if(mysqli_num_rows($rs) > 0){
			while($row = mysqli_fetch_row($rs)){
				$soluong_daco = $row[2];
			}

			$soluong = $soluong_congvao + $soluong_daco;

			$thanhtien = $soluong * $gia;

			CapNhatSoLuong($idDH,$sanpham,$soluong, $thanhtien);

			if(giamSoLuonCon($sanpham,$soluongconsauorder)){
				return true;
			}
		}else{
			$thanhtien_neworder = $gia * $soluong_congvao;

			if(TaoOrder($idDH,$sanpham,$soluong_congvao,$thanhtien_neworder)){
				
				if(giamSoLuonCon($sanpham,$soluongconsauorder)){
					return true;
				}
			}else{
				return false;
			}
		}

	}
	return false;
}



?>