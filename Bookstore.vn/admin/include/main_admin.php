<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="quan_tri.php" class="logo">
        ADMIN
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
                        <span>Quản lý danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="quan_ly_danh_muc.php">Danh sách danh mục sản phẩm</a></li>
						<li><a href="them_danh_muc.php">Thêm danh mục sản phẩm</a></li>
                    </ul>
                </li>

                
            
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý nhân viên</span>
                    </a>
                    <ul class="sub">
                        <li><a href="quan_ly_nhan_vien.php">Danh sách nhân viên</a></li>
                        <li><a href="them_nhan_vien.php">Thêm nhân viên</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="danh_sach_don_hang_admin.php">Danh sách đơn hàng</a></li>
                        <li><a href="duyet_don_hang.php">Duyệt đơn hàng</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý doanh thu</span>
                    </a>
                    <ul class="sub">
                        <li><a href="thong_ke_doanh_thu.php">Thống kê doanh thu</a></li>
                    </ul>
                </li>

            </ul>           
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>