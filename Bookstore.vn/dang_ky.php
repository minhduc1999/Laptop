<?php require ("include/header.php") ?>
<?php require ("include/nav_header.php") ?>

<hr>

<?php 	

if(isset($_POST['submit'])){
	$taiKhoan = $_POST['taiKhoan'];

	$hoTen = $_POST['hoTen'];

	$dienThoai = $_POST['dienThoai'];

	$diaChi = $_POST['diaChi'];

	$pass = $_POST['matKhau'];

	$email = $_POST['email'];

	$pass2 = $_POST['matKhau2'];

	dangky($taiKhoan,$hoTen,$pass,$pass2,$diaChi,$dienThoai,$email);

}
?>
      <section class="main-content">        
        <div class="row">
          <div class="span12" style="text-align: center;">          
            <h4 class="title"><span class="text" style="font-size: 22px">Đăng ký tài khoản</span></h4>
            <form form action="" method="POST" style="text-align: left;">
              <fieldset style="">
              	<div class="control-group">
                  <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Tên đăng nhập:</b></label>   
                  <div class="controls">
                  <input type="text" placeholder="Nhập username..." class="input-xlarge" name="taiKhoan" required>
              	   </div>
              	</div>
              	<div class="control-group">
                  <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Họ và tên:</b></label>   
                  <div class="controls">
                  <input type="text" placeholder="Nhập họ và tên..." class="input-xlarge" name="hoTen" required>
              	   </div>
              	</div>
              	<div class="control-group">
                  <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Số điện thoại:</b></label>   
                  <div class="controls">
                  <input type="text" placeholder="Nhập số điện thoại..." class="input-xlarge" name="dienThoai" required>
              	   </div>
              	</div>
              	<div class="control-group">
                  <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Địa chỉ:</b></label>   
                  <div class="controls">
                  <input type="text" placeholder="Nhập địa chỉ..." class="input-xlarge" name="diaChi" required>
              	   </div>
              	</div>
              	<div class="control-group">
                  <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Email:</b></label>   
                  <div class="controls">
                  <input type="text" placeholder="Nhập gamil..." class="input-xlarge" name="email" required>
              	   </div>
              	</div>
                <div class="control-group">
                  <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Mật khẩu:</b></label>
                  <div class="controls">

                    <input type="password" placeholder="Nhập password..." class="input-xlarge" name="matKhau" required>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Nhập lại mật khẩu:</b></label>
                  <div class="controls">

                    <input type="password" placeholder="Nhập lại password..." class="input-xlarge" name="matKhau2" required>
                  </div>
                </div>
                <div class="control-group">
                  <button style="margin-left: 80px; height: 40px; width: 120px" class="btn btn-success" type="submit" name="submit">Đăng ký</button>
                  
                </div>
                <div class="container signin" style="margin-top: 20px">
					<p>Bạn đã có tài khoản? <a href="dang_nhap.php">Đăng Nhập</a></p>
				</div>
				<hr>
              </fieldset>
            </form>       
          </div>        
        </div>
      </section>  

<?php require ("include/footer.php") ?>