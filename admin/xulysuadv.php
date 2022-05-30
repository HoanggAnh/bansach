<?php 
    if(isset($_POST['Edit']))
    {
    require '../inc/config.php';
    $madv = $_POST['madv'];
    $name = $_POST['name'];
    $gia = $_POST['gia'];
        $sql = "UPDATE dichvu SET tendv='$name',gia ='$gia'
        WHERE madv= '$madv ' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: quanlydv.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
  
?>
