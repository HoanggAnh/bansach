<?php
include 'header.php';
?>

<main style="background-color: #f7f7ff">
  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <img src="images/logoms.png" alt="" class="img-fluid logo">
     <!-- NAVBAR -->
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left links -->
        <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
          <li class="nav-item text-center mx-2 mx-lg-1">
            <a class="nav-link-c active" aria-current="page" href="index.php">
              <div>
                <i class="fas fa-home fa-lg mb-1"></i>
              </div>
              Home
            </a>
          </li>
          <li class="nav-item dropdown text-center mx-2 mx-lg-1"><a href="#" class="nav-link-c dropdown-toggle" data-toggle="dropdown">
            <div>
              <i class="fas fa-book fa-lg mb-1"></i>
            </div>
            Publisher
          </a>
            <div class="dropdown-menu">
              <div class="dropdown-inner">
                <ul>
                  <?php
                  //lay id nha san xuat
                  require 'inc/config.php';
                  $laydanhsachnhasx = "SELECT ID as manhasx,Ten from nhaxuatban";
                  $rstennhasx = $conn->query($laydanhsachnhasx);
                  if ($rstennhasx->num_rows > 0) {
                    // output data of each row
                    while ($row = $rstennhasx->fetch_assoc()) {

                  ?>
                      <li><a href="category.php?manhasx=<?php echo $row["manhasx"] ?>"><?php echo $row["Ten"] ?></a></li>
                  <?php
                    }
                  }
                  ?>
                  </div>
            </div>
                  <li class="nav-item text-center mx-2 mx-lg-1">
                    <a class="nav-link-c active" href="cart.php">
                      <div>
                        <i class="fas fa-shopping-cart fa-lg mb-1"></i>
                      </div>
                      Cart
                    </a>
                  </li>
                  <li class="nav-item text-center mx-2 mx-lg-1">
                    <a class="nav-link-c active" href="contact.php">
                      <div>
                        <i class="fas fa-envelope fa-lg mb-1"></i>
                      </div>
                      Contact
                    </a>
                  </li>
                </ul>
              </div>
              <!-- Collapsible wrapper -->


              <!-- Toggle button -->
              <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-light"></i>
              </button>

              <!-- Right links -->

              <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
                <form class="form-search d-flex input-group w-auto ms-lg-3 my-3 my-lg-0" method="GET" action="search.php">
                  <input type="text" style="border:none !important; padding: 0" class="input-medium search-query" name="txttimkiem" placeholder="  Enter a book name..." required>
                  <button style="height:50px" type="submit" name="tk" class="btn btn-outline-white" data-mdb-ripple-color="dark"><i class="fas fa-search"></i> Search</button>
                </form>

                <!-- <li class="nav-item text-center mx-2 mx-lg-1">
                  <a class="nav-link" href="#!">
                    <div>
                      <i class="fas fa-shopping-cart fa-lg mb-2"></i>
                      <span class="badge rounded-pill badge-notification bg-dark">10</span>
                    </div>
                  </a>
                </li> -->

                <div class="nav-item text-center mx-2 mx-lg-1">
				<div id="cart"><a  href="cart.php"><i class="fas fa-shopping-cart fa-lg mb-2" style="margin-top: 15px"></i>(<?php
			$ok=1;
			 if(isset($_SESSION['cart']))
			 {
				 foreach($_SESSION['cart'] as $key => $value)
				 {
					 if(isset($key))
					 {
						$ok=2;
					 }
				 }
			 }
			
			 if($ok == 2)
			 {
				echo count($_SESSION['cart']);
			 }
			else
			{
				echo   "0";
			}
			
			
			?>)</a></div>
			</div>
		</div>

              </ul>
              <!-- Right links -->
            </div>
            <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->


  