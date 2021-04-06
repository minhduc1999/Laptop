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
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Ngày sinh</th>
            <th>Điện thoại</th>
            <th>Quyền</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			$sql ="select * from tbl_nhanvien where idNV > '1'";
			$exec= mysqli_query($conn, $sql);
			while($row=mysqli_fetch_array($exec)){ 
		?>
          <tr> 
            <td><?php echo $row['idNV']; ?></td>
            <td><?php echo $row['tenNV']; ?></td>
            <td><?php echo $row['gioiTinh']; ?></td>
            <td><?php echo $row['diaChi']; ?></td>
            <td><?php echo $row['ngaySinh']; ?></td>
            <td><?php echo $row['dienThoai']; ?></td>
            <td><?php echo $row['quyen']; ?></td>
            <td>
              <a href="sua_nhan_vien.php?manv=<?php echo $row['idNV']; ?>" class="active ">
                <i class="fa fa-pencil text-success text-active"></i></a>
              </a>
              <a onclick="return confirm('Bạn có muốn xóa không???')" href="xoa_nhan_vien.php?idNV=<?php echo $row['idNV']; ?>" class="active ">
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
	