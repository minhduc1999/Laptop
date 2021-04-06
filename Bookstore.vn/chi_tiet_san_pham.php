<?php require ("include/header.php") ?>

<?php 
if(isset($_GET['id'])){
	$productid = $_GET['id'];

	$sql_select_detail_product = "SELECT * from sanpham where MaSP = '$productid'";
	$rs = mysqli_query($conn, $sql_select_detail_product);

	if($rs){
		if($row = mysqli_fetch_row($rs)){

			$tensp = $row[1];
			$maloai = $row[2];
			$hinhanh = $row[3];
			$gia = $row[4];
			$soluong = $row[5];
			$nhaxuatban = $row[6];
			$khoiluong = $row[7];
			$ngayphathanh = $row[8];
			$kichthuoc = $row[9];
			$sotrang = $row[10];
			$ngonngu = $row[11];
			$tacgia = $row[12];	
			$mota = $row[13];	
		}
	}
}
?>
<section  class="homepage-slider">
	<div class="flexslider">
         <img style="height: 350px;width: 1200px" src="images/carousel/banner2.jpg"/>
    </div>
</section>
<section class="header_text">
               Mua sách online tại Bookstore.vn bạn được tận hưởng chính sách hỗ trợ miễn phí đổi trả hàng, giao hàng nhanh – tận nơi – miễn phí</br>Đặc biệt giảm thêm trên giá bán khi sử dụng BBxu giúp bạn mua sách online giá 0đ!
            </section>
<hr/>
<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<a href="<?php echo $hinhanh ?>" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img style="width: 300px;height: 400px" alt="" src="images/product/<?php echo $hinhanh ?>"></a>						
							</div>
							<div class="span5" style="font-size: 15px;font-family: Comic Sans MS, cursive, sans-serif;">
									<h5 style="font-size: 20px;font-family: Comic Sans MS, cursive, sans-serif;"><strong><?php echo $tensp ?></strong></h5>
									<strong>Tác giả:</strong> <span><?php echo $tacgia ?></span><br>
									<strong>Nhà xuất bản:</strong> <span><?php echo $nhaxuatban ?></span><br>
									<strong>Số lượng còn:</strong> <span style="color: red"><?php echo $soluong ?></span><br>
																									
								<h4><strong>Giá: <?php echo number_format($gia) ?> đ</strong></h4>
							</div>
							<div class="span5">
			<script>
			function minus(){
				var soluong = document.getElementById("soluong");
				var gia = document.getElementById("gia").value;
				var thanhtien = document.getElementById("thanhtien");

				if(soluong.value > 1)
					soluong.value--;

				thanhtien.value = (soluong.value * gia).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + " đ";
			}

			function plus(){
				var soluong = document.getElementById("soluong");
				var gia = document.getElementById("gia").value;
				var thanhtien = document.getElementById("thanhtien");
				soluong.value++;

				thanhtien.value = (soluong.value * gia).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + " đ";

			}
		</script>					
		<?php 
		if(isset($_SESSION['user'])){

			if($soluong <= 0){
				echo "<span>SẢN PHẨM NÀY ĐÃ HẾT HÀNG</span>";
			}else{
				$query_login = "SELECT * FROM khachhang where TaiKhoan = '".$_SESSION['user']."'";
				$rs2 = mysqli_query($conn, $query_login);
				if($rs2){
					while($row = mysqli_fetch_row($rs2)){
						$fullname = $row[1];
						$diachi = $row[6];
						$phone = $row[5];
					}
				}

				if(isset($_POST['order'])){
					$soluong_order = $_POST['soluong'];
					$address = $_POST['address'];
					$sdt = $_POST['phone'];
					$thanhtien = $soluong_order * $gia;
					if($soluong_order > $soluong){
						echo "<script> alert('Bạn đã chọn quá số lượng hiện còn')</script>";
						echo "<script> window.location = 'gio_hang.php';</script>";
					}else{
						if (!$_SESSION['gio_hang']){
							$_SESSION['gio_hang_soluong'] = 1;
							$_SESSION['gio_hang_tongtien'] = $thanhtien;
							$_SESSION['gio_hang'][$productid] = $soluong_order;
						}
						else {
							$_SESSION['gio_hang_tongtien'] += $thanhtien;
							if (!$_SESSION['gio_hang'][$productid]) {
								$_SESSION['gio_hang_soluong']++;
								$_SESSION['gio_hang'][$productid] = $soluong_order;
							}
							else $_SESSION['gio_hang'][$productid] += $soluong_order;
						}
					}
					echo "<script> window.location = 'gio_hang.php';</script>";
				}
				?>
				<button style="width: 30px;height: 30px; font-size: 20px;background-color: red; color: white;border: 0" onclick="minus();"> - </button>
				<button onclick="plus();" style="width: 30px;height: 30px; font-size: 20px;margin-left: 20px;background-color: green;color: white;border: 0"> + </button>
				<form action="" method="POST" class="form-inline">
					<p>&nbsp;</p>
					<p>Số lượng đặt hàng:</p>
					<div class="order-soluong">
						<input required="" type="text" class="number" id="soluong" name="soluong" value="1" min="1" max="<?php echo $soluong ?>" step="1"></br>
						<input type="hidden" value="<?php echo number_format($gia).' đ';?>" id="thanhtien" readonly="" name="thanhtien">
					</div>
					<input type="hidden" value="<?php  echo($gia)?>" name="gia" id="gia">
					<br>
					<p>Tên người nhận:</p>
					<input type="text" required="" readonly="" name="address" value="<?php echo $fullname ?>"></br>
					<p>Địa chỉ giao hàng:</p>
					<input type="text" required="" readonly="" name="address" value="<?php echo $diachi ?>"></br>
					<p>Số điện thoại:</p>
					<input type="text" required="" readonly="" value="<?php echo $phone?>" name="phone"></br>
					<button class="btn btn-inverse cart" type="submit" name="order" style="margin-top: 20px">
					<i class="fa fa-shopping-cart"></i>
					Thêm giỏ hàng</button>
				</form>
				<?php 
			}
		}else{
			echo "<span>Xin mời đăng nhập để đặt hàng </span><a class='submit' href='dang_nhap.php'>Đăng Nhập</a>";
		}
		?>
							</div>							
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Miêu tả</a></li>
									<li class=""><a href="#profile">Thông tin chi tiết</a></li>
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home"><?php echo $mota ?></div>
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">	
											<tbody>
												<tr class="">
													<th>Tác giả</th>
													<td><?php echo $tacgia ?></td>
												</tr>
												<tr class="alt">
													<th>Nhà xuất bản</th>
													<td><?php echo $nhaxuatban ?></td>
												</tr>
												<tr class="">
													<th>Khối lượng</th>
													<td><?php echo $khoiluong ?> gam</td>
												</tr>		
												<tr class="alt">
													<th>Kích thước</th>
													<td><?php echo $kichthuoc ?></td>
												</tr>
												<tr class="">
													<th>Số trang</th>
													<td><?php echo $sotrang ?></td>
												</tr>
												<tr class="alt">
													<th>Ngôn ngữ</th>
													<td><?php echo $ngonngu ?></td>
												</tr>
												
												<tr class="alt">
													<th>Ngày phát hành</th>
													<td><?php echo $ngayphathanh ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>	

							</div>		

							<div class="span9">	
								<br>
								<h4 class="title">
									<span class="pull-left"><span class="text">Sản phẩm liên quan</span></span>
									<span class="pull-right">
									</span>
								</h4>
								<div id="myCarousel-2" class="carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails listing-products">
												<?php 
												$sql = "select * from sanpham where MaLoai = '$maloai' limit 3 ";
													$rs2 = mysqli_query($conn, $sql);
													if($rs2){
													while ($row=mysqli_fetch_row($rs2)) {
												?>                                        
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>"><img src="images/product/<?php echo $row[3]; ?>" alt="" style="width: 250px;height: 300px"/></a></p>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="title"><?php echo $row[1]; ?></a><br/>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="category"><p class="price"><?php echo number_format($row[4])." đ"; ?></p></a>  
                                                    </div>
                                                </li>                                                       <?php
												}
											}
										?>     										
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span3 col">
						<div class="block">	
							<h4 class="title">Danh mục sản phẩm</h4>
							<ul class="nav nav-list">
								 <?php
                                        $sql = 'select * from loaisanpham';
                                        $rs = mysqli_query($conn, $sql);
                                        if($rs){
                                            while ($row=mysqli_fetch_row($rs)) {
                                        ?>
                                        <li><a style="font-size: 15px;font-family: Comic Sans MS, cursive, sans-serif;" href="danh_muc_san_pham.php?lsp=<?php echo $row[0];?>"><?php echo $row[1]; ?></a></li>
                                        <?php
                                        }
                                    }
                                ?>
							</ul>
						</div>
						<div class="block">								
							<h4 class="title">Bán chạy</h4>								
							<ul class="small-product">
								<?php
                                        $sql = 'select * from sanpham limit 3';
                                        $rs = mysqli_query($conn, $sql);
                                        if($rs){
                                            while ($row=mysqli_fetch_row($rs)) {
                                        ?>
                                        <li>
											<a href="chi_tiet_san_pham.php?id=<?php echo $row[0];?>">
											<img src="images/product/<?php echo $row[3]; ?>" alt="">
										</a>
										<a href="chi_tiet_san_pham.php?id=<?php echo $row[0];?>"><?php echo $row[1]; ?></a>
										</li>
                                        <?php
                                        }
                                    }
                                ?>
							</ul>
						</div>
					</div>
				</div>
			</section>	
			<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
<?php require ("include/footer.php") ?>