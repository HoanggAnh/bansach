<?php 
    session_start();
    $cart=$_SESSION['cart'];
    unset($_SESSION['cart']);
    header('Location: cart.php');
?>