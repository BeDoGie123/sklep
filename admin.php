<?php 
    session_start();

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep spożywczy</title> 
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
                                echo "<img src='{$result['zdjecie']}'>";
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
                                echo "<img src='{$result['zdjecie']}'>";
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
                                echo "<img src='{$result['zdjecie']}'>";
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
            
        </section>
        <aside id="rightMain"></aside>
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
