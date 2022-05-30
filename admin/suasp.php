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
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php
   require '../inc/config.php';
   //lay san pham theo id
   $id = $_GET["id"];
   $query="SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.tacgia,s.KhuyenMai,s.giakhuyenmai,s.Mota, n.Ten as Tennhasx,s.Manhasx
   from sanpham s 
   LEFT JOIN nhaxuatban n on n.ID = s.Manhasx
	WHERE  s.id =".$id;
   $result = $conn->query($query);
$row = $result->fetch_assoc();

?>
        <section class="content-header">
          <h1>
            Sửa
            <small>Sách</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang quản trị</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Sửa Sách</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal"  method="POST" action="<?php include 'xulysuasp.php'?>" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?php echo $row["Ten"] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Hình ảnh</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinhanh" value="<?php echo $row["HinhAnh"] ?>">
                      </div>
                      </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tác giả</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tacgia" value="<?php echo $row["tacgia"] ?>" required>
                      </div>
                    </div>
                      <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Ảnh hiện tại:   </label>
                        <div class="col-sm-10">
                      <img src="../images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px">
                        </div>
                      </div>
                      <input type="hidden" class="form-control" name="anh" value="<?php echo $row["HinhAnh"] ?>">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $row["ID"] ?>">
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nhà xuất bản</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="manhasx">
                      <option selected="selected" value="<?php echo $row["Manhasx"] ?>"><?php echo $row["Tennhasx"] ?></option>
                      <?php
                         require '../inc/config.php';
                         $sqls="SELECT ID,Ten from nhaxuatban where ID !=".$row["Manhasx"] ;
                         $results = $conn->query($sqls); 
                         if ($results->num_rows > 0) {
                          // output data of each row
                          while($rows = $results->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $rows["ID"] ?>"><?php echo $rows["Ten"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Ngày</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" id="datechoose" required name="ngay" value="<?php echo $row["date"] ?>" placeholder="Password">
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Giá</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="gia" required value="<?php echo $row["Gia"] ?>">
                    </div>
                    </div>
                    <?php 
                       if($row["KhuyenMai"]  == 1)
                       {
                    ?>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Khuyến mãi</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="khuyenmai">
                    <option selected="selected" value="1">Có khuyến mãi</option>
                    <option  value="0">Không khuyến mãi</option>
                    </select>
                    </div>
                    </div>
                    <?php
                       }
                     ?>
                                  <?php 
                       if($row["KhuyenMai"]  == 0)
                       {
                    ?>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Khuyến mãi</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="khuyenmai">
                    <option selected="selected" value="0">False</option>
                    <option  value="1">True</option>
                    </select>
                    </div>
                    </div>
                    <?php
                       }
                     ?>
                                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" >Giá khuyến mãi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="giakhuyenmai" value="<?php echo $row["giakhuyenmai"] ?>">
                    </div>
                    </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                    <textarea id="editor1" name="editor1" name="editor1"  rows="10" cols="80">
                    <?php echo $row["Mota"] ?>
                    </textarea>
                    </div>
                  </div>
               
                  <div class="box-footer">
                  <a href="qlysanpham.php"><button type="button" name="cancel" class="btn btn-default">Cancel</button></a>
                    <button type="submit" name="Edit" class="btn btn-info pull-right">Edit</button>
                    </div><!-- /.box-body -->
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            <!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
           
      <?php 
      include "footer.php";
     ?>

      </div><!-- /.content-wrapper -->
  
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
<?php ob_end_flush(); ?>

