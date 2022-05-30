<?php
ob_start();

?>
<?php
require "login.php";
if (!isset($_SESSION['txtus'])) // If session == null thi tra ve trang login
{
	header("Location:account.php");
}

?>

<?php
include "header.php";
include "navh.php";
include "navbar.php";
?>

<hr style=" border: 1.5px solid">
<form name="form6" id="ff6" method="POST" action="<?php include 'luudonhang.php' ?>">
	<div id="page-content" class="single-page">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb" style="background-color: #323741">
						<li><a style="color:#fcc39b" href="index.php">Home</a></li>
						<li><a style="text-align:center; color:#fcc39b">Confirm</a></li>
					</ul>
				</div>
			</div>

			<div class="row">

				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">Profile</div>
						<div class="panel-body">
							<div class="col-md-8" style="margin-left: 130px;">
								<ul style="list-style-type: none;">
									<li><label>Name : <?php echo  $_SESSION['HoTen'] ?></label></li>
									<li><label>Mobile: <?php echo  $_SESSION['dienthoai'] ?></label></li>
									<li><label>Email: <?php echo    $_SESSION['email'] ?></label></li>
								</ul>
								<label><input type="text" class="form-control" placeholder="Nhập địa chỉ giao hàng   :" name="diachi" required></label>
								<br />

								<label><input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose" required></label>
								<label> Method of payment:<select class="selectpicker" name="hinhthuctt">
										<option value="ATM">Card</option>
										<option value="Live">Cash</option>
										</optgroup>
									</select>
								</label>

							</div>

						</div>

					</div>
					</select>
				</div>
				<div class="col-lg-5">
					<div class="panel panel-default">
						<div class="panel-heading">Order Information</div>
						<div class="panel-body">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Book: </th>
												<th>Quantity: </th>
												<th>Total: </th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($_SESSION['cart'])) {
												foreach ($_SESSION['cart'] as $key  => $value) {
													$item[] = $key;
												}
												// echo $item;
												$str = implode(",", $item);
												// $priceUpsale = $row["price"] - $row["price"] * ($row["discount"] / 100);
												$query = "SELECT s.product_id,s.product_name,s.price,s.image,s.discount,s.author,s.description
															from product s 
															WHERE  s.product_id  in ($str)";
												$result = $conn->query($query);
												$total = 0;
												foreach ($result as $s) {
											?>
													<tr>
														<td><?php echo $s["product_name"] ?></td>
														<td><?php echo $_SESSION['cart'][$s["product_id"]] ?></td>
														<?php
														$price = $s["price"] - $s["price"] * ($s["discount"] / 100);
														$priceToString = number_format((float)$price, 1, ',', '');
														if ($s["discount"] != 0) {
														?>
															<td><?php echo $priceToString ?>00 VNĐ</td>
														<?php
														}
														?>
														<?php
														if ($s["discount"] == 0) {
														?>
															<td><?php echo $s["price"] ?>,000 VNĐ</td>
														<?php
														}
														?>

													</tr>
													<?php
													$total += $_SESSION['cart'][$s["product_id"]] * $price
													?>

											<?php
												}
											} ?>
										</tbody>
									</table>
									<table class="table">
										<thead>
											<tr>
												<th>Total:</th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th name="result" style="color:red"><strong style="color:red" id="result" name="total"><?php echo  number_format((float)$total, 1, ',', '') ?>00 VNĐ</strong></th>
												<input type="hidden" id="thannhtien" name="totalkcodv" value="<?php echo  $total    ?>" />
												<input type="hidden" name="total" id="total" value="" />
												<input type="hidden" name="madv" id="madv" value="" />
											</tr>
										</thead>
										<tbody>
											<tr>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading">Book (<?php echo count($_SESSION['cart']) ?>)</div>
					<div class="panel-body">
						<?php

						require "inc/config.php";
					
						if (isset($_SESSION['cart'])) {
							foreach ($_SESSION['cart'] as $key  => $value) {
								$item[] = $key;
							}
							// echo $item;
							$str = implode(",", $item);
							// $priceUpsale = $row["price"] - $row["price"] * ($row["discount"] / 100);
							$query = "SELECT s.product_id,s.product_name,s.catalog_id,s.price,s.image,s.discount,s.author,s.description
															from product s 
															WHERE  s.product_id  in ($str)";
							$result = $conn->query($query);
							$row_catalog_id = $result->fetch_assoc();

							//lay the loai sach theo catalog_id
							$catalog_id = $row_catalog_id["catalog_id"];
							$query_catalog_id = "SELECT c.catalog_name
							from product_catalog c 
							WHERE  c.catalog_id =" . $catalog_id;
							$result_catalog_name = $conn->query($query_catalog_id);
							$row_catalog_name = $result_catalog_name->fetch_assoc();
							
							$total = 0;
							foreach ($result as $s) {
						?>
								<div class="product well">
									<div class="col-md-3">
										<div class="image" style=" float: right">
											<img src="images/<?php echo $s["image"] ?>" style="width:250px;height:250px" />
										</div>
									</div>
									<div class="col-md-9">
										<div class="caption">
											<div class="name">
												<h3><a style="color:#f3906c" href="product.php?id=<?php echo $s["product_id"] ?>"><?php echo $s["product_name"] ?></a></h3>
											</div>
											<div class="info">
												<ul style="list-style-type: none;">
													<li>Author: <label><?php echo $s["author"] ?></label></li>
													<li>Catalog: <label><?php echo $row_catalog_name["catalog_name"] ?></label></li>
												</ul>
											</div>
											<?php
											if ($s["discount"] != 0) {
												$priceUpsale = $s["price"] - $s["price"] * ($s["discount"] / 100);
												$priceUpsaleToString = number_format((float)$priceUpsale, 1, ',', '');
											?>
												<div class="price">Price: <?php echo $priceUpsaleToString ?>00 VND</div>
											<?php
											}
											?>
											<?php
											if ($s["discount"] == 0) {
											?>
												<div class="price">Price: <?php echo $s["price"] ?>,000 VND</div>
											<?php
											}
											?>
											<!-- <label>Số lượng: </label>  -->
											<input class="form-inline quantity" type="hidden" name="qty[<?php echo $s["product_id"] ?>]" value="<?php echo $_SESSION['cart'][$s["product_id"]] ?>">
											<hr>

											<lable>Quantity :<?php echo $_SESSION['cart'][$s["product_id"]] ?></lable>
											<input type="hidden" name="idsprm" value="<?php echo $s["product_id"] ?>" />
											<?php
											if ($s["discount"] != 0) {
												$priceUpsale1 = $s["price"] - $s["price"] * ($s["discount"] / 100);
												$priceUpsaleToString1 = number_format((float)$priceUpsale1, 1, ',', '');
											?>
												<input type="hidden" name="dongia" value="<?php echo $priceUpsaleToString1 ?>" />
											<?php
											}
											?>
											<?php
											if ($s["discount"] == 0) {
											?>
												<input type="hidden" name="dongia" value="<?php echo $s["price"] ?>" />
											<?php
											}
											?>

										</div>
									</div>

									<div class="clearfix"></div>
								</div>

								<?php
								$total += $_SESSION['cart'][$s["product_id"]] * $s["price"] ?>
						<?php
							}
						} ?>
					</div>
				</div>
			</div>
			<input type="submit" name="Dat" value="Đặt hàng" class="btn btn-1" style="margin-left: 50%; margin-bottom: 50px  " />
		</div>
	</div>
</form>
<?php
include "footer.php"
?>
</body>

</html>
<!-- Lấy ngày hiện tại -->
<script>
	var date = new Date();

	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();

	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;

	var today = year + "-" + month + "-" + day;
	document.getElementById("datechoose").value = today;
</script>


<?php ob_end_flush(); ?>