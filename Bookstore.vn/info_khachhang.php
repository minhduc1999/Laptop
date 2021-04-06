<?php require ("include/header.php") ?>
<?php require ("include/nav_header.php") ?>

<?php
  $makh= $_GET['makh'];

  $sql = "SELECT * from khachhang where MaKH = '$makh'";
  $exec= mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($exec);
?>
<section class="main-content">        
        <div class="row">
          <div class="span12" style="text-align: center;">          
            <h4 class="title"><span class="text" style="font-size: 22px">Thông tin tài khoản</span></h4>
            <div class="span7" style="text-align: left;">
				<div class="span7">
    	<div class="col-md-8">
        <form class="form-group" action="exec_cap_nhat_thong_tin.php" method="POST">
            <h2 style="font-size: 28px;font-family: Comic Sans MS, cursive, sans-serif;">Thông tin tài khoản</h2>
            <hr>
            <div class="control-group">
                <label style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;">Tài khoản: <?php echo $row['TaiKhoan']; ?></label>
            </div>
            <div class="control-group">
                <label style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;">Mật khẩu: <?php echo $row['MatKhau']; ?></label>
            </div>
            <h2 style="font-size: 28px;font-family: Comic Sans MS, cursive, sans-serif;">Thông tin cá nhân</h2>
            <hr>
            <div class="form-group">
                <div class="col-sm-9">
                    <input type="hidden" class="form-control" name="MaKH" required="true" value="<?php echo $row['MaKH']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;">Họ tên</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="HoTen" required="true" value="<?php echo $row['TenKH']; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;">Giới tính</label>
                <div class="col-sm-9">
                    <select name="GioiTinh" class="form-control">
                        <option value="<?php echo $row['GioiTinh'] ?>"><?php echo $row['GioiTinh'] ?></option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;">Ngày sinh</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="NgaySinh" value="<?php echo $row['NgaySinh']; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;">Điện thoại</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="DienThoai" value="<?php echo $row['DienThoai']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;">Gmail</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="Email" value="<?php echo $row['Email']; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;">Địa chỉ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="DiaChi" value="<?php echo $row['DiaChi']; ?>" />
                </div>
            </div>
            

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" name="submit" style="color: white;background-color: green;border: 0px; height: 32px;width: 70px">Cập nhật</button>
                </div>

            </div>
        </form>
    </div>
</div>
                    </div>
                    <div class="col-md-3">
<div class="menu" style="margin-top: 25px">
    <h3>
        <span style="font-size: 28px;font-family: Comic Sans MS, cursive, sans-serif;">
            Quản lý cá nhân
        </span>
    </h3>
    <ul style="list-style: none">
        <li><a style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;" href="info_khachhang.php?makh=<?php echo $makh ?>"></i>Thông tin tài khoản</a></li>
        <li><a style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;" href="don_hang_cua_toi.php?makh=<?php echo $makh ?>">Đơn hàng của tôi</a></li>
        <li><a style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;" href="doi_mat_khau.php?makh=<?php echo $makh ?>">Thay đổi mật khẩu</a></li>
        <li><a style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;" href="dang_xuat.php">Thoát</a></li>
    </ul>
</div>
                    </div>
            </div>
        </div>
    </div>  
            </div>    
          </div>        
        </div>
      </section>
<?php require ("include/footer.php") ?>