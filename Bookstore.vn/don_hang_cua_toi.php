<?php require ("include/header.php") ?>
<?php require ("include/nav_header.php") ?>

<?php
  $makh= $_GET['makh'];

  $sql = "SELECT * from khachhang where MaKH = '$makh'";
  $exec= mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($exec);
?>
<section class="main-content" style="margin-bottom: 200px">        
        <div class="row">
          <div class="span12" style="text-align: center;">          
            <h4 class="title"><span class="text" style="font-size: 22px">Thông tin đơn đặt hàng</span></h4>
            <div class="span11" style="text-align: center;">
            		<div class="myorder-content clearfix">
    <h1 class="title" style="font-size: 28px;font-family: Comic Sans MS, cursive, sans-serif;"><span>Đơn hàng của tôi</span></h1>
    <div class="myorder-block">
        <div class="table-responsive">
            <table class="table table-striped b-t b-light" style="font-size: 18px;font-family: Comic Sans MS, cursive, sans-serif;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Vận chuyển</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
			$sql = "SELECT  d.MaDH, d.HoTen, d.TongTien, d.NgayLap, t.TenTinhTrang, t.MaTinhTrang FROM donhang as d, tinhtrangdonhang as t WHERE d.MaTinhTrang = t.MaTinhTrang AND d.MaKH = $makh";
			$exec= mysqli_query($conn, $sql);
			$i = 1;
			while($row=mysqli_fetch_array($exec)){                 
		?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['MaDH']; ?></td>
                            <td><?php echo $row['HoTen']; ?></td>
                            <td><?php echo $row['NgayLap']; ?></td>
                            <td><?php echo number_format($row['TongTien']); ?> đ</td>
                            <td style="color: red"><?php if($row['MaTinhTrang']==1){
                            	echo 'Đang xử lí đơn';
                            }else if($row['MaTinhTrang']==2){
                            	echo 'Đang giao hàng';
                            }else if($row['MaTinhTrang']==3) {
                            	echo 'Đã nhận hàng';
                            }else 
                            	echo 'Đơn bị hủy';?></td>
                            <td class="text-center"><a href="chi_tiet_don_hang.php?madh=<?php echo $row['MaDH']; ?>"><i class="fa fa-angle-double-right "></i>Xem đơn hàng</a></td>
                        </tr>
                        <?php } ?>
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