<?php
    $id=$_POST['userId']??'';

    $conn=mysqli_connect('localhost','root','','sklep');

    $sql="DELETE FROM loginy WHERE id_loginu=$id";
    mysqli_query($conn,$sql);

    mysqli_close($conn);
    header("location:admin.php");
    exit;
?>