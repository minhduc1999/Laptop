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
                                    <label for="exampleInputEmail1">Bảo hành</label>
                                    <select name="baoHanh" class="form-control">
                                        <option value="12 Tháng">12 Tháng</option>
                                        <option value="24 Tháng">24 Tháng</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Loại sản phẩm</label>
                                    <select name="loaiSanPham" class="form-control">
                                        <?php 
												$sql_select_laptop_vp = "select * from tbl_loaisanpham";
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

							</div>
							</br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Nhà sản xuất</label>
                                    <select name="nhaSanXuat" class="form-control">
                                        <?php 
												$sql_select_laptop_vp = "select * from tbl_nhasanxuat";
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
                                    <label for="exampleInputEmail1">Khuyến mãi</label>
                                    <select name="khuyenMai" class="form-control">
                                        <?php 
												$sql_select_laptop_vp = "select * from tbl_khuyenmai";
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
                              </div>  
                          </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">CPU</label>
                                    <input type="text" name="cpu" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Ram</label>
                                    <input type="text" name="ram" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>

                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Ổ cứng</label>
                                    <input type="text" name="oCung" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Màn hình</label>
                                    <input type="text" name="manHinh" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>

                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Card màn hình</label>
                                    <input type="text" name="cardManHinh" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Cổng kết nối</label>
                                    <input type="text" name="congKetNoi" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>

                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Hệ điều hành</label>
                                    <input type="text" name="heDieuHanh" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Trọng lượng</label>
                                    <input type="text" name="trongLuong" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>

                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Kích thước</label>
                                    <input type="text" name="kichThuoc" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Năm sản xuất</label>
                                    <input type="text" name="namSX" class="form-control" id="exampleInputEmail1">
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