<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="heading">
				<h2>Lastest Books</h2>
			</div>
			<hr>

			<div class="products">
				<?php
				require 'inc/config.php';
				$result = mysqli_query($conn, 'select count(product_id) as total from product');
				$row = mysqli_fetch_assoc($result);
				$total_records = $row['total'];
				if ($row['total'] == 0) {
					header('Location: khongcosanpham.php');
				}
				$offset = 1;
				// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 4;
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

				$query = "SELECT * from product ORDER BY product_id DESC LIMIT $start, $limit;";
				$rs = $conn->query($query);
				if ($rs->num_rows > 0) {
					// output data of each row
					while ($row = $rs->fetch_assoc()) {

				?>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="product">
								<div class="image"><a href="product.php?id=<?php echo $row["product_id"] ?>"><img src="images/<?php echo $row["image"] ?>" style="width:250px;height:250px" /></a></div>
								<div class="caption">
									<div class="name">
										<h3 style="width : 250px; height: 27px;"><a style="color: #f3906c;" href="product.php?id=<?php echo $row["product_id"] ?>"><p style=" width : 250px; height: 27px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row["product_name"] ?></p></a></h3>
									</div>
									<div class="price"><?php echo $row["price"] ?>,000 VNĐ</div>
								</div>
							</div>

						</div>
				<?php
					}
				}
				?>
			</div>
			<!-- <div class="row text-center" style="margin: 0; margin-top:100px; display:block;"> -->
			<div class="row text-center" style="display: inline-block; margin: 0; display:block;">
				<div style="display: inline-block;">
					<ul class="pagination" style="text-align:center; padding:0;">
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
								<li><?php echo '<a href="index.php?page=' . $i . '">' . $i . '</a> '; ?></li>
							<?php
							}
							?>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
			<!-- </div> -->


		</div>
	</div>