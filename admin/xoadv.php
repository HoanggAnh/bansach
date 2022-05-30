<?php
    require '../inc/config.php';
    $madv = $_GET['madv'];

    // sql to delete a record
    $sql = "DELETE FROM dichvu WHERE madv=".$madv;

    if ($conn->query($sql) === TRUE) {
        header('Location: quanlydv.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
</script>