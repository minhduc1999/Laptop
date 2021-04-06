<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_admin.php") ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt</th>
            <th>Tình trạng</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $madh = $_GET['madh'];
      $sql ="select * from tbl_donhang where idDH = '$madh' ";
      $exec= mysqli_query($conn, $sql);
      while($row=mysqli_fetch_array($exec)){ 
    ?>
          <tr> 
            <td><?php echo $row['idDH']; ?></td>
            <td><?php echo $row['hoTen']; ?></td>
            <td><?php echo $row['dienThoai']; ?></td>
            <td><?php echo $row['diaChi']; ?></td>
            <td><?php echo number_format($row['tongTien']); ?></td>         
            <td><?php echo $row['ngayDat']; ?></td>
            <td><?php echo $row['tinhTrang']; ?></td>
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
  