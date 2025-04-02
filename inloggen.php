<?php

    session_start();

    require_once $_SESSION['rootPath'] . '/account-management/handlers.php';

    $database = new Database('localhost', 'dbuser', 'LkC9STj5n6bztQ', 'PlugAndPlay');
    $_SESSION['dbConnection'] = $database->connect();
    // Handle login
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

    <?php include_once 'website-components/head.php'; ?>

    <body>

        <?php include_once 'website-components/header.php'; ?>

        <section>

            <div>

                <?php if (isset($_COOKIE['isLoggedIn']) && $_COOKIE['isLoggedIn'] === true): 
                    header("Location: " . $_SESSION['lastPage']); ?>
                <?php endif; ?>

            </div>

        </section>

        <?php if (!isset($_COOKIE['isLoggedIn']) || !$_COOKIE['isLoggedIn']): ?>

            <!-- Login Form -->
            <section class="inlog-form">

                <h1>Inloggen</h1>
                <div class="inlog-info-form">

                    <h2>Login</h2>
                    <form method="POST" action="">

                        <label for="gebruikersnaam">Gebruikersnaam:</label><br>
                        <input type="text" name="gebruikersnaam" id="gebruikersnaam" placeholder="Gebruikersnaam" required><br><br>

                        <label for="wachtwoord">Wachtwoord:</label><br>
                        <input type="password" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord" required><br><br>

                        <input type="submit" name="login" value="Login">
                        
                    </form>
                    <a href="<?php $_SESSION['rootPath'] ?>/account-management/register.php" class="register">Niet geregistreerd, registreer hier!</a>

                </div>

            </section>
            <?php if (isset($errorMessage))
                echo "<p class='errormessage'>$errorMessage</p>"; ?>

        <?php endif; ?>

        <?php include 'website-components/footer.php'; ?>

    </body>

</html>