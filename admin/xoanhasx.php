<?php
    require '../inc/config.php';
    $id = $_GET['id'];

    // sql to delete a record
    $sql = "DELETE FROM nhaxuatban WHERE ID=".$id;

    if ($conn->query($sql) === TRUE) {
        header('Location: qlynhasx.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
</script>