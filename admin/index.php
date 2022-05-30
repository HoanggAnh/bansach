<?php
ob_start();
?>
<?php 
 include "head.php";
?>
<?php
 require "loginAdmin.php";
      if(!isset($_SESSION['tendangnhap'] )) // If session is not set then redirect to Login Page
       {
           header("Location:login.php");  
       }

?>
  <body class="hold-transition skin-blue sidebar-mini" >
    <div class="wrapper" >

    <?php 
 include "Header.php";
?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php 
 include "aside.php";
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 901px; background-color: #1a2226">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="color: #f3906c">
           Trang quản trị
            <small style="color: #fcc39b">Admin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#" style="color: #fcc39b"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" style="color: #fcc39b">Trang quản trị</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <h3>Quản lý</h3>
                  <p>Sách</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="qlysanpham.php" class="small-box-footer">xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h3>Quản lý</h3>
                  <p>Nhà xuất bản</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-home"></i>
                </div>
                <a href="qlynhasx.php" class="small-box-footer">xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                <h3>Quản lý</h3>
                  <p>Dịch vụ</p>
                </div>
                <div class="icon">
                  <i class="fa fa-television"></i>
                </div>
                <a href="quanlydv.php" class="small-box-footer">Xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
     
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                <h3>Danh Sách</h3>
                  <p>Khách hàng</p>
                </div>
                <div class="icon">
                  <i class="ion-person-stalker"></i>
                </div>
                <a href="qlykhachhang.php" class="small-box-footer">Xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <h3>Danh Sách</h3>
                  <p>Hóa đơn</p>
                </div>
                <div class="icon">
                  <i class="ion-printer"></i>
                </div>
                <a href="quanlyhoadon.php" class="small-box-footer">Xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            </div><!-- /.row -->
          <!-- Main row -->
        
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php 
 include "footer.php";
?>

      <!-- Control Sidebar -->
      <?php 
 include "ControlSidebar.php";
?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <?php 
 include "script.php";
?>
  </body>
 
</html>
<?php ob_end_flush(); ?>
