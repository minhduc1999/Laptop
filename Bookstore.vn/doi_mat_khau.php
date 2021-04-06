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
        	<h4 class="title"><span class="text" style="font-size: 22px">Thay đổi mật khẩu</span></h4>
       	 	<div class="span7" style="text-align: left;">
       	 		<form action="exec_doi_mat_khau.php" method="post">
       	 			<fieldset style="">
       	 				<div class="control-group">
                 		<div class="controls">
                  		<input type="hidden" placeholder="Nhập mật khẩu cũ..." class="input-xlarge" name="makh" value="<?php echo $makh ?>" required>
              	   		</div>
              			</div>
       	 				<div class="control-group">
                 		<div class="controls">
                  		<input type="hidden" placeholder="Nhập mật khẩu cũ..." class="input-xlarge" name="TaiKhoan" value="<?php echo $row['TaiKhoan'] ?>" required>
              	   		</div>
              			</div>
						<div class="control-group">
               		    <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Mật khẩu cũ:</b></label>   
                 		<div class="controls">
                  		<input type="password" placeholder="Nhập mật khẩu cũ..." class="input-xlarge" name="old_pass" required>
              	   		</div>
              			</div>
					
						<div class="control-group">
               		    <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Mật khẩu mới:</b></label>   
                 		<div class="controls">
                  		<input type="password" placeholder="Nhập mật khẩu mới..." class="input-xlarge" name="new_pass" required>
              	   		</div>
              			</div>
					
						<div class="control-group">
               		    <label class="control-label" style="font-size:16px; color:blue; font-family: Comic Sans MS, cursive, sans-serif;"><b>Nhập lại mật khẩu mới:</b></label>   
                 		<div class="controls">
                  		<input type="password" placeholder="Nhập lại mật khẩu mới..." class="input-xlarge" name="re_pass" required>
              	   		</div>
              			</div>
						
						<div class="control-group">
                 		 <button style="height: 40px; width: 120px;font-family: Comic Sans MS, cursive, sans-serif;" class="btn btn-success" type="submit" name="submit">Đổi mật khẩu
                 		 </button>         
                		</div>
				</fieldset>
				</form>
       		</div>    
    	</div>        
   </div>
</section>
<?php require ("include/footer.php") ?>
