<?php require ("include/header.php") ?>
<?php require ("include/nav_header.php") ?>

<section class="main-content">
                <div class="row">
                      <div class="span12">                                                    
                        <br/>
                        <div class="row">
                            <div class="span12">
                            	<h4 class="title">
                                    
                                    <span class="pull-left"><span class="text"><span class="line"><a href="#">Kết quả tìm kiếm</a></span></span>
                                    </span>
                                    
                                    <span class="pull-right">
                                       
                                    </span>
                                </h4>
<div id="myCarousel-2" class="myCarousel carousel slide">
                                    <div class="carousel-inner">                                
                                        <div class="active item">
                                            <ul class="thumbnails">


                <?php
				$search = $_GET['search'];
				$sl = "select * from sanpham where TenSP like '%$search%'";
				$exec = mysqli_query($conn, $sl);
				$num = mysqli_num_rows($exec);
				if($_GET['search'] == ""){
				?>
				    echo "<script> alert('Bạn chưa nhập từ khóa tìm kiếm!!!')</script>";
				<?php
				}
				else{
				if($num == 0){
				?>
					echo "<script> alert('Không tìm thấy kết quả mà bạn đã nhập!!!')</script>";
				<?php
				}
				while($row = mysqli_fetch_array($exec)){   
                if($row[5]>0){                                            
				?>                          
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>"><img src="images/product/<?php echo $row[3]; ?>" alt="" style="width: 250px;height: 300px" /></a></p>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="title"><?php echo $row[1]; ?></a><br/>
                                                       <p class="price" style="color: red"><?php echo number_format($row[4])." đ"; ?></p>
                                                    </div>
                                                </li>                                                     
						<?php }}} ?>
                         </ul>
                                        </div>

                                    </div>                          
                                </div>
                            </div>
                            
                        </div> 
                </div>  
            </section>
    </body>

<?php require ("include/footer.php") ?>