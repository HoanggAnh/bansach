<div id="sidebar" class="col-md-4">
	<div class="widget wid-categories">
		<div class="heading">
			<h3>Publishing House</h3>
		</div>
		<div class="content">
			<ul>
				<?php
				require 'inc/config.php';
				//lay san pham theo id
				$layidrandom = "SELECT product_id,product_name  from product";
				$kq = $conn->query($layidrandom);
				if ($kq->num_rows > 0) {
					// output data of each row
					while ($d = $kq->fetch_assoc()) {

				?>
						<li><a style="color: #f3906c" href="product.php?id=<?php echo $d["product_id"] ?>"><?php echo $d["product_name"] ?></a></li>
				<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
	<hr style=" border: 1px solid black">
	<div class="widget wid-product">
		<div class="heading">
			<h3>Lastest Books</h3>
		</div>
		<div class="content" style="margin-bottom: 50px ; padding-left: 35px">
			<?php
			require 'inc/config.php';
			$query = "SELECT * from product ORDER BY product_id DESC limit 4;";
			$rs = $conn->query($query);
			if ($rs->num_rows > 0) {
				// output data of each row
				while ($row = $rs->fetch_assoc()) {

			?>
					<div style="padding: 10px 0 10px 0;" class="product">
						<a href="product.php?id=<?php echo $row["product_id"] ?>"><img src="images/<?php echo $row["image"] ?>" style="width:80px;height:100px" /></a>
						<div class="wrapper">
							<h5>
								<a style="color:#f3906c;" href="product.php?id=<?php echo $row["product_id"] ?>"><?php echo $row["product_name"] ?></a>
								<br><label class="price"><?php echo $row["price"] ?>,000 VNĐ</label>
							</h5>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>