<?php
if(isset($_POST['create']))
{
    require '../inc/config.php';
    $name = $_POST['name'];
    $hinhanh = $_FILES['hinhanh']['name'];
    move_uploaded_file($_FILES['hinhanh']['tmp_name'] , '../images/'.$_FILES['hinhanh']['name']);
    $manhasx = $_POST['manhasx'];
    $gia = $_POST['gia'];
    $gianhap =$_POST['gianhap'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $tacgia = $_POST['tacgia'];
    $mota = $_POST['editor1'];

    $sql="INSERT INTO  product (catalog_id,product_name,input_price,price,discount,image,author,description) 
    VALUES ('$manhasx','$name','$gianhap','$gia','$giakhuyenmai','$hinhanh','$tacgia','$mota');";
    if ($conn->query($sql) === TRUE) {
      header('Location: qlysanpham.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // $conn->close();
}
 ?>