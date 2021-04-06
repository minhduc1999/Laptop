<?php require ("include/header.php") ?>
<section  class="homepage-slider">
	<div class="flexslider">
         <img style="height: 350px;width: 1200px" src="images/carousel/banner3.jpg"/>
    </div>
</section>
<h4 class="title"><span class="text">Giỏ Hàng Của Bạn </span></h4>
<?php
	if(isset($_SESSION['user'])){
		if (isset($_SESSION['gio_hang'])){
			$count = $_SESSION['gio_hang_soluong'];
			if($count == 0){

				echo '<p class="alert-warning">Giỏ hàng bạn trống...Bấm <a href="index.php">vào đây</a> để chọn và mua hàng</p>';
}else{
				?>
			<section class="main-content">				
				<div class="row">
					<div class="span12">					
						
						<table class="table table-striped">
							<thead>
								<tr>									
									<th>Mặt hàng</th>
									<th>Tên Sản Phẩm </th>
									<th>Giá Tiền </th>
									<th>Số Lượng </th>								
									<th>Tổng </th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								<?php	
						$tongtien = 0;
						foreach ($_SESSION['gio_hang'] as $key => $value) {
                            $gia = getValueProduct($key,4);
							$name = getValueProduct($key, 1);
							$soluong = getValueProduct($key,5);
							$tog = $gia * $value;
							$tongtien += $gia * $value;
							?>
								<tr>								
									<td><a href="chi_tiet_san_pham.php"><img height="150px" width="100px" alt="" src="images/product/<?php echo getValueProduct($key,3)?>"></a></td>
									<td><?php echo $name ?></td>
									<td><?php echo number_format($gia)." đ"; ?></td>
									<td>
									<form action="cap_nhat_gio_hang.php" method="POST">	
										<input name="sanpham" type="hidden" value="<?php echo($key); ?>">
										<input type="hidden" name="gia" value="<?php echo $gia;?>">
										<input type="text" class="form-control" style="width: 50px" name="so-luong-cap-nhat"
										value="<?php echo($value); ?>">
										<input style="background: green; color: #fff; padding: 6px; border: 0px solid green;font-weight: bold; cursor: pointer;margin-bottom: 10px" type="submit" value="Cập Nhật" name="submit">
									</form>
									</td>
									
									<td style="color: blue;"><?php echo number_format($tog)." đ"; ?></td>
									<td><a style="color: red;font-size: 15px" onclick="return confirm('Xóa sản phẩm <?php echo($name);?> khỏi giỏ hàng của bạn?');" href="xoa_gio_hang.php?id=<?php echo($key);?>&gia=<?php echo($gia*$value);?>">Xóa</a></td>
									<?php 
						}
						?>
								</tr>			 
								<tr>							
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									
									<td><strong style="color: red;font-size: 16px">Tổng tiền: <?php echo number_format($tongtien)." đ" ?></strong></td>
									<td>&nbsp;</td>
									
								</tr>		  
							</tbody>
						</table>

						<hr/>
						<p class="buttons center" >				
							
							<a href="index.php" style="background: grey; color: #fff; padding: 8px; border: 0px solid green;font-weight: bold; cursor: pointer;">Tiếp tục mua</a>
							<a href="thanh_toan.php" style="background: green; color: #fff; padding: 8px; border: 0px solid green;font-weight: bold; cursor: pointer;" onclick="dathang()">Thanh toán</a>
						</p>	
						<hr/>				
					</div>
				</div>
			</section>
<?php 
	}
}					
}
?>
<h4 class="title"><span class="text"></span></h4>
<script type="text/javascript">
	function dathang(){
		alert('Đặt hàng thành công!! Đơn của bạn đang chờ xác nhận!! Đơn hàng của bạn sẽ được giao sớm nhất là 3 ngày!!!');
	}
</script>
<?php require ("include/footer.php") ?>
