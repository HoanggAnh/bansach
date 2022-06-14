<?php
ob_start();
?>
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Sửa
          <small>Thể loại</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang quản trị</a></li>
        </ol>
      </section>
      <?php
      require '../inc/config.php';
      //lay san pham theo id
      $id = $_GET["id"];
      $query = "SELECT catalog_id, catalog_name from product_catalog where catalog_id = " . $id;
      $result = $conn->query($query);
      $row = $result->fetch_assoc();

      ?>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->

          <!-- right column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Sửa Thể loại</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?php include 'xulysuanhasx.php' ?>">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tên Thể loại</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" required value="<?php echo $row["catalog_name"] ?>">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $row["catalog_id"] ?>">
                    </div>
                  </div>

                  <div class="box-footer">
                    <a href="qlynhasx.php"><button type="button" name="cancel" class="btn btn-default">Cancel</button></a>
                    <button type="submit" name="Edit" class="btn btn-info pull-right">Edit</button>
                  </div><!-- /.box-body -->
                </div><!-- /.box-footer -->
              </form>
            </div><!-- /.box -->
            <!-- general form elements disabled -->
            <!-- /.box -->
          </div>
          <!--/.col (right) -->
        </div> <!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?php
    include "footer.php";
    ?>
    <?php
    include "ControlSidebar.php";
    ?>
    <div class="control-sidebar-bg"></div>
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
    $(function() {
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
<?php ob_end_flush(); ?>