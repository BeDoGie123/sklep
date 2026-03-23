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
            </section>
            <section id="createUserSection">
                <p>Utwórz konto</p><br />
                <form action="sklep.php" method="POST">
                    login<br /><input type="text" name="login" id="loginCreated"><br /><br />
                    hasło<br /><input type="password" name="password" id="passwordFirst"><br />
                    powtórz hasło<input type="password" name="password" id="passwordSecond"><br /><br />
                    <input type="submit" value="Utwórz konto" id="createUserButton">
                    <sub><em onclick="login()">Zaloguj się</em></sub>
                </form>
            </section>
        </section>
        <aside id="rightMain"></aside>
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
