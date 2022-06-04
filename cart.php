<?php
ob_start();
?>
<?php
require "login.php";
if (!isset($_SESSION['txtus'])) // If session is not set then redirect to Login Page
{
	header("Location:search-unavailable.php");
}

?>
<?php
include "header.php";
include "navh.php";
include "navbar.php";
?>


<?php
if (is_countable($_SESSION['cart']) == 0) {
	header('Location: empty-cart.php');
}
?>

<hr style=" border: 1.5px solid">
<div id="page-content" class="single-page">
	<div class="container">
		<div class="row">

			<div class="cart">
				<p><?php
					$ok = 1;
					if (isset($_SESSION['cart'])) {
						foreach ($_SESSION['cart'] as $key => $value) {
							if (isset($key)) {
								$ok = 2;
							}
						}
					}

					if ($ok == 2) {
						echo "<p style='font-size: 2rem'> Have " . count($_SESSION['cart']) . " Books In Cart </p>";
					} else {
						echo   "<p>There are no books in the cart.</p>";
					}

					$sl = count($_SESSION['cart']);
					?>
				</p>
			</div>
			<?php

			require "inc/config.php";

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

					<div class="row">
						<form name="form5" id="ff5" method="POST" action="remove-cart.php">
							<!-- <div class="product well"> -->
							<div class="col-md-3">
								<div class="image">
									<img src="images/<?php echo $s["image"] ?>" style="width:250px;height:250px; margin-top:20px; margin-bottom:20px" />
								</div>
							</div>
							<div class="col-md-9">
								<div class="caption">
									<div class="name">
										<h3><a href="product.php?id=<?php echo $s["product_id"] ?>"><?php echo $s["product_name"] ?></a></h3>
									</div>
									<div class="info">
										<ul style="list-style-type: none;">
											<li>Author: <?php echo $s["author"] ?></li>
											<li>
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
											</li>
										</ul>
									</div>

									
									<label>Quantity: </label>
									<input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max="99" type="number" name="qty[<?php echo $s["product_id"] ?>]" value="<?php echo $_SESSION['cart'][$s["product_id"]] ?>">
									<div>
										<input type="submit" name="update" style="margin-top:31px" value="Update" class="btn btn-2" />
									</div>
									<hr>
									<?php if($sl >= 2) {?>
										<input type="submit" name="remove" value="Delete" class="btn btn-default pull-right" style="margin-bottom:5px">
									<?php } ?>
									<input type="hidden" name="idsprm" value="<?php echo $s["product_id"] ?>" />
									<?php
										$priceUpsale1 = ($s["price"] - $s["price"] * ($s["discount"] / 100));
										$priceUpsaleToString1 = number_format((float)($_SESSION['cart'][$s["product_id"]] * $priceUpsale1), 1, ',', '');
									?>
										<label style="color:red">Total: <?php
																		echo $priceUpsaleToString1;
																		?>00 </label>
								</div>
							</div>

							<div class="clear"></div>
							<!-- </div>	 -->
						</form>
						<?php
							$total += $_SESSION['cart'][$s["product_id"]] * $priceUpsale1; 
						?>	
					</div>
			<?php
				}
			}
			?>

			<div class="row" style="margin-bottom:50px">
				<a href="rm-cart.php" class="btn btn-2" style="margin-bottom:31px">Clean the cart</a>
				<div class="col-md-4 col-md-offset-8 ">
					<center><a href="index.php" class="btn btn-1" style="margin-left:-76px">Choose another books</a></center>
				</div>
				<div class="row">
					<div class="pricedetails">
						<div class="col-md-4 col-md-offset-8">
							<table style="margin-right:31px">
								<h5>Price Details</h5>
								<tr>
									<td>Type of Books: <?php echo $sl ?></td>
								</tr>
								<tr style="border-top: 1px solid #333">
									<td>
										<h5>Total</h5>
									</td>
									<td><?php echo number_format((float)($total), 1, ',', '') ?>00</td>
								</tr>
							</table>
							<center><a href="dathang.php" class="btn btn-1">Order</a></center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include "footer.php"
	?>
	</body>

	</html>
	<?php ob_end_flush(); ?>