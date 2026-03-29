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
        </aside>
        <aside id="rightHeader">
            <form action="sklep.php" method="POST">
                <?php echo $_SESSION['user']; ?>
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
        <aside id="leftMain"></aside>
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
            mysqli_close($conn);
        ?>
    </footer>

</body>
</html>
