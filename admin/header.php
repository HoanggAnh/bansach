<?php
ob_start();
?>
<header class="main-header" >
        <!-- Logo -->
        <a href="index.php" class="logo" style="background-color: black" >
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini "><b>ThreeFaries</b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="color: #f3906c !important"><b>ThreeFaries</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" style="background-color: black" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
           
              <!-- Notifications: style can be found in dropdown.less -->
         
              <!-- Tasks: style can be found in dropdown.less -->
          
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../images/form1.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs" style="color: #f3906c">Tài khoản</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                      <a href="logout.php" class="btn btn-default btn-flat">Đăng xuất</a>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>
      <?php ob_end_flush(); ?>