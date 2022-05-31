<?php
require "inc/config.php";
if (isset($_POST['Dat'])) {
    if (isset($_SESSION['cart'])) {

        foreach ($_SESSION['cart'] as $key  => $value) {
            $item[] = $key;
        }
        $str = implode(",", $item);
        $query = "SELECT s.product_id,s.product_name,s.price,s.image,s.discount,s.author,s.description
				from product s 
				 WHERE  s.product_id  in ($str)";
        $result = $conn->query($query);
        $id = isset($_SESSION['txtus']);
        $total = $_POST['total'];
        $totalkcodv = $_POST['totalkcodv'];
        $email =  $_SESSION['email'];
        $ngaygiao = $_POST['date'];
        $tenkh = $_SESSION['HoTen'];
        $diachi = $_POST['diachi'];
        $dienthoai =  $_SESSION['dienthoai'];
        $status = 0;
        $hinhthucthanhtoan = $_POST['hinhthuctt'];

        $sql1 = "INSERT INTO bill (user_id,name_user,total_money,status,date,address,email,phone,note)
                VALUES ('$id','$tenkh','$totalkcodv','$status','$ngaygiao', '$diachi','$email','$dienthoai','$hinhthucthanhtoan');";
        if ($conn->query($sql1) === TRUE) {
            foreach ($result as $s) {
                $masp = $s["product_id"];
                $price = $s["price"] - $s["price"] * ($s["discount"] / 100);
                if ($s["discount"] != 0) {
                    $dongia = $price;
                }
                if ($s["discount"] == 0) {
                    $dongia = $s["price"];
                }

                $sl = $_SESSION['cart'][$s["product_id"]];
                $thanhtien =  $sl * $dongia;
                //tao mang hd de lua sodh cua sql1
                $hd[] =  mysqli_insert_id($conn);
                //lua mang
                $str = implode(",", $hd);
                $sql2 = "INSERT INTO  detail_bill (bill_id,product_id,price,amount,date) 
                       VALUES ('$str','$masp' ,'$dongia','$sl','$ngaygiao');";

                if ($conn->query($sql2) === TRUE) {
                    include 'rm-cart.php';
                    header('Location: xacnhandonhang.php');
                    // destroy the session 
                    // session_destroy();
                } else {
                    echo "Error: " . $sql2 . "<br>" . $conn->error;
                }
            }
        }
    }
}
