<?php require ("include/header.php") ?>
<?php require ("include/nav_header.php") ?>

<section class="main-content">
                <div class="row">
                      <div class="span12">                                                    
                        <br/>
                        <div class="row">
                            <div class="span12">
                            	<h4 class="title">
                                    
                                    <span class="pull-left"><span class="text"><span class="line"><a href="product_detail.html"><strong>KẾT QUẢ TÌM KIẾM</strong></a></span></span>
                                    </span>
                                    
                                    <span class="pull-right">
                                       
                                    </span>
                                </h4>



                <?php
				$search = $_GET['search'];
				$sl = "select * from tbl_sanpham where tenSP like '%$search%' or giaBan like '%$search%'";
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
					if($row[8]==2){
                                                           $giagiam = $row[2]-($row[2] * 5 / 100);
                                                        }else if($row[8]==3){
                                                            $giagiam = $row[2]-($row[2] * 10 / 100);
                                            
                                                        }else{
                                                            $giagiam = $row[2] - ($row[2] * 3 / 100) ;}
				?>                             
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>"><img src="images/product/<?php echo $row[3]; ?>" alt="" /></a></p>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="title"><?php echo $row[1]; ?></a><br/>
                                                       <p class="price" style="color: red"><del><?php echo number_format($row[2])." đ"; ?></del></p>

                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="category"><p class="price"><?php echo number_format($giagiam)." đ"; ?></p></a>  
                                                    </div>
                                                </li>                                                     
						<?php }} ?>
                            </div>
                            
                        </div> 
                </div>  
            </section>
    </body>

<?php require ("include/footer.php") ?>