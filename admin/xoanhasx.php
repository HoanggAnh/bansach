<?php
    require '../inc/config.php';
    $id = $_GET['id'];

    // sql to delete a record
    $sql = "DELETE FROM product_catalog WHERE catalog_id=".$id;

    if ($conn->query($sql) === TRUE) {
        header('Location: qlynhasx.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
</script>