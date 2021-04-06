<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_admin.php") ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách nhân viên
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên nhân viên</th>
            <th>Địa chỉ</th>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Điện thoại</th>
            <th>Quyền</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			$sql ="select * from nhanvien where MaNV > '1'";
			$exec= mysqli_query($conn, $sql);
			while($row=mysqli_fetch_array($exec)){ 
		?>
          <tr> 
            <td><?php echo $row['MaNV']; ?></td>
            <td><?php echo $row['TenNV']; ?></td>
            <td><?php echo $row['DiaChi']; ?></td>
            <td><?php echo $row['TaiKhoan']; ?></td>
            <td><?php echo $row['MatKhau']; ?></td>
            <td><?php echo $row['DienThoai']; ?></td>
            <td><?php echo $row['Quyen']; ?></td>
            <td>
              <a href="sua_nhan_vien.php?manv=<?php echo $row['MaNV']; ?>" class="active ">
                <i class="fa fa-pencil text-success text-active"></i></a>
              </a>
              <a onclick="return confirm('Bạn có muốn xóa không???')" href="xoa_nhan_vien.php?manv=<?php echo $row['MaNV']; ?>" class="active ">
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
        <div class="col-sm-7 text-right text-center-xs">                
 
        </div>
      </div>
    </footer>
  </div>
</div>
    </section>
</section>
<!--main content end-->
<?php require ("../admin/include/footer_admin.php") ?>
	