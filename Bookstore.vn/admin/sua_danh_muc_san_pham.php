<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_admin.php") ?>

<?php 
if(isset($_GET['malsp'])){

	$malsp = $_GET['malsp'];
	$sql_select_nv = "select * from loaisanpham where MaLoai = '$malsp'";
	$rs = mysqli_query($conn, $sql_select_nv);

	if($rs){
		if($row = mysqli_fetch_row($rs)){
			$tenLoai = $row[1];
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
                            CẬP NHẬT DANH MỤC SẢN PHẨM
                        </header>

                        <div class="panel-body">
                            <div class="position-center">
                        <form role="form" action="exec_sua_danh_muc.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6 col-sm-7">
                                    <input type="hidden" name="MaLoai" class="form-control" id="exampleInputEmail1" value="<?php echo $malsp ?>">
                                </div>

                                <div class="col-6 col-sm-7">
                                    <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                                    <input type="text" name="tenLoai" class="form-control" id="exampleInputEmail1" value="<?php echo $tenLoai ?>">
                                </div>

                            </div>
                            </br>
                                <button style="margin-top: 20px" type="submit" name="sua" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
<?php require ("../admin/include/footer_admin.php") ?>