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
            <img src="shopping-store.png" alt="">
        </aside>
        <aside id="rightHeader">
            <button onclick="login()">Zaloguj się</button>
        </aside>
    </header>

    <main>
        <aside id="leftMain"></aside>
        <section id="centerMain">
            <section id="loginSection">
                <form action="sklep.php" method="POST">
                    login<input type="text" name="login" id="login"><br /><br />
                    hasło<input type="password" name="password" id="passwordLogin">
                    <input type="submit" value="Utwórz konto">
                </form>
            </section>
            <section id="createUserSection">
                <p>Utwórz konto</p><br />
                <form action="sklep.php" method="POST">
                    login<input type="text" name="login" id="login"><br /><br />
                    hasło<input type="password" name="password" id="passwordFirst"><br />
                    powtórz hasło<input type="password" name="password" id="passwordSecond">
                    <input type="submit" value="Utwórz konto">
                </form>
            </section>
        </section>
        <aside id="rightMain"></aside>
    </main>

    <footer>

    </footer>

    <script>
        function login(){
            return 0;
        }
    </script>
</body>
</html>
