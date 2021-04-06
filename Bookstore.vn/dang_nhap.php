<?php require ("include/header.php") ?>
<?php require ("include/nav_header.php") ?>

<hr>

<?php 
if(isset($_POST['submit'])){

    $username = $_POST['taiKhoan'];
    $pass = $_POST['matKhau'];

  if(dangNhap($username,$pass) == true){
          $_SESSION['user'] = $username;
          echo "<script> alert('Đăng nhập thành công!')</script>";
          echo "<script> window.location = 'index.php';</script>";
  }else{
    echo "<script> alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
}
}
?>
      <section class="main-content">        
        <div class="row">
          <div class="span12" style="text-align: center;">          
            <h4 class="title"><span class="text" style="font-size: 22px">Đăng nhập vào hệ thống</span></h4>
            <div class="span7" style="text-align: left;">
            <form form action="" method="POST">
              <fieldset>
                  <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif; " ><b>Tên đăng nhập:</b></label>     
                  <input type="text" placeholder="Nhập username..." class="input-xlarge" name="taiKhoan" required>
                <div class="control-group">
                  <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;" ><b>Mật khẩu:</b></label>
                  <div class="controls">

                    <input type="password" placeholder="Nhập password..." class="input-xlarge" name="matKhau" required>
                  </div>
                </div>
                <div class="control-group">
                  <button style="margin-left: 80px; height: 40px; width: 120px" class="btn btn-success" type="submit" name="submit">Đăng nhập</button>
                <div class="container signin" style="margin-top: 20px">
                  <p>Bạn chưa có tài khoản? <a href="dang_ky.php">Đăng Ký</a>.</p>
                </div>
                  <hr>
                </div>
              </fieldset>
            </form>   
            </div>    
          </div>        
        </div>
      </section>  

<?php require ("include/footer.php") ?>