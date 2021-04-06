<?php require ("include/header.php") ?>
<?php require ("include/nav_header.php") ?>

<?php 
if(isset($_GET['lsp'])){
	$lsp = $_GET['lsp'];

	$sql_select_detail_product = "select * from tbl_loaisanpham  where idLSP = '$lsp'";
	$rs = mysqli_query($conn, $sql_select_detail_product);

	if($rs){
		if($row = mysqli_fetch_row($rs)){
			$idlsp = $row[0];
			$tenlsp = $row[1];
		}
	}
}
?>

<section class="main-content">
                <div class="row">
                      <div class="span12">                                                    
                        <br/>
                        <div class="row">
                            <div class="span12">
                                <h4 class="title">
                                    
                                    <span class="pull-left"><span class="text"><span class="line"><a href="product_detail.html"><strong>LAPTOP <?php echo $row[1]; ?></strong></a></span></span>
                                    </span>
                                    
                                    <span class="pull-right">
                                       
                                    </span>
                                </h4>
                                <div id="myCarousel-2" class="myCarousel carousel slide">
                                    <div class="carousel-inner">                                
                                        <div class="active item">
                                            <ul class="thumbnails">      
                                               <?php 
												$sql_select_laptop_vp = "select * from tbl_sanpham where idLSP = '$lsp'";
													$rs2 = mysqli_query($conn, $sql_select_laptop_vp);
													if($rs2){
													while ($row=mysqli_fetch_row($rs2)) {
                                                        if($row[8]==2){
                                                           $giamgiam = $row[2]-($row[2] * 5 / 100);
                                                        }else if($row[8]==3){
                                                            $giamgiam = $row[2]-($row[2] * 10 / 100);
                                            
                                                        }else{
                                                            $giamgiam = $row[2] - ($row[2] * 3 / 100) ;}
												?>                                        
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>"><img src="images/product/<?php echo $row[3]; ?>" alt="" /></a></p>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="title"><?php echo $row[1]; ?></a><br/>
                                                        <p class="price" style="color: red"><del><?php echo number_format($row[2])." đ"; ?></del></p>

                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="category"><p class="price"><?php echo number_format($giamgiam)." đ"; ?></p></a> 
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
                        <br/>
                    </div> 
                </div>  
            </section>
    </body>

<?php require("include/footer.php")?>