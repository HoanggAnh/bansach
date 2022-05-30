<?php 
include "head.php";

?>
 <body class="hold-transition skin-blue sidebar-mini">
   <div class="wrapper">
   <?php 
include "Header.php";
?> 
   <?php 
include "aside.php";
?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php
   require '../inc/config.php';
   //lay san pham theo id
   $sodh = $_GET["sodh"];
   $query="SELECT * from hoadon
	WHERE  sodh =".$sodh;
   $result = $conn->query($query);
$row = $result->fetch_assoc();

?>
        <section class="content-header">
          <h1>
            Thông tin
            <small>hóa đơn</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->

            <!-- right column -->
  
            <div class="col-md-12" >
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title" style="text-align: center"> Thông tin hóa đơn</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" >
                  <div class="box-body" >
                  <div class="form-group">
                      <label  class="col-sm-2">Số đơn hàng:</label>
                      <div class="col-sm-5">
                      <p><?php echo $row["sodh"] ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2">Tên khách hàng:</label>
                      <div class="col-sm-5">
                      <p><?php echo $row["tenkh"] ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                    <label  class="col-sm-2 ">Email khách hàng:</label>
                    <div class="col-sm-5">
                      <p><?php echo $row["emailkh"] ?></p>
                      </div> 
                    </div>    
                    <div class="form-group">
                    <label  class="col-sm-2 ">Địa chỉ giao hàng:</label>
                    <div class="col-sm-5">
                      <p><?php echo $row["diachi"] ?></p>
                      </div> 
                    </div> 
                    <div class="form-group">
                    <label  class="col-sm-2 ">Điện thoại khách hàng:</label>
                    <div class="col-sm-5">
                      <p><?php echo $row["dienthoai"] ?></p>
                      </div> 
                    </div> 
                    <div class="form-group">
                    <label  class="col-sm-2 ">Hình thức thanh toán:</label>
                    <div class="col-sm-5">
                      <p><?php echo $row["hinhthucthanhtoan"] ?></p>
                      </div> 
                    </div>               
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  <a href="quanlyhoadon.php"><button type="button" name="cancel" class="btn btn-default">Cancel</button></a>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            <!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php 
      include "footer.php";
     ?>
  <?php 
 include "ControlSidebar.php";
?>
      <div class="control-sidebar-bg">
      </div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>


