<?php require ("include/header.php") ?>

<?php 
if(isset($_GET['id'])){
	$productid = $_GET['id'];

	$sql_select_detail_product = "select * from tbl_sanpham join tbl_chitietsanpham on tbl_sanpham.idSP = tbl_chitietsanpham.idSP where tbl_sanpham.idSP = '$productid'";
	$rs = mysqli_query($conn, $sql_select_detail_product);

	if($rs){
		if($row = mysqli_fetch_row($rs)){

			if($row[8]==2){
                $giagiam = $row[2]-($row[2] * 5 / 100);
            }else if($row[8]==3){
                $giagiam = $row[2]-($row[2] * 10 / 100);
                                            
                }else{
            $giagiam = $row[2] - ($row[2] * 3 / 100) ;}

			$tensp = $row[1];
			$gia = $row[2];
			$hinhanh = $row[3];
			$soluong = $row[4];
			$baohanh = $row[5];
			$cpu = $row[10];
			$ram = $row[11];
			$oCung = $row[12];
			$manhinh = $row[13];	
			$cardmanhinh = $row[14];	
			$congketnoi = $row[15];
			$hedieuhanh = $row[16];
			$trongluong = $row[17];
			$kichthuoc = $row[18];
			$ngaySX = $row[19];
			$mota = $row[20];	
		}
	}
}
?>
<section  class="homepage-slider">
	<div class="flexslider">
         <img src="images/carousel/slider_1.jpg"/>
    </div>
</section>
<section class="header_text">
                Website chúng tôi chuyên cung cấp các sản phẩm chất lượng có uy tín và mới nhất trên thị trường hiện nay
                <br/>Hãy ghé thăm trang web của chúng tôi và đừng bỏ lỡ các sản phẩm mới nhé!
            </section>
<hr/>
<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<a href="<?php echo $hinhanh ?>" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="images/product/<?php echo $hinhanh ?>"></a>						
							</div>
							<div class="span5">
									<h5><strong><?php echo $tensp ?></strong></h5>
									<strong>CPU:</strong> <span><?php echo $cpu ?></span><br>
									<strong>Ram:</strong> <span><?php echo $ram ?></span><br>
									<strong>Ổ cứng:</strong> <span><?php echo $oCung ?></span><br>
									<strong>Card đồ họa:</strong> <span><?php echo $cardmanhinh ?></span><br>	
									<strong>Màn hình:</strong> <span><?php echo $manhinh ?></span><br>
									<strong>Số lượng còn:</strong> <span style="color: red"><?php echo $soluong ?></span><br>
																									
								<h4><strong>Giá: <?php echo number_format($giagiam) ?> đ</strong></h4>
							</div>
							<div class="span5">
			<script>
			function minus(){
				var soluong = document.getElementById("soluong");
				var gia = document.getElementById("gia").value;
				var thanhtien = document.getElementById("thanhtien");

				if(soluong.value > 1)
					soluong.value--;

				thanhtien.value = (soluong.value * gia).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + " VNĐ";
			}

			function plus(){
				var soluong = document.getElementById("soluong");
				var gia = document.getElementById("gia").value;
				var thanhtien = document.getElementById("thanhtien");
				soluong.value++;

				thanhtien.value = (soluong.value * gia).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + " VNĐ";

			}
		</script>					
		<?php 
		if(isset($_SESSION['user'])){

			if($soluong <= 0){
				echo "<span>SẢN PHẨM NÀY ĐÃ HẾT HÀNG</span>";
			}else{
				$query_login = "SELECT * FROM tbl_khachhang where taiKhoan = '".$_SESSION['user']."'";
				$rs2 = mysqli_query($conn, $query_login);
				if($rs2){
					while($row = mysqli_fetch_row($rs2)){
						$fullname = $row[1];
						$diachi = $row[3];
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
						<p>Tổng tiền:</p>
						<input type="text" value="<?php echo number_format($giagiam).' VNĐ';?>" id="thanhtien" readonly="" name="thanhtien">
					</div>
					<input type="hidden" value="<?php  echo($giagiam)?>" name="gia" id="gia">
					<br>
					<p>Tên người nhận:</p>
					<input type="text" required=""  name="address" value="<?php echo $fullname ?>"></br>
					<p>Địa chỉ giao hàng:</p>
					<input type="text" required="" readonly="" name="address" value="<?php echo $diachi ?>"></br>
					<p>Số điện thoại:</p>
					<input type="text" required=""  value="<?php echo $phone?>" name="phone"></br>
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
												<tr class="alt">
													<th>Hệ điều hành</th>
													<td><?php echo $hedieuhanh ?></td>
												</tr>
												<tr class="">
													<th>CPU</th>
													<td><?php echo $cpu ?></td>
												</tr>		
												<tr class="alt">
													<th>RAM</th>
													<td><?php echo $ram ?></td>
												</tr>
												<tr class="">
													<th>Ổ cứng</th>
													<td><?php echo $oCung ?></td>
												</tr>
												<tr class="alt">
													<th>Trọng lượng</th>
													<td><?php echo $trongluong ?> Kg</td>
												</tr>
												<tr class="">
													<th>Kích thước</th>
													<td><?php echo $kichthuoc ?></td>
												</tr>
												<tr class="alt">
													<th>Card màn hình</th>
													<td><?php echo $cardmanhinh ?></td>
												</tr>
												<tr class="">
													<th>Cổng kết nối</th>
													<td><?php echo $congketnoi ?></td>
												</tr>
												<tr class="alt">
													<th>Thời điểm ra mắt</th>
													<td>Năm <?php echo $ngaySX ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>	

							</div>		

							<div class="span9">	
								<br>
								<h4 class="title">
									<span class="pull-left"><span class="text"><strong>Sản phẩm</strong> cùng nhà sản xuất</span></span>
									<span class="pull-right">
									</span>
								</h4>
								<div id="myCarousel-2" class="carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails listing-products">
												<?php 
												$sql_select_laptop_vp = "select * from tbl_sanpham where idNSX = '1' limit 3 ";
													$rs2 = mysqli_query($conn, $sql_select_laptop_vp);
													if($rs2){
													while ($row=mysqli_fetch_row($rs2)) {
												?>                                        
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>"><img src="images/product/<?php echo $row[3]; ?>" alt="" /></a></p>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="title"><?php echo $row[1]; ?></a><br/>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="category"><p class="price"><?php echo number_format($row[2])." đ"; ?></p></a>  
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
							<ul class="nav nav-list">
								<li class="nav-header">Danh mục</li>
								 <?php
                                        $sql = 'select * from tbl_loaisanpham';
                                        $rs = mysqli_query($conn, $sql);
                                        if($rs){
                                            while ($row=mysqli_fetch_row($rs)) {
                                        ?>
                                        <li><a href="danh_muc_san_pham.php?lsp=<?php echo $row[0];?>"><?php echo $row[1]; ?></a></li>
                                        <?php
                                        }
                                    }
                                ?>
							</ul>
							<br/>
							<ul class="nav nav-list below">
								<li class="nav-header">Thương hiệu</li>
								<?php
                                        $sql = 'select * from tbl_nhasanxuat';
                                        $rs = mysqli_query($conn, $sql);
                                        if($rs){
                                            while ($row=mysqli_fetch_row($rs)) {
                                        ?>
                                        <li><a href="nha_san_xuat.php?nsx=<?php echo $row[0];?>"><?php echo $row[1]; ?></a></li>
                                        <?php
                                        }
                                    }
                                ?>
							</ul>
						</div>
						<div class="block">								
							<h4 class="title"><strong>Bán</strong> chạy</h4>								
							<ul class="small-product">
								<?php
                                        $sql = 'select * from tbl_sanpham limit 3';
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