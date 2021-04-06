<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_nhanvien.php") ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách khách hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Gmail</th>
            <th>Điện thoại</th>
        	<th>Tài khoản</th>
        	<th>Mật khẩu</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			$sql ="select * from khachhang";
			$exec= mysqli_query($conn, $sql);
			while($row=mysqli_fetch_array($exec)){ 
		?>
          <tr> 
            <td><?php echo $row['MaKH']; ?></td>
            <td><?php echo $row['TenKH']; ?></td>
            <td><?php echo $row['DiaChi']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['DienThoai']; ?></td>
            <td><?php echo $row['TaiKhoan']; ?></td>
            <td><?php echo $row['MatKhau']; ?></td>
            <td>
              <a href="sua_khach_hang.php?makh=<?php echo $row['MaKH']; ?>" class="active ">
                <i class="fa fa-pencil text-success text-active"></i></a>
              </a>
              <a onclick="return confirm('Bạn có muốn xóa không???')" href="xoa_khach_hang.php?makh=<?php echo $row['MaKH']; ?>" class="active ">
                <i class="fa fa-trash text-danger text"></i></a>
              </a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
    </footer>
  </div>
</div>
    </section>
</section>
<!--main content end-->
<?php require ("../admin/include/footer_admin.php") ?>
	