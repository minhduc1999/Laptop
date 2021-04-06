<?php   
    $conn=mysqli_connect("localhost","root","") or die ("khong the ket noi CSDL");
    mysqli_select_db($conn, "doantotnghiep");
    mysqli_query($conn,"SET NAMES 'UTF8'");
?>