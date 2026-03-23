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
            <img src="shopping-store.png" alt="ikonka sklepu" onclick="main()">
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
                <form action="sklep.php" method="POST">
                    login<br /><input type="text" name="login" id="login"><br /><br />
                    hasło<br /><input type="password" name="password" id="passwordLogin"><br /><br />
                    <input type="submit" value="Zaloguj" id="loginButton">
                    <sub><em onclick="createUser()">Utwórz konto</em></sub>
                </form>
                <?php
                    $l="";
                    $h="";
                    if(isset($_POST["login"])&&isset($_POST["password"])){
                        $l=$_POST["login"];
                        $h=sha1($_POST["password"]);
                        $query="SELECT login,haslo FROM login WHERE login=$l AND haslo=$h";
                        $result=mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)==0){
                            echo "zalogowano pomyślnie";
                        }
                        else{
                            echo "złe dane";
                        }
                    }  
                ?>
            </section>
            <section id="createUserSection">
                <p>Utwórz konto</p><br />
                <form action="sklep.php" method="POST">
                    login<br /><input type="text" name="login" id="loginCreated"><br /><br />
                    hasło<br /><input type="password" name="password" id="passwordFirst"><br />
                    powtórz hasło<input type="password" name="password2" id="passwordSecond"><br /><br />
                    <input type="submit" value="Utwórz konto" id="createUserButton">
                    <sub><em onclick="login()">Zaloguj się</em></sub>
                </form>
                <?php
                    $login = $_POST['login'] ?? '';
                    $haslo1 = $_POST['password'] ?? '';
                    $haslo2 = $_POST['password2'] ?? '';
                    $sql = "INSERT INTO loginy (login, haslo) values ('$login', sha1('$haslo1'))";
                    if($haslo1 == $haslo2){
                        mysqli_query($conn, $sql);
                    }
                    else{
                        echo "Hasła sie różnią";
                    }
                    
                ?>
            </section>
        </section>
        <aside id="rightMain"></aside>
        <?php
            mysqli_close($conn);
        ?>
    </main>

    <footer>

    </footer>

    <script>
        function createUser(){
            document.getElementById('createUserSection').style.display="block";
            document.getElementById('loginSection').style.display="none";
        }
        function login(){
            document.getElementById('createUserSection').style.display="none";
            document.getElementById('loginSection').style.display="block";
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
