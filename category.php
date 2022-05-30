<?php
ob_start();
?>
<?php
include "login.php";
include "header.php";
include "navh.php";
include "navbar.php";
?>

<hr style=" border: 1.5px solid">
<div id="page-content" class="single-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div id="main-content" class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="products">
							<?php
							require 'inc/config.php';
							//lay san pham theo id
							$manhasx = $_GET["manhasx"];
							$result = mysqli_query($conn, 'select count(product_id) as total from product where catalog_id = ' . $manhasx);
							$row = mysqli_fetch_assoc($result);
							$total_records = $row['total'];
							if ($row['total'] == 0) {
								header('Location: khongcosanpham.php');
							}
							$offset = 1;
							// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
							$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
							$limit = 6;
							// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
							// tổng số trang
							$total_page = ceil($total_records / $limit);

							// Giới hạn current_page trong khoảng 1 đến total_page
							if ($current_page > $total_page) {
								$current_page = $total_page;
							} else if ($current_page < 1) {
								$current_page = 1;
							}

							// Tìm Start
							$start = ($current_page - 1) * $limit;

							// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH
							// Có limit và start rồi thì truy vấn CSDL lấy danh Sách
							$result = mysqli_query($conn, "SELECT * FROM product where catalog_id = '$manhasx' LIMIT $start, $limit ");
							// output data of each row
							while ($row = mysqli_fetch_assoc($result)) {

							?>

								<div class="col-lg-4 col-md-4 col-xs-12">
									<div class="product">
										<div class="image"><a href="product.php?id=<?php echo $row["product_id"] ?>"><img src="images/<?php echo $row["image"] ?>" style="width:200px;height:200px" /></a></div>
										<div class="caption">
											<div class="name">
												<h3><a style="color:#f3906c" href="product.php?id=<?php echo $row["product_id"] ?>"><?php echo $row["product_name"] ?></a></h3>
											</div>
											<div class="price"><?php echo $row["price"] ?>.000 VNĐ</div>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>

				</div>


				<div class="row text-center">
					<ul class="pagination">
						<?php
						// PHẦN HIỂN THỊ PHÂN TRANG
						// BƯỚC 7: HIỂN THỊ PHÂN TRANG

						// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
						for ($i = 1; $i <= $total_page; $i++) {
							if ($i == $current_page) {

						?>
								<li class="active"><a href="#"><?php echo $i  ?></a></li>
							<?php
							}

							?>
							<?php
							if ($i != $current_page) {
							?>
								<li><?php echo '<a href="category.php?manhasx=' . $manhasx . '&page=' . $i . '">' . $i . '</a> '; ?></li>
							<?php
							}
							?>
						<?php
						}
						?>
					</ul>
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
</body>

</html>
<?php ob_end_flush(); ?>