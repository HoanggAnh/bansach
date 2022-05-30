<?php
include 'header.php';
?>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #323741; margin: 0 auto">
        <div class="container-fluid">
                <p style="color:#fcc39b; margin-left:20px; margin-bottom:0">FREE SHIPING FOR ORDERS OVER $50</p>
                    <ul class="top-link navbar-nav ms-auto mb-2 mb-1g-0" style="margin-bottom:0 !important">
                        <?php
                        // require "login.php";
                        if (!isset($_SESSION['txtus'])) // If session is not set then redirect to Login Page
                        {
                            printf(' <li class="nav-item"><a class="nav-link active" href="account.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
										<li class="nav-item"><a class="nav-link active" href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>');
                        } else {
                            echo '<li class="nav-item" style="padding-top: 14px; color:lavender;"><span class="glyphicon glyphicon-user"></span>';
                            echo '<li class="nav-item" ><a class="nav-link active"  style="color:lavender;"><b>' . $_SESSION['HoTen'] . '</b></a></li>';
                            echo '<li class="nav-item"><a class="nav-link active" href="logout.php"> Log Out</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
    </nav>
</body>

    
