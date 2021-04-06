<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_nhanvien.php") ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá bán</th>
            <th>Số lượng</th>
            <th>Ngày phát hành</th>
            <th>Hình ảnh</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			$sql ="select * from sanpham";
			$exec= mysqli_query($conn, $sql);
			while($row=mysqli_fetch_array($exec)){ 
		?>
          <tr> 
            <td><?php echo $row['MaSP']; ?></td>
            <td><?php echo $row['TenSP']; ?></td>
            <td><?php echo number_format($row['DonGia']); ?> đ</td>
            <td><?php echo $row['SoLuongCon']; ?></td>
            <td><?php echo $row['NgayPhatHanh']; ?></td>
            <td><img src="../images/product/<?php echo $row['HinhAnh']; ?>" height="100" width="100"></td>
            <td>
              <a href="sua_san_pham.php?masp=<?php echo $row['MaSP']; ?>" class="active ">
                <i class="fa fa-pencil text-success text-active"></i></a>
              </a>
              <a onclick="return confirm('Bạn có muốn xóa không???')" href="xoa_san_pham.php?masp=<?php echo $row['MaSP']; ?>" class="active ">
                <i class="fa fa-trash text-danger text"></i></a>
              </a>
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
	