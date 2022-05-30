

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
            Quản lý
            <small>hóa đơn</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
      

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Quản lý hóa đơn</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       <th>Số đơn hàng</th>
                        <th>Tên Sách</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th> 
                        <th>Ngày giao hàng </th>       
                        <th>Dịch vụ</th>               
                      </tr>
                    </thead>
                    <tbody>  
               
                    <?php
                         require '../inc/config.php';
                         $sql="SELECT h.sodh,soluong,dongia,h.thanhtien
                         ,s.Ten as tensanpham,ngaygiao,madv
                         from chitiethoadon c 
                         LEFT JOIN sanpham s on s.ID= c.masp
                         LEFT JOIN hoadon h on h.sodh= c.sodh Order by tensanpham  ";
                         $result = $conn->query($sql); 
                         if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                      ?>       
                        <tr>     
                        <td><?php  echo $row["sodh"] ?></td>                                                   
                        <td ><a href ="chitiethd.php?sodh=<?php echo $row["sodh"]?>" style="color:black"><?php echo $row["tensanpham"] ?>  </a>     
                        </td>
                        <td><?php  echo $row["soluong"] ?></td>
                        <td><?php  echo $row["dongia"] ?>.000 VNĐ</td>
                        <td><?php  echo $row["thanhtien"] ?>0 VNĐ</td>  
                        <td><?php 
                        //chuyen ngaygiao thanh kieu  ngay thang nam
                        $date=date_create($row["ngaygiao"]);
                        echo date_format($date,"d/m/Y");
                         ?></td>   
                        <td>
                        <?php
                        if($row["madv"]!= "")
                        {
                         ?>
                        <?php
                        $ma= $row["madv"];
                        // $madv= implode(",",$ma);
                        $sql="SELECT tendv from dichvu where madv  in ($ma)";
                        $results = $conn->query($sql);
                        if ($results->num_rows > 0) {
                          // output data of each row
                          while($s = $results->fetch_assoc()) {
                         // output data of each row
                           echo "<p>".$s["tendv"] ."</p>";                      
                        }
                      }
                        ?>
                        <?php
                        }
                         ?>
                        </td>        
                        </tr>
           
                        <?php
                        
                          }
                        }
                         ?>

                      
                    </tbody>                   
                  </table>
              
                </div><!-- /.box-body -->
             
             
              </div><!-- /.box -->
            
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
        <!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php 
      include "footer.php";
     ?>                 			
  <?php 
 include "ControlSidebar.php";
?>
      <!-- Control Sidebar -->
  
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
