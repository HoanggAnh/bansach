
<?php 
require "inc/config.php";
if(isset($_POST['muangay']))
			{
				// echo $item;
                $total="";
                $email =  $_POST['email']; 
                $ngaygiao = $_POST['date'];
                $tenkh = $_POST['name']; 
                $diachi = $_POST['txtdiachi'];
                $dienthoai =  $_POST['phone']; 
                $hinhthucthanhtoan = $_POST['hinhthuctt']; 
                $sql1="INSERT INTO hoadon (emailkh,ngaygiao,tenkh,diachi,dienthoai,hinhthucthanhtoan)
                VALUES ('$email','$ngaygiao','$tenkh','$diachi','$dienthoai','$hinhthucthanhtoan');";
               if ($conn->query($sql1) === TRUE) 
                {
                       $masp= $_POST['idsp']; 
                       $dongia= $_POST['gia']; 
                       $sl= $_POST['txtsoluong'];
                       $thanhtien =  $sl* $dongia;
                      //tao mang hd de lua sodh cua sql1
                       $hd =  mysqli_insert_id($conn);
                       //lua mang
                       $sql2="INSERT INTO  chitiethoadon (sodh,masp,soluong,dongia,thanhtien) 
                       VALUES ('$hd ','$masp' ,'$sl','$dongia','$thanhtien');";         
       
if ($conn->query($sql2) === TRUE) {
    // destroy the session 
    session_destroy(); 
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
                }

        }
			?>
