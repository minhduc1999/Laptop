<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_nhanvien.php") ?>

<?php 
if(isset($_GET['masp'])){
	$productid = $_GET['masp'];

    $sql_select_laptop_lsp = "SELECT * from sanpham join loaisanpham on sanpham.MaLoai = loaisanpham.MaLoai where sanpham.MaSP = '$productid'";
    $rs = mysqli_query($conn,$sql_select_laptop_lsp);

	if($rs){
		if($row = mysqli_fetch_row($rs)){
			$tensp = $row[1];
            $maloai = $row[2];
			$hinhanh = $row[3];
            $gia = $row[4];
			$soluong = $row[5];
			$nhaXuatBan = $row[6];
			$khoiLuong = $row[7];
			$ngayPhatHanh = $row[8];
			$kichThuoc = $row[9];
            $soTrang = $row[10];
            $ngonNgu = $row[11];
            $tacGia = $row[12];
            $moTa = $row[13];
            $tenLoai = $row[15];
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
                                    <input type="hidden" name="MaSP" class="form-control" id="exampleInputEmail1" value="<?php echo $productid ?>">
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
                                    <label for="exampleInputEmail1">Nhà xuất bản</label>
                                    <input type="text" name="nhaXuatBan" class="form-control" id="exampleInputEmail1" value="<?php echo $nhaXuatBan ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Khối lượng</label>
                                    <input type="text" name="khoiLuong" class="form-control" id="exampleInputEmail1" value="<?php echo $khoiLuong ?>">
                                </div>
                            </div>
							</br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Ngày phát hành</label>
                                    <input type="date" name="ngayPhatHanh" class="form-control" id="exampleInputEmail1" value="<?php echo $ngayPhatHanh ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Kích thước</label>
                                    <input type="text" name="kichThuoc" class="form-control" id="exampleInputEmail1" value="<?php echo $kichThuoc ?>">
                                </div>
                            </div>
                          </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Số trang</label>
                                    <input type="text" name="soTrang" class="form-control" id="exampleInputEmail1" value="<?php echo $soTrang ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Ngôn ngữ</label>
                                    <input type="text" name="ngonNgu" class="form-control" id="exampleInputEmail1" value="<?php echo $ngonNgu ?>">
                                </div>
                            </div>

                            </br>
                            <div class="row">
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Tác giả</label>
                                    <input type="text" name="tacGia" class="form-control" id="exampleInputEmail1" value="<?php echo $tacGia ?>">
                                </div>
                                <div class="col-6 col-sm-5">
                                    <label for="exampleInputEmail1">Loại sản phẩm</label>
                                    <select name="loaiSanPham" class="form-control">
                                        <option value="<?php echo $maloai ?>"><?php echo $tenLoai ?></option>
                                        <?php 
                                                $sql_select_laptop_vp = "select * from loaisanpham";
                                                    $rs2 = mysqli_query($conn, $sql_select_laptop_vp);
                                                    if($rs2){
                                                    while ($row=mysqli_fetch_row($rs2)) {
                                                        if($row[0]!=$maloai){
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
                            	<div class="col-6 col-sm-10">
                       			<label for="exampleInputEmail1">Mô Tả</label>

                               <textarea class="form-control" rows="10" id="details" name="moTa"><?php echo $moTa ?>
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