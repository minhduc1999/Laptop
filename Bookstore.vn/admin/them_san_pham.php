<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_nhanvien.php") ?>
<section id="main-content">
	<section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM SẢN PHẨM
                        </header>

                        <div class="panel-body">
                            <div class="position-center">
                        <form role="form" action="exec_them_san_pham.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6 col-sm-10">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" name="tenSP" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                    <input type="text" name="giaBan" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" name="soLuong" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Loại sản phẩm</label>
                                    <select name="loaiSanPham" class="form-control">
                                        <?php 
												$sql_select_laptop_vp = "select * from loaisanpham";
													$rs2 = mysqli_query($conn, $sql_select_laptop_vp);
													if($rs2){
													while ($row=mysqli_fetch_row($rs2)) {
												?>     
                                        	<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                        <?php
                                                }
                                            }
                                        ?>   
                                    </select>
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Nhà xuất bản</label>
                                    <input type="text" name="nhaXuatBan" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>  
                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Khối lượng</label>
                                    <input type="text" name="khoiLuong" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Ngày phát hành</label>
                                    <input type="date" name="ngayPhatHanh" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Kích thước</label>
                                    <input type="text" name="kichThuoc" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Số trang</label>
                                    <input type="text" name="soTrang" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Ngôn ngữ</label>
                                    <input type="text" name="ngonNgu" class="form-control" id="exampleInputEmail1">
                                </div>
                               <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Tác giả</label>
                                    <input type="text" name="tacGia" class="form-control" id="exampleInputEmail1">
                                </div>

                            </div>
                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-10">
                                <label for="exampleInputEmail1">Mô Tả</label>

                               <textarea class="form-control" rows="10" id="details" name="moTa"></textarea>
                              </div>
                            </div>
                        </br>
                            <div class="row">
                                <div class="col-6 col-sm-10">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="file" name ="image" class="form-control" id="exampleInputFile">
                                </div>
                            </div>
                                <button style="margin-top: 20px" type="submit" name="them" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
<?php require ("../admin/include/footer_admin.php") ?>