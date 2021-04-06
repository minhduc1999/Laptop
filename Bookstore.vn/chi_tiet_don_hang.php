<?php require ("include/header.php") ?>
<?php require ("include/nav_header.php") ?>

<?php
  $madh = $_GET["madh"];
  $sql = "SELECT d.MaDH, d.NgayLap, d.TongTien, d.HoTen, d.DiaChi, d.DienThoai , tt.TenTinhTrang, tt.MaTinhTrang FROM donhang d, tinhtrangdonhang tt WHERE d.MaTinhTrang = tt.MaTinhTrang AND MaDH = $madh";
  $exec= mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($exec);
?>
<section class="main-content" style="margin-bottom: 200px">        
        <div class="row">
          <div class="span12" style="text-align: center;">          
            <h4 class="title"><span class="text" style="font-size: 22px">Thông tin đơn đặt hàng</span></h4>
            <div class="span11" style="text-align: left;">
            		<div class="myorder-content clearfix">
    <h1 class="title" style="font-size: 28px;font-family: Comic Sans MS, cursive, sans-serif;color: blue"><span>Chi tiết đơn đặt hàng</span></h1>
    <div class="myorder-block">
        <div class="table-responsive">
            <table class="table table-striped b-t b-light" style="font-size: 16px;font-family: Comic Sans MS, cursive, sans-serif;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>    
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
         $sql = "SELECT s.MaSP,s.TenSP, s.HinhAnh, c.SoLuongBan, s.DonGia , d.TongTien FROM donhang d, chitietdonhang c, sanpham s WHERE d.MaDH = c.MaDH AND c.MaSP = s.MaSP AND c.MaDH = $madh";
      $exec= mysqli_query($conn, $sql);
      $i = 1;
      $tongdt = 0;
      while($row = mysqli_fetch_array($exec)){ 
      	$gia = $row['DonGia'];
      	$soluong = $row['SoLuongBan'];
      	$tog = $gia * $soluong;
    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['MaSP']; ?></td>
                            <td><img src="images/product/<?php echo $row['HinhAnh']; ?>" height="100" width="100"></td>
                            <td><?php echo $row['TenSP']; ?></td>
                            <td><?php echo number_format($row['DonGia']); ?> đ</td>
                            <td><?php echo $row['SoLuongBan']; ?></td>
                            <td><?php echo number_format($tog); $tongdt += $tog ?> đ</td>
                        </tr>
                        <?php } ?>
                        <tr>
        					<td></td>
        					<td></td>
        					<td></td>
        					<td></td>
        					<td></td>
        					<td>Tổng tiền hóa đơn:</td>
        	<td style="color: red"><?php echo number_format($tongdt)?> VNĐ</td>
        </tr>
                </tbody>
            </table>
            <a href="javascript:history.go(-1)" style="font-size: 20px;float: right;font-family: Comic Sans MS, cursive, sans-serif;"><< Back</a>
        </div>
    </div>
</div>

            </div>    
          </div>        
        </div>
      </section>
<h4 class="title"><span class="text" style="font-size: 22px"></span></h4>      
<?php require ("include/footer.php") ?>