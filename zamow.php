<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','sklep');
    foreach($_SESSION['koszyk'] as $produkt_id => $ilosc){
    
        $sql = "SELECT cena_produktu FROM produkty WHERE id_produktu=$produkt_id";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        $cena = $result['cena_produktu'] * $ilosc;

        $sql2 = "SELECT id_klienta FROM klienci INNER JOIN loginy ON loginy.id_loginu=klienci.login_id WHERE loginy.login='".$_SESSION['user']."'";
        $query2 = mysqli_query($conn, $sql2);
        $result2 = mysqli_fetch_assoc($query2);
        $idKlienta = $result2['id_klienta'];

        $sql3 = "UPDATE produkty SET sztuki = sztuki - $ilosc WHERE id_produktu = $produkt_id";
        mysqli_query($conn, $sql3);

        $sql4 = "INSERT INTO zamowienia (id_produktu, id_klienta, cena_koncowa, data_zamowienia,sztuki) VALUES ($produkt_id, $idKlienta, $cena, CURDATE(),$ilosc)";
        mysqli_query($conn, $sql4);
    }

    $_SESSION['koszyk'] = [];
    echo "<script>alert('Zamówienie zostało złożone!');</script>";
    mysqli_close($conn);
    header("Location:sklep.php");
    exit;
?>