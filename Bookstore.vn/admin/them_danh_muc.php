<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_admin.php") ?>
<section id="main-content">
	<section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM LOẠI SẢN PHẨM
                        </header>

                        <div class="panel-body">
                            <div class="position-center">
                        <form role="form" action="exec_them_danh_muc.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-6 col-sm-10">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="TenLoai" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            </br>
                                <button style="margin-top: 20px" type="submit" name="them" class="btn btn-info">Thêm doanh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
<?php require ("../admin/include/footer_admin.php") ?>