<?php
require 'config.php';
//lay danh sach san pham khuyen mai
$sql="SELECT * FROM product  where discount != '0' ORDER BY product_name  limit 4 ";
$result = $conn->query($sql);
//lay danh sach san pham mới nhất
$conn->close();
?>