<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_nhanvien.php") ?>

<?php 
if(isset($_GET['masp'])){
	$productid = $_GET['masp'];

	$sql_select_detail_product = "select * from tbl_sanpham join tbl_chitietsanpham on tbl_sanpham.idSP = tbl_chitietsanpham.idSP where tbl_sanpham.idSP = '$productid'";
	$rs = mysqli_query($conn, $sql_select_detail_product);

    $sql_select_laptop_nsx = "select * from tbl_sanpham join tbl_nhasanxuat on tbl_sanpham.idNSX = tbl_nhasanxuat.idNSX where tbl_sanpham.idSP = '$productid'";
    $rs_nsx = mysqli_query($conn,$sql_select_laptop_nsx);

    $sql_select_laptop_km = "select * from tbl_sanpham join tbl_khuyenmai on tbl_sanpham.idKM = tbl_khuyenmai.idKM where tbl_sanpham.idSP = '$productid'";
    $rs_km = mysqli_query($conn,$sql_select_laptop_km);

    $sql_select_laptop_lsp = "select * from tbl_sanpham join tbl_loaisanpham on tbl_sanpham.idLSP = tbl_loaisanpham.idLSP where tbl_sanpham.idSP = '$productid'";
    $rs_lsp = mysqli_query($conn,$sql_select_laptop_lsp);

	if($rs){
		if($row = mysqli_fetch_row($rs)){
			$tensp = $row[1];
			$gia = $row[2];
			$hinhanh = $row[3];
			$soluong = $row[4];
			$baohanh = $row[5];
			$cpu = $row[10];
			$ram = $row[11];
			$ocung = $row[12];
			$manhinh = $row[13];	
			$cardmanhinh = $row[14];	
			$congketnoi = $row[15];
			$hedieuhanh = $row[16];
			$trongluong = $row[17];
			$kichthuoc = $row[18];
			$namsx= $row[19];
			$mota = $row[20];	
		}
	}

    if($rs_nsx){
        if($row2 = mysqli_fetch_row($rs_nsx)){
            $mansx = $row2[9];
            $tennsx = $row2[10];
        }
    }

    if($rs_km){
        if($row3 = mysqli_fetch_row($rs_km)){
            $makm = $row3[9];
            $tenkm = $row3[10];
        }
    }

     if($rs_lsp){
        if($row4 = mysqli_fetch_row($rs_lsp)){
            $malsp = $row4[9];
            $tenlsp = $row4[10];
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
                            CẬP NHẬT SẢN PHẨM
                        </header>

                        <div class="panel-body">
                            <div class="position-center">
                        <form role="form" action="exec_sua_san_pham.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6 col-sm-10">
                                    <input type="hidden" name="idSP" class="form-control" id="exampleInputEmail1" value="<?php echo $productid ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 col-sm-10">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" name="tenSP" class="form-control" id="exampleInputEmail1" value="<?php echo $tensp ?>">
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                    <input type="text" name="giaBan" class="form-control" id="exampleInputEmail1" value="<?php echo $gia ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" name="soLuong" class="form-control" id="exampleInputEmail1" value="<?php echo $soluong ?>" disabled>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Bảo hành</label>
                                    <select name="baoHanh" class="form-control">
                                        <option value="<?php echo $baohanh ?>"><?php echo $baohanh ?></option>
                                        <option value="12 Tháng">12 Tháng</option>
                                        <option value="24 Tháng">24 Tháng</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Loại sản phẩm</label>
                                    <select name="loaiSanPham" class="form-control">
                                        <option value="<?php echo $malsp ?>"><?php echo $tenlsp ?></option>
                                        <?php 
												$sql_select_laptop_vp = "select * from tbl_loaisanpham";
													$rs2 = mysqli_query($conn, $sql_select_laptop_vp);
													if($rs2){
													while ($row=mysqli_fetch_row($rs2)) {
                                                        if($row[0]!=$malsp){
												?>     
                                        	<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                        <?php
                                                }}
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
                                        <option value="<?php echo $mansx ?>"><?php echo $tennsx ?></option>
                                        <?php 
												$sql_select_laptop_vp = "select * from tbl_nhasanxuat";
													$rs2 = mysqli_query($conn, $sql_select_laptop_vp);
													if($rs2){
													while ($row=mysqli_fetch_row($rs2)) {
                                                        if($row[0]!=$mansx){
												?>     
                                        	<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                        <?php
                                                }}
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Khuyến mãi</label>
                                    <select name="khuyenMai" class="form-control">
                                        <option value="<?php echo $makm ?>"><?php echo $tenkm ?></option>
                                        <?php 
												$sql_select_laptop_vp = "select * from tbl_khuyenmai";
													$rs2 = mysqli_query($conn, $sql_select_laptop_vp);
													if($rs2){
													while ($row=mysqli_fetch_row($rs2)) {
                                                        if($row[0]!=$makm){
												?>     
                                        	<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                        <?php
                                                }}
                                            }
                                        ?>
                                    </select>
                                </div>
                              </div>  
                          </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">CPU</label>
                                    <input type="text" name="cpu" class="form-control" id="exampleInputEmail1" value="<?php echo $cpu ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Ram</label>
                                    <input type="text" name="ram" class="form-control" id="exampleInputEmail1" value="<?php echo $ram ?>">
                                </div>
                            </div>

                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Ổ cứng</label>
                                    <input type="text" name="oCung" class="form-control" id="exampleInputEmail1" value="<?php echo $ocung ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Màn hình</label>
                                    <input type="text" name="manHinh" class="form-control" id="exampleInputEmail1" value="<?php echo $manhinh ?>">
                                </div>
                            </div>

                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Card màn hình</label>
                                    <input type="text" name="cardManHinh" class="form-control" id="exampleInputEmail1" value="<?php echo $cardmanhinh ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Cổng kết nối</label>
                                    <input type="text" name="congKetNoi" class="form-control" id="exampleInputEmail1" value="<?php echo $congketnoi ?>">
                                </div>
                            </div>

                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Hệ điều hành</label>
                                    <input type="text" name="heDieuHanh" class="form-control" id="exampleInputEmail1" value="<?php echo $hedieuhanh ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Trọng lượng</label>
                                    <input type="text" name="trongLuong" class="form-control" id="exampleInputEmail1" value="<?php echo $trongluong ?>">
                                </div>
                            </div>

                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Kích thước</label>
                                    <input type="text" name="kichThuoc" class="form-control" id="exampleInputEmail1" value="<?php echo $kichthuoc ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Năm sản xuất</label>
                                    <input type="text" name="namSX" class="form-control" id="exampleInputEmail1" value="<?php echo $namsx ?>">
                                </div>
                            </div>

						</br>
                              <div class="row">
                            	<div class="col-6 col-sm-10">
                       			<label for="exampleInputEmail1">Mô Tả</label>

                               <textarea class="form-control" rows="10" id="details" name="moTa"><?php echo $mota ?>
                               </textarea>
                       	      </div>
                            </div>
                        </br>
                            <div class="row">
                                <div class="col-6 col-sm-10">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="hidden" name ="image" class="form-control" id="exampleInputFile" value="<?php echo $hinhanh ?>">
                                    <img src="../images/product/<?php echo $hinhanh ?>" alt="" name="img" width="60px" height="80px" ><input type="file" id="image" name="image"   >
                                </div>
                            </div>
                                <button style="margin-top: 20px" type="submit" name="suasp" class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
<?php require ("../admin/include/footer_admin.php") ?>