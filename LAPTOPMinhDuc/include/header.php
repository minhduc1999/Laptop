<?php session_start(); ?>
<?php require 'ketnoi.php';?>
<?php include ("function/function.php"); ?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title>Minhduc.vn - Chuyên bán máy tính chất lượng có uy tín và mới nhất</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
        <!-- bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="themes/css/font-awesome.min2.css"> -->
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min3.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link href="css/bootstrappage.css" rel="stylesheet"/>
        

        <link href="css/flexslider.css" rel="stylesheet"/>
        <link href="css/main.css" rel="stylesheet"/>

        <!-- scripts -->
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>               
        <script src="js/superfish.js"></script>  
        <script src="js/jquery.scrolltotop.js"></script>
        <!--[if lt IE 9]>           
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>      
        <div id="top-bar" class="container">
            <div class="row">
                <div class="span4">
                    <form method="get" class="search_form" action="timkiem.php">
                        <div class="input-group">
                            <input type="text" name="search" class="search-query form-control input-group" Placeholder="Tìm kiếm...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary rounded-circle btnpro" type="submit" name="submit" id="btn-search">
                                    <span class="fa fa-search"></span>
                                </button>
                            </span>
                            
                        </div>
                    </form>
                </div>
                <div class="span8">
                    <div class="account pull-right">
                        <?php
                            if(isset($_SESSION['user'])){
                            $name = getValueKH($_SESSION['user'],1);
                         ?>
                         <ul class="user-menu">    
                         <?php
                          if(isset($_SESSION['user'])){
                          
                          if (isset($_SESSION['gio_hang'])){
                            $count = $_SESSION['gio_hang_soluong'];?>
                            <li><a style="color: green" href="gio_hang.php">Giỏ hàng (<?php echo "$count"; ?>)</a></li>
                            <?php 
                        }                   
                    }
                    ?>
                            <li><a style="color: blue"  href="#"><?php 
                                         echo 'Xin chào: '.$name;
                                    ?></a></li>                 
                            <li><a style="color: red" href="dang_xuat.php">Đăng xuất</a></li>      
                        </ul>
                        <?php
                    }else{
                        ?>
                        <ul class="user-menu">              
                            <li><a href="dang_ky.php">Đăng ký</a></li>                  
                            <li><a href="dang_nhap.php">Đăng nhập</a></li>      
                        </ul>
                        <?php
                      }
                     ?>   
                    </div>
                </div>
            </div>
        </div>
        <div id="wrapper" class="container">
            <section class="navbar main-menu">
                <div class="navbar-inner main-menu">                
                    <a href="index.php" class="logo pull-left"><h4 class="title">LAPTOP-MINHDUC</h4></a>
                    <nav id="menu" class="pull-right">
                        <ul>
                            <li><a href="#">Hãng sản xuất</a>                 
                                <ul>
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
                            </li>                                                           
    
                            <li><a href="#">Loại sản phẩm</a>
                                <ul>                                    
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
                            </li>           
                            <li><a href="#">Bán chạy nhất</a></li>
                            <li><a href="#">Sản phẩm mới</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
            