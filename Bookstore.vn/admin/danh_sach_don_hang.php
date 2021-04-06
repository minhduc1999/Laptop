<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_nhanvien.php") ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt</th>
            <th>Tình trạng</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			$sql = "SELECT  d.MaDH, d.HoTen, d.DiaChi, d.DienThoai, d.TongTien, d.NgayLap, t.TenTinhTrang FROM donhang as d, tinhtrangdonhang as t WHERE d.MaTinhTrang = t.MaTinhTrang AND d.MaTinhTrang = 2";
			$exec= mysqli_query($conn, $sql);
			while($row=mysqli_fetch_array($exec)){ 
		?>
          <tr> 
            <td><?php echo $row['MaDH']; ?></td>
            <td><?php echo $row['HoTen']; ?></td>
            <td><?php echo number_format($row['TongTien']); ?></td>         
            <td><?php echo $row['NgayLap']; ?></td>
            <td><?php echo $row['TenTinhTrang']; ?></td>
            <td>
              <a href="xem_chi_tiet_dh.php?madh=<?php echo $row['MaDH']; ?>" class="active ">
                Xem chi tiết</a>      
              <a style="color: red;margin-left: 10px" href="xu_ly_dh.php?madh=<?php echo $row['MaDH']; ?>" class="active ">
                Xử lý đơn</a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
      </div>
    </footer>
  </div>
</div>
    </section>
</section>
<!--main content end-->
<?php require ("../admin/include/footer_admin.php") ?>
	