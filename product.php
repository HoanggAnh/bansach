<?php
session_start();
?>
<?php
include "header.php";
include "navh.php";
include "navbar.php"
?>

<hr style=" border: 1.5px solid">
<div id="page-content" class="single-page">
    <?php
    require 'inc/config.php';
    //lay san pham theo id
    $id = $_GET["id"];
    $query = "SELECT s.product_id,s.catalog_id,s.product_name,s.input_price,s.price,s.discount,s.image,s.author,s.description
   from product s 
--    LEFT JOIN product_catalog p on p.catalog_id = s.catalog_id
	WHERE  s.product_id =" . $id;
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    //lay the loai sach theo catalog_id
    $catalog_id = $row["catalog_id"];
    $query_catalog_id = "SELECT c.catalog_name
   from product_catalog c 
--    LEFT JOIN product_catalog p on p.catalog_id = s.catalog_id
	WHERE  c.catalog_id =" . $catalog_id;
    $result_catalog = $conn->query($query_catalog_id);
    $row_catalog = $result_catalog->fetch_assoc();

    if (isset($_POST['submit'])) {
        $idsp = $_POST["idsp"];
        $sl;
        if (isset($_SESSION['cart'][$idsp])) {
            $sl = $_SESSION['cart'][$idsp] + 1;
        } else {
            $sl = 1;
        }
        $_SESSION['cart'][$idsp] = $sl;
        header:
        ("location: cart.php");
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb" style="background-color: #323741">
                    <li><a style="color:#fcc39b" href="index.php">Home</a></li>
                    <li><a style="color:#fcc39b" href="#">Book</a></li>
                    <li><a style="color:#fcc39b" href="#"><?php echo $row["product_name"] ?></a></li>
                </ul>
            </div>
        </div>
        <div class="row">

            <div id="main-content" class="col-md-8">
                <div class="product">
                    <div class="col-md-6">
                        <div class="image">
                            <img src="images/<?php echo $row["image"] ?>" style="width:300px;height:300px" />

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="caption">
                            <div class="name">
                                <h3 style="color:#f3906c"><?php echo $row["product_name"] ?></h3>
                            </div>
                            <div class="info">
                                <ul>
                                    <li>Author: <b><?php echo $row["author"] ?></b></li>
                                    <li>Category: <a href="/category.php?manhasx=<?php echo $row["catalog_id"] ?>"><?php echo $row_catalog["catalog_name"] ?></a>
                                        <h3>
                                    </li>
                                </ul>
                            </div>
                            <?php
                            if ($row["discount"] != 0) {
                                $price = $row["price"] - $row["price"] * ($row["discount"] / 100);
                                $priceToString = number_format((float)$price, 1, ',', '');
                                // sprintf("%.1f", $price);
                            ?>
                                <div class="price" style="color: red; font-size: 2rem"><span style="font-size: 14px; color: grey"><?php echo $row["price"] ?>,000₫ <i class="fas fa-arrow-right"></i></span><?php echo $priceToString ?>00₫ </div>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row["discount"] == 0) {
                            ?>
                                <p style="color:red">No Discount</p>
                                <div class="price"><?php echo $row["price"] ?>,000 VNĐ<span></span></div>
                            <?php
                            }
                            ?>

                            <div class="well">
                                <form name="form3" id="ff3" method="POST" action="">
                                    <input type="submit" name="submit" id="add-to-cart" class="btn btn-2" value="Add To Cart" />
                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Buy Now</a>
                                    <input type="hidden" name="acction" value="them vao gio hang" />
                                    <input type="hidden" name="idsp" value="<?php echo $row["product_id"] ?>" />
                                </form>
                            </div>


                            <div class="modal fade" id="myModal" role="dialog">

                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="text-align: center">Profile</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Chức năng mua ngay giúp bạn mua nhanh mà không cần đăng nhập hoặc đặt hàng với một thông tin khác với thông tin trên tài khoản. Tuy nhiên bạn chỉ có thể mua một loại sách trong một lần đặt hàng, bạn nên đăng nhập để không phải nhập lại thông tin cũng như mua nhiều loại sách cùng lúc.</p>
                                            <form name="form6" id="ff6" method="POST" action="<?php include "luumuangay.php" ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Tên:" name="name" id="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Email :" name="email" id="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="tel" class="form-control" placeholder="Điện thoại :" name="phone" id="phone" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Địa chỉ :" name="txtdiachi" id="txtdiachi" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" placeholder="Số lượng:" name="txtsoluong" id="txtsoluong" required>
                                                </div>
                                                <div class="form-group">
                                                    <label><input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose" required></label>
                                                </div>
                                                <div class="form-group">
                                                    <label> Method of Payment:<select class="selectpicker" name="hinhthuctt">
                                                            <option value="ATM">Card</option>
                                                            <option value="Live">Cash</option>
                                                            </optgroup>
                                                        </select>
                                                        </lable>
                                                </div>

                                                <input type="hidden" name="idsp" value="<?php echo $row["product_id"] ?>" />
                                                <input type="hidden" name="gia" value="<?php echo $row["price"] ?>" />
                                                <button type="submit" name="muangay" class="btn btn-1">Order</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="product-desc">
                    <div class="tab-content">
                        <div id="description" class="tab-pane fade in active">
                            <h4 style="color:#f3906c">Book Content:</h4>

                            <div innerHTML>
                                <p><?php echo $row["description"] ?></p>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
                include "sanphamlienquan.php"
                ?>

                <div class="clear"></div>
            </div>
        </div>
        <?php
        include "sidebar.php"
        ?>
    </div>
</div>
</div>

<?php
include "footer.php"
?>
<!-- IMG-thumb -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $(".nav-tabs a").click(function() {
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function(event) {
            var x = $(event.target).text(); // active tab
            var y = $(event.relatedTarget).text(); // previous tab
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    });

    if (isset($_POST['submit'])) {
        header("Refresh: 0");
    }
</script>
</body>

</html>
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
    // document.getElementById("add-to-cart").onclick = function(){
    // 	setTimeut(function(){
    // 		window.location.replace("http://localhost/MobileShop/cart.php");
    // 	}, 2000);
    // }
</script>