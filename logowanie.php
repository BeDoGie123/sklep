<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header("Location:sklep.php");
        exit;
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
        </aside>
        <aside id="rightHeader">
            <button onclick="login()">Zaloguj się</button>
        </aside>
    </header>

    <main>
        <?php
            $conn = mysqli_connect('localhost','root','','sklep');
        ?>
        <aside id="leftMain"></aside>
        <section id="centerMain">
            <section id="loginSection">
                <p>Zaloguj się</p><br />
                <form action="logowanie.php" method="POST">
                    login<br /><input type="text" name="loginF" id="login"><br /><br />
                    hasło<br /><input type="password" name="passwordF" id="passwordLogin"><br /><br />
                    <input type="submit" value="Zaloguj" id="loginButton" name="loginBtn"><br />
                    <sub><em onclick="createUser()">Utwórz konto</em></sub>
                </form>
                <?php 
                    if(isset($_POST['loginBtn'])){
                    $l = $_POST["loginF"];
                    $h = sha1($_POST["passwordF"]);

                    $query = "SELECT login, haslo FROM loginy WHERE login='$l' AND haslo='$h'";
                    $result = mysqli_query($conn,$query);

                    if(mysqli_num_rows($result) > 0){
                        $_SESSION['user'] = $l;
                        header("Location:sklep.php");
                        exit;
                    } else {
                        echo "<p id='info'>złe dane</p>";
                    }
                }

                ?>
            </section>

            <section id="createUserSection">
                <p>Utwórz konto</p><br />
                <form action="logowanie.php" method="POST">
                    login<br /><input type="text" name="loginS" id="loginCreated"><br /><br />
                    hasło<br /><input type="password" name="passwordS" id="passwordFirst"><br />
                    powtórz hasło<input type="password" name="passwordS2" id="passwordSecond"><br /><br />
                    <input type="submit" value="Utwórz konto" id="createUserButton" name="createUserBtn"><br />
                    <sub><em onclick="login()">Zaloguj się</em></sub>
                </form>
                <?php  
                    if(isset($_POST['createUserBtn'])){
                    $login = $_POST['loginS'];
                    $haslo1 = $_POST['passwordS'];
                    $haslo2 = $_POST['passwordS2'];

                    if($haslo1 == $haslo2){
                        $sql = "INSERT INTO loginy (login, haslo) VALUES ('$login', sha1('$haslo1'))";
                        mysqli_query($conn, $sql);
                        echo "Konto utworzone";
                    } else {
                        echo "Hasła się różnią";
                    }
                    }
                ?>
            </section>
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
    <script>
        function createUser(){
            document.getElementById('createUserSection').style.display="block";
            document.getElementById('loginSection').style.display="none";
        }
        function login(){
            document.getElementById('createUserSection').style.display="none";
            document.getElementById('loginSection').style.display="block";
            document.getElementById('info').innerHTML="";
        }
        function main(){
            document.getElementById('createUserSection').style.display="none";
            document.getElementById('loginSection').style.display="none";
        }
        function logged(){
            document.getElementsByTagName("button")[0].style.display="none";
        }
    </script>
</body>
</html>
