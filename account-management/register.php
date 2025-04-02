<?php

    session_start();

    require_once $_SESSION['rootPath'] . '/account-management/handlers.php';

    $database = new Database('localhost', 'dbuser', 'LkC9STj5n6bztQ', 'PlugAndPlay');
    $_SESSION['dbConnection'] = $database->connect();
    
    if ( isset($_POST['login']) && (!isset($_COOKIE['isLoggedIn']) || $_COOKIE['isLoggedIn'] === false) ) {

        $gebruikersnaam = $_POST['gebruikersnaam'];
        $wachtwoord = $_POST['wachtwoord'];
        $gebruiker = new gebruiker($gebruikersnaam, $wachtwoord);
        if ($gebruiker->login($gebruikersnaam, $wachtwoord)) {

            setcookie("isLoggedIn", true, time() + 3600, "/");
            setcookie("username", $gebruikersnaam, time() + 3600, "/");
            header("Location: ../" . $_SESSION['lastPage']);

        } else {
            $errorMessage = "Ongeldige gebruikersnaam of wachtwoord.";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include_once $_SESSION['rootPath'] . '/website-components/head.php'; ?>

    <body>

        <?php include_once $_SESSION['rootPath'] . '/website-components/header.php'; ?>

        <section class="registreer-form">

            <h1>Registreren</h1>
            <div class="registreer-info-form">

                <h2>Gegevens</h2>
                <form method="POST" action="">


                    <label for="voornaam">Voornaam:</label><br>
                    <input type="text" name="voornaam" id="voornaam" placeholder="Voornaam" required><br><br>

                    <label for="achternaam">Achternaam:</label><br>
                    <input type="text" name="achternaam" id="achternaam" placeholder="Achternaam" required><br><br>

                    <label for="gebruikersnaam">Gebruikersnaam:</label><br>
                    <input type="text" name="gebruikersnaam" id="gebruikersnaam" placeholder="Gebruikersnaam" required><br><br>

                    <label for="wachtwoord">Wachtwoord:</label><br>
                    <input type="password" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord" required><br><br>

                    <label for="mail">Email adres:</label><br>
                    <input type="text" name="mail" id="mail" placeholder="Email adres" required><br><br>

                    <label for="geboortedatum">Geboortedatum:</label><br>
                    <input type="date" name="geboortedatum" id="geboortedatum" required><br><br>

                    <label for="adres">Adres:</label><br>
                    <input type="text" name="adres" id="adres" placeholder="Adres" required><br><br>

                    <label for="nummer">Telefoonnummer:</label><br>
                    <input type="text" name="nummer" id="nummer" placeholder="Telefoonnummer" required><br><br>

                    <input type="submit" name="registreer" value="Registreer">
                        
                </form>

            </div>

        </section>

        <?php include $_SESSION['rootPath'] . '/website-components/footer.php'; ?>

    </body>

</html>