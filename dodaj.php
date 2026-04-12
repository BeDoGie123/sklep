<?php
    $nazwa=$_POST['nazwa']??'';
    $cena=$_POST['cena']??'';
    $zdjecie=$_POST['foto']??'';
    $ilosc=$_POST['ilosc']??'';
    $sztuki=$_POST['sztuki']??'';
    $kategoria=$_POST['id_kategorii']??'';

    $conn=mysqli_connect('localhost','root','','sklep');

    $sql="INSERT INTO produkty (`nazwa_produktu`, `cena_produktu`, `ilosc_produktu`, `sztuki`, `id_kategorii`, `id_dostawcy`, `zdjecie`) VALUES ('$nazwa','$cena','$ilosc','$sztuki','$kategoria','1','$zdjecie')";
    mysqli_query($conn,$sql);

    mysqli_close($conn);
    header("location:admin.php");
    exit;
?>