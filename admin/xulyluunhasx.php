<?php
if(isset($_POST['create']))
{
    require '../inc/config.php';
    $name = $_POST['name'];
    $sql="INSERT INTO  nhaxuatban (Ten) 
    VALUES ('$name')";
    // echo  $mk;
    if (mysqli_query($conn, $sql)) {
        header('Location: qlynhasx.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

 ?>