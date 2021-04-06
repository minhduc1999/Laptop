<?php require '../connect.php';?>
<?php
    $sql = "SELECT COUNT(MaNV) FROM nhanvien WHERE Quyen = 2";
    $result = mysqli_query($conn, $sql);
    $row  = mysqli_fetch_array($result);
    $soNhanVien = $row[0];
    $sql = "SELECT COUNT(MaDH) FROM donhang WHERE MaTinhTrang = 1";
    $result = mysqli_query($conn, $sql);
    $row  = mysqli_fetch_array($result);
    $soDonHangMoi = $row[0];
    $sql = "SELECT COUNT(MaDH) FROM donhang WHERE MaTinhTrang = 2";
    $result = mysqli_query($conn, $sql);
    $row  = mysqli_fetch_array($result);
    $soDonHangDangXuLy = $row[0];
    $sql = "SELECT COUNT(MaDH) FROM donhang WHERE MaTinhTrang = 3";
    $result = mysqli_query($conn, $sql);
    $row  = mysqli_fetch_array($result);
    $soDonHangDaGiao = $row[0];
?>
<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_admin.php") ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h2>Xin chào quản trị viên</h2>
        <hr>
			<div style="margin-top: 10px;padding:10px" class="container">
   			<div>
       		 <a style="color: black; font-size: 20px">Số nhân viên đang làm: </a> <a style="color: red;font-size: 20px"><span style="color: red"><?=$soNhanVien;?></span></a></br>
        	 <a style="color: black; font-size: 20px">Số đơn hàng mới: </a> <a style="color: red;font-size: 20px"><span style="color: red"><?=$soDonHangMoi;?></span></a></br>
      	    <a style="color: black; font-size: 20px">Số đơn hàng đang đợi xử lý: </a> <a style="color: red;font-size: 20px"><span style="color: red"><?=$soDonHangDangXuLy;?></span></a></br>
      	    <a style="color: black; font-size: 20px">Số đơn hàng đã giao: </a> <a style="color: red;font-size: 20px"><span style="color: red"><?=$soDonHangDaGiao;?></span></a>
   			</div>
    </section>
</section>
<!--main content end-->
<?php require ("../admin/include/footer_admin.php") ?>
