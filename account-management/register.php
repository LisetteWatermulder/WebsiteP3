<!DOCTYPE html>
<html lang="en">

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/website-components/head.php'; ?>

    <body>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/website-components/header.php'; ?>

        <section class="registreer-form">

            <h1>Registreren</h1>
            <div class="registreer-info-form">

                <h2>Gegevens</h2>
                <form method="POST" action="">


                    <label for="voornaam">Voornaam:</label><br>
                    <input type="text" name="voornaam" id="voornaam" required><br><br>

                    <label for="achternaam">Achternaam:</label><br>
                    <input type="text" name="achternaam" id="achternaam" required><br><br>

                    <label for="gebruikersnaam">Gebruikersnaam:</label><br>
                    <input type="text" name="gebruikersnaam" id="gebruikersnaam" required><br><br>

                    <label for="wachtwoord">Wachtwoord:</label><br>
                    <input type="password" name="wachtwoord" id="wachtwoord" required><br><br>

                    <label for="mail">Email adres:</label><br>
                    <input type="text" name="mail" id="mail" required><br><br>

                    <label for="geboortedatum">Geboortedatum:</label><br>
                    <input type="text" name="geboortedatum" id="geboortedatum" required><br><br>

                    <label for="adres">Adres:</label><br>
                    <input type="text" name="adres" id="adres" required><br><br>

                    <label for="nummer">Telefoonnummer:</label><br>
                    <input type="text" name="nummer" id="nummer" required><br><br>

                    <input type="submit" name="registreer" value="Registreer">
                        
                </form>

            </div>

        </section>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/website-components/footer.php'; ?>

    </body>

</html>