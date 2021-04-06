<?php require ("../admin/include/header_admin.php") ?>
<?php require ("../admin/include/main_admin.php") ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
  	<div class="panel-default">
  		<div style="padding: 20px">
  			<span><b>Từ ngày:</b></span>
  			<input type="date" name="">
  			<span><b>Đến ngày:</b></span>
  			<input type="date" name="">
  			<button style="margin-left: 20px">Xem thống kê</button>	
  		</div>
  	</div>

    <div class="panel-heading">
      Thống kê doanh thu
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
          	<th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			$sql ="select * from donhang where MaTinhTrang = 3";
			$exec= mysqli_query($conn, $sql);
			$i = 1;
			$tongdt = 0;
			while($row=mysqli_fetch_array($exec)){ 
			$t = $row['TongTien'];
		?>
          <tr> 
          	<td><?php echo $i++ ?></td>
            <td><?php echo $row['MaDH']; ?></td>
            <td><?php echo $row['HoTen']; ?></td>
            <td><?php echo $row['NgayLap']; ?></td>            
            <td><?php echo number_format($t); $tongdt += $t ?> đ</td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
      
    </div>
    <footer class="panel-footer">
      <div class="row">
  <b style="color: red;float: right;font-family: Comic Sans MS, cursive, sans-serif;">Tổng danh thu: <?php echo number_format($tongdt)?> đ</b>
      </div>
    </footer>
  </div>
</div>
    </section>
</section>
<!--main content end-->
<?php require ("../admin/include/footer_admin.php") ?>
	