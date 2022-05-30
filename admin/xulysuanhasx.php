<?php 
    if(isset($_POST['Edit']))
    {
    require '../inc/config.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
        $sql = "UPDATE nhaxuatban SET Ten='$name'
        WHERE id= '$id ' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: qlynhasx.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
  
?>
