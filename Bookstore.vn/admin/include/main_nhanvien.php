<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="nhanvien.php" class="logo">
        Bookstore
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
        	<?php
             if(isset($_SESSION['username'])){
            $name = getValueAD($_SESSION['username'],1);
        ?>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="../admin/images/user.jpg">
                <span class="username">
                	<?php 
                       echo $name;
                    ?>
                </span>
                <b class="caret"></b>
            </a>
             <?php
                }
             ?>  
            <ul class="dropdown-menu extended logout">
                <li><a href="../admin/logout.php"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Bảng điều khiển</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="../admin/quan_ly_san_pham.php">Danh sách sản phẩm</a></li>
						<li><a href="../admin/them_san_pham.php">Thêm sản phẩm</a></li>
                    </ul>
                </li>
            
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý khách hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="../admin/quan_ly_khach_hang.php">Danh sách khách hàng</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Xử lý đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="../admin/danh_sach_don_hang.php">Danh sách đơn hàng</a></li>
                    </ul>
                </li>

            </ul>           
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>