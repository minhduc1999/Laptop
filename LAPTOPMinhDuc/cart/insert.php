
<?php
if($action=="insert")
{
  $hoten=$_POST['hoten'];
  $dienthoai=$_POST['dienthoai'];
  $diachi=$_POST['diachi'];
  $email=$_POST['email'];
  $phuongthuc=$_POST['phuongthuc'];
  $ngay=date('Y-m-d');
	if(isset($_SESSION['idnd'])){
		$sql=$conn->query("SELECT * FROM nguoidung WHERE idnd='".$_SESSION['idnd']."'");
		$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
		$idnd=$row['idnd'];
    $sql="INSERT INTO hoadon(idnd,hoten,diachi,dienthoai,email,ngaydathang,trangthai) VALUES 
('$idnd','$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";
  }
	else {
	 $sql="INSERT INTO hoadon(hoten,diachi,dienthoai,email,ngaydathang,trangthai) VALUES 
('$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";
    $conn->query($sql);
	
    $mahd=mysqli_insert_id($conn);
	
    foreach($_SESSION['cart'] as $stt => $soluong)
    {
      $sql="SELECT * FROM sanpham WHERE idsp=$stt";
      $rows=$conn->query($sql);
      $row=mysqli_fetch_array($rows,MYSQLI_ASSOC);
      $tensp=$row['tensp'];
      $gia=$row['gia']*((100-$row['khuyenmai1'])/100);
      $sql1 ="INSERT INTO chitiethoadon(mahd,Tensp,Soluong,gia,phuongthucthanhtoan) VALUES('$mahd','$tensp','$soluong','$gia','$phuongthuc')";
      $conn->query($sql1);
      
    }
    foreach($_SESSION['cart'] as $stt => $soluong)
    {
       
       $sql="SELECT * FROM sanpham WHERE idsp=$stt";
       $rows=mysqli_query($conn,$sql);
       $row=mysqli_fetch_array($rows,MYSQLI_ASSOC);
       $ban=$row['daban']+$soluong;
       $sql="UPDATE sanpham SET daban='$ban' WHERE idsp = $stt";
       mysqli_query($conn,$sql);
    }
	}
  unset($_SESSION['cart']);
}
?>

<?php 
echo "<script language='javascript'>
					alert('Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạn trong thời gian sớm nhất');
								window.open('index.php','_self',3);
			</script>";
?>
