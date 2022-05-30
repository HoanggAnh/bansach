<?php
session_start();
$id = "";
$tk = "";
$mk = "";
$kq = "";
if(isset($_POST['submit']))
{
    require 'inc/config.php';
    $tk = $_POST['txtus'] ;
    $mk = $_POST['txtem'];
    $sql="SELECT * FROM users  where email = '$tk'  and password = '$mk'";
    $result = $conn->query($sql);
    // echo  $mk;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        $_SESSION['txtus'] = $tk ;
        $_SESSION['HoTen'] = $row["fullname"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['dienthoai'] = $row["phone"];
            header('Location: index.php');
            $row = $result->fetch_assoc();  
        }         
    }
    else
    {
        $kq ="Thông tin không đúng vui lòng kiềm tra lại";
    }
}
?>