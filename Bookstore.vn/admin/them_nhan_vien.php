<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_admin.php") ?>
<section id="main-content">
	<section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM NHÂN VIÊN
                        </header>

                        <div class="panel-body">
                            <div class="position-center">
                        <form role="form" action="exec_them_nhan_vien.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                
                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Tên nhân viên</label>
                                    <input type="text" name="tenNV" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Giới tính</label>
                                    <select name="gioiTinh" class="form-control">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="diaChi" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Ngày sinh</label>
                                    <input type="date" name="ngaySinh" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Điện thoại</label>
                                    <input type="text" name="dienThoai" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                                    <input type="text" name="taiKhoan" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" name="matKhau" class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Quyền</label>
                                    <select name="quyen" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            </br>
                                <button style="margin-top: 20px" type="submit" name="themnv" class="btn btn-info">Thêm nhân viên</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
<?php require ("../admin/include/footer_admin.php") ?>