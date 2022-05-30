<?php
session_start();
$kq = "";
if(isset($_POST['dnhapadmin']))
{

    require '../inc/config.php';
    $tk = $_POST['txtdangnhap'];
    $mk = $_POST['txtmatkhau'];
    $sql="SELECT * FROM loginadmin  where tendangnhap = '$tk'  and matkhau = '$mk'  ";
    $result = $conn->query($sql);
    // echo  $mk;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $_SESSION['tendangnhap'] = $row["tendangnhap"];
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