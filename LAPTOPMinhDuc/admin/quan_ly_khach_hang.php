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
            <th>Ngày sinh</th>
            <th>Điện thoại</th>
        	<th>Tài khoản</th>
        	<th>Mật khẩu</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			$sql ="select * from tbl_khachhang";
			$exec= mysqli_query($conn, $sql);
			while($row=mysqli_fetch_array($exec)){ 
		?>
          <tr> 
            <td><?php echo $row['idKH']; ?></td>
            <td><?php echo $row['tenKH']; ?></td>
            <td><?php echo $row['diaChi']; ?></td>
            <td><?php echo $row['ngaySinh']; ?></td>
            <td><?php echo $row['dienThoai']; ?></td>
            <td><?php echo $row['taiKhoan']; ?></td>
            <td><?php echo $row['matKhau']; ?></td>
            <td>
              <a href="#" class="active ">
                <i class="fa fa-pencil text-success text-active"></i></a>
              </a>
              <a onclick="return confirm('Bạn có muốn xóa không???')" href="xoa_khach_hang.php?idkh=<?php echo $row['idKH']; ?>" class="active ">
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
	