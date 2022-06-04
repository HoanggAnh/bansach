<?php
session_start();
$kq = "";
if(isset($_POST['dnhapadmin']))
{

    require '../inc/config.php';
    $tk = $_POST['txtdangnhap'];
    $mk = $_POST['txtmatkhau'];

    if ($tk == "hoanganhh@gmail.com" && $mk == "123")
    {
        $sql="SELECT * FROM users where email = '$tk'  and password = '$mk'  ";
        $result = $conn->query($sql);
        // echo  $mk;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $_SESSION['tendangnhap'] = $row["email"];
                header('Location: index.php');
                $row = $result->fetch_assoc();  
            }         
        }
    }
    else
    {
        $kq ="Thông tin không đúng vui lòng kiềm tra lại";
    }
}
