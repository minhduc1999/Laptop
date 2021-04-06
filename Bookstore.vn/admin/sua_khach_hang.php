<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_nhanvien.php") ?>

<?php 
if(isset($_GET['makh'])){

	$makh = $_GET['makh'];
	$sql_select_nv = "select * from khachhang where MaKH = '$makh'";
	$rs = mysqli_query($conn, $sql_select_nv);

	if($rs){
		if($row = mysqli_fetch_row($rs)){
			$tenKH = $row[1];
			$diaChi = $row[4];
			$gmail = $row[2];
			$dienThoai = $row[3];
			$taiKhoan = $row[5];
			$matKhau = $row[6];
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
                            CẬP NHẬT KHÁCH HÀNG
                        </header>

                        <div class="panel-body">
                            <div class="position-center">
                        <form role="form" action="exec_sua_khach_hang.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6 col-sm-7">
                                    <input type="hidden" name="MaKH" class="form-control" id="exampleInputEmail1" value="<?php echo $makh ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Tên khách hàng</label>
                                    <input type="text" name="tenKH" class="form-control" id="exampleInputEmail1" value="<?php echo $tenKH ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="diaChi" class="form-control" id="exampleInputEmail1" value="<?php echo $diaChi ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Gmail</label>
                                    <input type="text" name="gmail" class="form-control" id="exampleInputEmail1" value="<?php echo $gmail ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Điện thoại</label>
                                    <input type="text" name="dienThoai" class="form-control" id="exampleInputEmail1" value="<?php echo $dienThoai ?>">
                                </div>

                                 <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                                    <input type="text" name="taiKhoan" class="form-control" id="exampleInputEmail1"  value="<?php echo $taiKhoan ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" name="matKhau" class="form-control" id="exampleInputEmail1" value="<?php echo $matKhau ?>">
                                </div>

                            </div>
                            </br>
                                <button style="margin-top: 20px" type="submit" name="sua" class="btn btn-info">Cập nhật khách hàng</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
<?php require ("../admin/include/footer_admin.php") ?>