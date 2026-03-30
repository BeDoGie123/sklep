<?php
    session_start();

    if(!isset($_SESSION['koszyk'])){
        $_SESSION['koszyk'] = [];
    }


    if(isset($_POST['dodajDoKoszyka'])){
        $produkt_id = $_POST['produkt_id'];

        if(isset($_SESSION['koszyk'][$produkt_id])){
            $_SESSION['koszyk'][$produkt_id]++;
        } else {
            $_SESSION['koszyk'][$produkt_id] = 1;
        }
    }  
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
            <?php echo "<p>".$_SESSION['user'];"</p>" ?>
            <form action="sklep.php" method="POST">
                <input type="submit" value="Wyloguj się" name="wylogujBtn">
                <?php  
                    if(isset($_POST['wylogujBtn'])){
                        header("Location:wyloguj.php");
                        exit;
                    }
                ?>
            </form>
        </aside>
    </header>

    <main>

        <?php 
            $conn = mysqli_connect('localhost','root','','sklep');
            
        ?>
        
        <aside id="leftMain">
            <?php  
                $sql="SELECT A.* FROM klienci AS A INNER JOIN loginy ON loginy.id_loginu=A.login_id WHERE loginy.login='".$_SESSION['user']."'";
                $query=mysqli_query($conn,$sql);
                $result=mysqli_fetch_row($query);
                echo "<p>Twoje dane:</p>";
                echo "<ul>";
                echo "<li>$result[1] $result[2]</li>";
                echo "<li>$result[3]</li>";
                echo "<li>$result[4] $result[5]</li>";
                echo "<li>$result[6]</li>";
                echo "<li>$result[7]</li>";
                echo "</ul>";
            ?>
        </aside>

        <section id="centerMain">
            <h2>Nasze produkty</h2>
            <?php  
                $sql="SELECT * FROM produkty";
                $query=mysqli_query($conn,$sql);
                
                while($result=mysqli_fetch_assoc($query)){  
                    echo "<section id='productBlock'>";
                    echo "<img src='{$result['zdjecie']}'>";
                    echo "<h4>{$result['nazwa_produktu']}</h4>";
                    echo "<p>{$result['cena_produktu']} zł<br />Sztuki: {$result['ilosc_produktu']}<br />Ilość na stanie: {$result['sztuki']}</p>";
                    echo "<form action='sklep.php' method='post'>";
                    echo "<input type='hidden' name='produkt_id' value='{$result['id_produktu']}'>";
                    echo "<input type='submit' name='dodajDoKoszyka' value='Dodaj do koszyka'>";
                    echo "</form>";
                    echo "</section>";
                }
            ?>
        </section>
        
        <aside id="rightMain">
            <div class="topRow">
                <img src="cart.png" alt="koszyk">
                <h2>Koszyk</h2>
            </div>

            <?php
                if(!empty($_SESSION['koszyk'])){
                    echo "<ul>";
                    $total_price=0;

                    foreach($_SESSION['koszyk'] as $produkt_id => $ilosc){
                        $sql="SELECT * FROM produkty WHERE id_produktu=$produkt_id";
                        $query=mysqli_query($conn,$sql);
                        $result=mysqli_fetch_row($query);

                        $price = $result[2] * $ilosc;
                        echo "<li>$result[1] ilość: $ilosc, cena: $price zł</li>";

                        $total_price+=$price;
                    }
                    
                    echo "</ul>";
                    echo "<p>Całkowita wartość zamówienia: $total_price</p>";
                    echo "<form action='sklep.php' method='post'>";
                    echo "<input type='submit' name='zamow' value='Złóż zamówienie'>";
                    echo "</form>";
                }
                if(isset($_POST['zamow'])){
                        header("Location:zamow.php");
                        exit;
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
            mysqli_close($conn);
        ?>
    </footer>
</body>
</html>
