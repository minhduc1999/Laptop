<?php require '../connect.php';?>
<?php
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
<?php require ("../admin/include/main_nhanvien.php") ?>
<!--sidebar end-->
<!--main content start-->

<section id="main-content">
	<section class="wrapper">
		<h2>Xin chào nhân viên: <span style="color: lightblue"><?php echo $name?></span></h2>
		<hr>
			<div style="margin-top: 10px;padding:10px" class="container">
      	    <a style="color: black; font-size: 20px">Số đơn hàng đang đợi xử lý: </a> <a style="color: red;font-size: 20px"><?=$soDonHangDangXuLy;?></a></br>
      	    <a style="color: black; font-size: 20px">Số đơn hàng đã giao: </a> <a style="color: red;font-size: 20px"><?=$soDonHangDaGiao;?></a>
   			</div>
</div>
    </section>
</section>
<!--main content end-->
<?php require ("../admin/include/footer_admin.php") ?>
