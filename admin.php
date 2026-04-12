<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: logowanie.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora</title> 
    <link rel="icon" type="image/png" href="store.png">
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <aside id="leftHeader">
            <img src="shopping-store.png" alt="ikonka sklepu">
            <h1>Sklep spożywczy</h1>
        </aside>
        <aside id="rightHeader">
            <?php echo "<p>".$_SESSION['admin']."</p>" ?>
            <form action="wyloguj.php" method="POST">
                <input type="submit" value="Wyloguj się">
            </form>
        </aside>
    </header>

    <main>
        <?php
            $conn = mysqli_connect('localhost','root','','sklep');
        ?>
        <aside id="leftMainAdmin">
            <h2>Nasze produkty</h2>
            <form action="admin.php" method="post">
                <select name="kategoria" id="kategoria">
                    <option value="nic"></option>
                    <?php 
                        $sql="SELECT nazwa_kategori FROM kategoria";
                        $query=mysqli_query($conn,$sql);

                        while($result=mysqli_fetch_assoc($query)){
                            echo "<option value=".$result['nazwa_kategori'].">".$result['nazwa_kategori']."</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Wyszukaj" name="searchCategory" id="searchBtn">
            </form>

                <?php  
                
                    if(isset($_POST['searchCategory'])){
                        if($_POST['kategoria']!="nic"){
                            $kat=$_POST['kategoria'];
                            $sql="SELECT produkty.* FROM produkty INNER JOIN kategoria USING (id_kategorii) WHERE kategoria.nazwa_kategori='$kat'";
                            $query=mysqli_query($conn,$sql);
                    

                            while($result=mysqli_fetch_assoc($query)){  
                                echo "<section id='productBlockAdmin'>";
                                echo "<img src='{$result['zdjecie']}' alt='produkt'>";
                                echo "<h4>{$result['nazwa_produktu']}</h4>";
                                echo "<p>{$result['cena_produktu']} zł<br />Sztuki: {$result['ilosc_produktu']}<br />Ilość na stanie: {$result['sztuki']}</p>";
                                echo "<form action='sklep.php' method='post'>";
                                echo "<input type='hidden' name='produkt_id' value='{$result['id_produktu']}'>";
                                echo "</form>";
                                echo "</section>";
                            }
                        }
                        else{
                            $sql="SELECT * FROM produkty";
                            $query=mysqli_query($conn,$sql);
                            
            
                            while($result=mysqli_fetch_assoc($query)){  
                                echo "<section id='productBlockAdmin'>";
                                echo "<img src='{$result['zdjecie']}' alt='produkt'>";
                                echo "<h4>{$result['nazwa_produktu']}</h4>";
                                echo "<p>{$result['cena_produktu']} zł<br />Sztuki: {$result['ilosc_produktu']}<br />Ilość na stanie: {$result['sztuki']}</p>";
                                echo "<form action='sklep.php' method='post'>";
                                echo "<input type='hidden' name='produkt_id' value='{$result['id_produktu']}'>";
                                echo "</form>";
                                echo "</section>";
                            }
                        }
                    }else{
                        $sql="SELECT * FROM produkty";
                            $query=mysqli_query($conn,$sql);
                            
            
                            while($result=mysqli_fetch_assoc($query)){  
                                echo "<section id='productBlockAdmin'>";
                                echo "<img src='{$result['zdjecie']}' alt='produkt'>";
                                echo "<h4>{$result['nazwa_produktu']}</h4>";
                                echo "<p>{$result['cena_produktu']} zł<br />Sztuki: {$result['ilosc_produktu']}<br />Ilość na stanie: {$result['sztuki']}</p>";
                                echo "<form action='sklep.php' method='post'>";
                                echo "<input type='hidden' name='produkt_id' value='{$result['id_produktu']}'>";
                                echo "</form>";
                                echo "</section>";
                            }
                    }


                ?>
        
        </aside>
        <section id="centerMain">
            <h2>Dodaj produkt</h2>
            <form action="dodaj.php" method="post">
                <p>Nazwa:</p><input type="text" name="nazwa" placeholder="Nazwa" required>
                <p>Cena:</p><input type="number" step="0.01" name="cena" placeholder="Cena" required>
                <p>Zdjęcie:</p><input type="text" name="foto" placeholder="Nazwa pliku (np. jablko.png)" required>
                <p>Ilość:</p><input type="number" name="ilosc" placeholder="Ilość np. 4 (w jednej paczce)" required>
                <p>Sztuki</p><input type="number" name="sztuki" placeholder="Sztuki dostepne" required>
                <p>Kategoria: 
                    <select name="id_kategorii" required>
                        <option value="">Wybierz kategorię</option>
                        <?php 
                            $sql_kat = "SELECT id_kategorii, nazwa_kategori FROM kategoria";
                            $query_kat = mysqli_query($conn, $sql_kat);
                            while($res_kat = mysqli_fetch_assoc($query_kat)){
                                echo "<option value='".$res_kat['id_kategorii']."'>".$res_kat['nazwa_kategori']."</option>";
                                }
                                ?>
                    </select>
                </p>
                <input type="submit" value="Dodaj produkt">
            </form>
        </section>
        <aside id="rightMain">
            <h4>Użytkownicy</h4>
            <?php  
                $sql="SELECT * FROM loginy";
                $query=mysqli_query($conn,$sql);
                        
                while($result=mysqli_fetch_assoc($query)){
                    echo "<section id='userSectionAdmin'>";
                    echo "<p>" . $result['login'] . "</p>";
                    echo "<form action='usunKonto.php' method='POST'>";
                    echo "<input type='hidden' name='userId' value='" . $result['id_loginu'] . "'>";
                    echo "<input type='submit' value='Usuń użytkownika'>";
                    echo "</form>";
                    echo "</section>";
                }
            ?>
        </aside>
    </main>

    <footer>
        <?php 
            $sql="SELECT * FROM dane_firmy";
            $query=mysqli_query($conn,$sql);
            $result=mysqli_fetch_row($query);
            echo "<p>$result[2]<br />$result[1]<br />Numer telefonu: $result[0]</p>";
        ?>
    </footer>
    <?php  
        mysqli_close($conn);
    ?>
    
</body>
</html>
