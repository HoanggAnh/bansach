<?php
if(isset($_POST['create']))
{
    require '../inc/config.php';
    $name = $_POST['name'];
    $gia = $_POST['gia'];
    $sql="INSERT INTO  dichvu  (tendv,gia) 
    VALUES ('$name','$gia')";
    // echo  $mk;
    if (mysqli_query($conn, $sql)) {
        header('Location: quanlydv.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

 ?>