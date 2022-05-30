<?php
    require '../inc/config.php';
    $id = $_GET['id'];

    // sql to delete a record
    $sql = "DELETE FROM sanpham WHERE ID=".$id;

    if ($conn->query($sql) === TRUE) {
        header('Location: qlysanpham.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
        <script>
function myFunction() {
    alert("Xóa thành công");
}
</script>