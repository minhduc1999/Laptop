<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_admin.php") ?>

<?php 
if(isset($_GET['manv'])){

	$manv = $_GET['manv'];
	$sql_select_nv = "select * from nhanvien where MaNV = '$manv'";
	$rs = mysqli_query($conn, $sql_select_nv);

	if($rs){
		if($row = mysqli_fetch_row($rs)){
			$tenNV = $row[1];
			$gioiTinh = $row[2];
			$ngaySinh = $row[3];
			$dienThoai = $row[4];
            $diaChi = $row[5];
			$taiKhoan = $row[6];
			$matKhau = $row[7];
			$quyen = $row[8];	
		}
	}
}
?>

<section id="main-content">
	<section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT NHÂN VIÊN
                        </header>

                        <div class="panel-body">
                            <div class="position-center">
                        <form role="form" action="exec_sua_nhan_vien.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6 col-sm-7">
                                    <input type="hidden" name="idNV" class="form-control" id="exampleInputEmail1" value="<?php echo $manv ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Tên nhân viên</label>
                                    <input type="text" name="tenNV" class="form-control" id="exampleInputEmail1" value="<?php echo $tenNV ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Giới tính</label>
                                    <select name="gioiTinh" class="form-control">
                                    	<option value="<?php echo $gioiTinh ?>"><?php echo $gioiTinh ?></option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="diaChi" class="form-control" id="exampleInputEmail1" value="<?php echo $diaChi ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Ngày sinh</label>
                                    <input type="date" name="ngaySinh" class="form-control" id="exampleInputEmail1" value="<?php echo $ngaySinh ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Điện thoại</label>
                                    <input type="text" name="dienThoai" class="form-control" id="exampleInputEmail1" value="<?php echo $dienThoai ?>">
                                </div>

                                 <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                                    <input type="text" name="taiKhoan" class="form-control" id="exampleInputEmail1" value="<?php echo $taiKhoan ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" name="matKhau" class="form-control" id="exampleInputEmail1" value="<?php echo $matKhau ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Quyền</label>
                                    <select name="quyen" class="form-control">
                                        <option value="<?php echo $quyen ?>"><?php echo $quyen ?></option>
                                        <?php 
                                                $sql_select_laptop_vp = "select * from nhanvien";
                                                    $rs2 = mysqli_query($conn, $sql_select_laptop_vp);
                                                    if($rs2){
                                                    while ($row=mysqli_fetch_row($rs2)) {
                                                        if($row[8]!=$quyen){
                                                ?>     
                                            <option value="<?php echo $row[8]; ?>"><?php echo $row[8]; ?></option>
                                        <?php
                                                }}
                                            }
                                        ?>   
                                    </select>
                                </div>
                            </div>
                            </br>
                                <button style="margin-top: 20px" type="submit" name="sua" class="btn btn-info">Cập nhật nhân viên</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
<?php require ("../admin/include/footer_admin.php") ?>