<!DOCTYPE html>
<html lang="en">

    <?php include_once 'website-components/head.php'; ?>

    <body>

        <?php include_once 'website-components/header.php'; ?>

        <section>

            <div>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): 
                    header("Location: " . $_SESSION['lastPage']); ?>
                <?php endif; ?>

            </div>

        </section>

        <?php if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']): ?>

            <!-- Login Form -->
            <section class="inlog-form">

                <h1>Inloggen</h1>
                <div class="inlog-info-form">

                    <h2>Login</h2>
                    <form method="POST" action="">

                        <label for="gebruikersnaam">Gebruikersnaam:</label><br>
                        <input type="text" name="gebruikersnaam" id="gebruikersnaam" required><br><br>

                        <label for="wachtwoord">Wachtwoord:</label><br>
                        <input type="password" name="wachtwoord" id="wachtwoord" required><br><br>

                        <input type="submit" name="login" value="Login">
                        
                    </form>
                    <a href="account-management/register.php" class="register">Niet geregistreerd, registreer hier!</a>

                </div>

            </section>
            <?php if (isset($_SESSION['errorMessage']))
                echo "<p class='errormessage'>" . $_SESSION['errorMessage'] . "</p>"; ?>

        <?php endif; ?>

        <?php include 'website-components/footer.php'; ?>

    </body>

</html>