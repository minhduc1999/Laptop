<?php require ("include/header.php") ?>
<?php require ("include/nav_header.php") ?>

            <section class="main-content">
                <div class="row">
                      <div class="span12">                                                    
                        <br/>
                        <div class="row">
                            <div class="span12">
                                <h4 class="title">
                                    
                                    <span class="pull-left"><span class="text"><span class="line"><a href="#"><strong>Sách mới</strong></a></span></span>
                                    </span>
                                    
                                    <span class="pull-right">
                                       
                                    </span>
                                </h4>
                                <div id="myCarousel-2" class="myCarousel carousel slide">
                                    <div class="carousel-inner">                                
                                        <div class="active item">
                                            <ul class="thumbnails">      
                                               <?php 
                                                $sql = "SELECT * from sanpham order by MaSP desc limit 8";
                                                    $rs2 = mysqli_query($conn, $sql);
                                                    if($rs2){
                                                    while ($row=mysqli_fetch_row($rs2)) {
                                                        if($row[5]>0){
                                                ?>                                        
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>"><img src="images/product/<?php echo $row[3]; ?>" alt="" style="width: 250px;height: 300px"/></a></p>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="title"><?php echo $row[1]; ?></a><br/>                                                     
                                                        <p class="price" style="color: red"><?php echo number_format($row[4])." đ"; ?></p>
                                                    </div>
                                                </li>                                                       <?php
                                                }}
                                            }
                                        ?>     
                                            </ul>
                                        </div>

                                    </div>                          
                                </div>
                            </div>                      
                        </div>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="span12">
                                <h4 class="title">
                                    
                                    <span class="pull-left"><span class="text"><span class="line"><a href="#"><strong>Sách hay</strong></a></span></span>
                                    </span>
                                    
                                    <span class="pull-right">
                                       
                                    </span>
                                </h4>
                                <div id="myCarousel-4" class="myCarousel carousel slide">
                                    <div class="carousel-inner">
                                        <div class="active item">
                                            <ul class="thumbnails"> <?php 
                                                $sql = "SELECT * from sanpham where MaLoai = '3' limit 4 ";
                                                    $rs2 = mysqli_query($conn, $sql);
                                                    if($rs2){
                                                    while ($row=mysqli_fetch_row($rs2)) {
                                                         if($row[5]>0){
                                                ?>                                        
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>"><img src="images/product/<?php echo $row[3]; ?>" alt="" style="width: 250px;height: 300px"/></a></p>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="title"><?php echo $row[1]; ?></a><br/>
                                                       <p class="price" style="color: red"><?php echo number_format($row[4])." đ"; ?></p>  
                                                    </div>
                                                </li>                                                       <?php
                                                }}
                                            }
                                        ?>     
                                            </ul>
                                        </div>
                                        

                                     

                                    </div>                          
                                </div>
                            </div>                      
                        </div>
                        <br/>
                        <div class="row">
                            <div class="span12">
                                <h4 class="title">
                                    
                                    <span class="pull-left"><span class="text"><span class="line"><a href="product_detail.html"><strong>Sách bán chạy</strong></a></span></span>
                                    </span>
                                    
                                    <span class="pull-right">
                                        
                                    </span>
                                </h4>
                                <div id="myCarousel-5" class="myCarousel carousel slide">
                                    <div class="carousel-inner">
                                        <div class="active item">
                                            <ul class="thumbnails">                                             
                                                <?php 
                                                $sql = "SELECT * from sanpham where MaLoai = '1' limit 4 ";
                                                    $rs2 = mysqli_query($conn, $sql);
                                                    if($rs2){
                                                    while ($row=mysqli_fetch_row($rs2)) {
                                                         if($row[5]>0){
                                                ?>                                        
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>"><img src="images/product/<?php echo $row[3]; ?>" alt="" style="width: 250px;height: 300px"/></a></p>
                                                        <a href="chi_tiet_san_pham.php?id=<?php echo $row[0]; ?>" class="title"><?php echo $row[1]; ?></a><br/>
                                                       <p class="price" style="color: red"><?php echo number_format($row[4])." đ"; ?></p>

                                                    </div>
                                                </li>                                                       <?php
                                                }}
                                            }
                                        ?>     
                                            </ul>
                                        </div>
                                    </div>                          
                                </div>
                            </div>                      
                        </div>
                    </div> 
                </div>  
            </section>
    </body>
    
    <?php require ("include/footer.php") ?>