<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_admin.php") ?>
<!--sidebar end-->
<!--main content start-->
<?php
  $madh = $_GET["madh"];
  $sql = "SELECT d.MaDH, d.NgayLap, d.TongTien, d.HoTen, d.DiaChi, d.DienThoai , tt.TenTinhTrang, tt.MaTinhTrang FROM donhang d, tinhtrangdonhang tt WHERE d.MaTinhTrang = tt.MaTinhTrang AND MaDH = $madh";
  $exec= mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($exec);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
    </div>
    <fieldset>
  <div style="padding: 10px; color: grey; font-size: 15px"> 
  <legend>Thông tin đơn đặt hàng</legend>
  <div>
    <span>Mã đơn đặt hàng:</span>
    <?php echo $row["MaDH"]; ?>
  </div>
  <div>
    <span>Ngày đặt hàng:</span>
    <?php echo $row["NgayLap"]; ?>
  </div>
  <div>
    <span>Tên khách hàng:</span>
    <?php echo $row["HoTen"]; ?>
  </div>
  <div>
    <span>Số điện thoại:</span>
    <?php echo $row["DienThoai"]; ?>
  </div>
  <div>
    <span>Địa chỉ giao hàng:</span>
    <?php echo $row["DiaChi"]; ?>
  </div>
  <div>
    <span>Tổng thành tiền:</span>
    <?php echo number_format($row['TongTien']); ?> đồng
  </div>
</div>
  <br>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
          </tr>
        </thead>
        <tbody>
        <?php 
         $sql = "SELECT s.TenSP, s.HinhAnh, c.SoLuongBan, c.DonGia FROM chitietdonhang c, sanpham s WHERE c.MaSP = s.MaSP AND c.MaDH = $madh";
      $exec= mysqli_query($conn, $sql);
      $i = 1;
      while($row = mysqli_fetch_array($exec)){ 
    ?>
          <tr> 
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['TenSP']; ?></td>
            <td><img src="../images/product/<?php echo $row['HinhAnh']; ?>" height="100" width="100"></td>
            <td><?php echo $row['SoLuongBan']; ?></td>
            <td><?php echo number_format($row['DonGia']); ?></td>         
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
  