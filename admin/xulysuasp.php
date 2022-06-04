<?php 
if(isset($_POST['Edit']))
{
require '../inc/config.php';
move_uploaded_file($_FILES['hinhanh']['tmp_name'] , '../images/'.$_FILES['hinhanh']['name']);
$id = $_POST['id'];
$name = $_POST['name'];
$hinhanh = $_FILES['hinhanh']['name'];
$manhasx = $_POST['manhasx'];
$gia = $_POST['gia'];
$mota = $_POST['editor1'];
$anh =  $_POST['anh'];
$giakhuyenmai = $_POST['giakhuyenmai'];
$tacgia = $_POST['tacgia'];
$pr = $_POST['gianhap'];
if($hinhanh == null)
{
    $sql = "UPDATE product SET catalog_id= '$manhasx', product_name='$name', input_price='$pr', price='$gia', discount ='$giakhuyenmai', image='$anh', author='$tacgia', description='$mota'
    WHERE product_id= '$id'" ;
    if ($conn->query($sql) === TRUE) {
        header('Location: qlysanpham.php');
    } else {
        header('Location: index.php');
    }
    $conn->close();
}
else{
    $sql = "UPDATE product SET catalog_id= '$manhasx', product_name='$name', input_price='$pr', price='$gia', discount ='$giakhuyenmai', image='$anh', author='$tacgia', description='$mota'
    WHERE product_id= '$id'" ;
    if ($conn->query($sql) === TRUE) {
        header('Location: qlysanpham.php');
    } else {
        header('Location: index.php');
    }
    $conn->close();
    }
}

?>
