<?php
if(isset($_POST['remove']))
{
    session_start();
        $idsprm = $_POST["idsprm"];
        $sl;
        if(isset($_SESSION['cart'][$idsprm]))
        {
            unset($_SESSION['cart'][$idsprm]);
            header('Location: cart.php');          
        }    
}
if(isset($_POST['update']))
{
    session_start();
    $sl = $_POST["qty"];
    foreach($sl as $key  => $value)
    {
        if(($value == 0)  and (is_numeric($value)))
        {
            unset($_SESSION['cart'][$key]);
        }
        if (($value > 0)  and (is_numeric($value))) {
            $_SESSION['cart'][$key] =$value;
        }
    }
     header('Location: cart.php');  
}
?>