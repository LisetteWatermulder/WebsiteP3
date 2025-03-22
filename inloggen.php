<?php

    require 'website-components/handlers.php';
    require 'website-components/account-management/credentials.php';
    
?>

<!DOCTYPE html>
<html lang="en">

    <?php include_once 'website-components/head.php'; ?>

    <body>

        <?php include_once 'website-components/header.php'; ?>

        <section class="inloggen-banner">
            <div>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <!-- CASE1: the user is considered logged in -->
                    <h1>Bestellen</h1>
                <?php else: ?>
                    <!-- CASE2: the user is not considered logged in -->
                    <h1>Inloggen</h1>
                <?php endif; ?>
            </div>
        </section>

        <?php if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']): ?>
            <!-- Login Form -->
            <section class="inlog-form">
                <div class="inlog-info-form">
                    <h2>Login</h2>
                    <form method="POST" action="">
                        <label for="gebruikersnaam">Gebruikersnaam:</label><br>
                        <input type="text" name="gebruikersnaam" id="gebruikersnaam" required><br><br>

                        <label for="wachtwoord">Wachtwoord:</label><br>
                        <input type="password" name="wachtwoord" id="wachtwoord" required><br><br>

                        <input type="submit" name="login" value="Login">
                    </form>
                </div>
            </section>
            <?php if (isset($errorMessage))
                echo "<p style='color: red;'>$errorMessage</p>"; ?>

        <?php elseif (isset($_GET['step']) && $_GET['step'] === 'select_location'): ?>
            <!-- Location Selection -->
            <section class="inlog-form">
                <div class="inlog-info-form">
                    <h2>Selecteer een locatie</h2>
                    <form method="POST" action="">
                        <label for="locatie">Selecteer een locatie:</label><br>
                        <select name="locatie" id="locatie" required>
                            <?php foreach ($locaties as $locatie): ?>
                                <option value="<?php echo $locatie; ?>"><?php echo $locatie; ?></option>
                            <?php endforeach; ?>
                        </select><br><br>

                        <input type="submit" name="select_location" value="Volgende">
                    </form>
                </div>
            </section>

        <?php elseif (isset($_GET['step']) && $_GET['step'] === 'select_product'): ?>
            <!-- Product Selection -->
            <section class="inlog-form">
                <div class="inlog-info-form">
                    <h2>Selecteer een product</h2>
                    <form method="POST" action="">
                        <label for="product_id">Selecteer een product:</label><br>
                        <select name="product_id" id="product_id" required>
                            <?php foreach ($producten as $id => $product): ?>
                                <option value="<?php echo $id; ?>" <?php echo in_array($id, $_SESSION['available_products']) ? '' : 'disabled'; ?>>
                                    <?php echo $product; ?>
                                </option>
                            <?php endforeach; ?>
                        </select><br><br>

                        <input type="submit" name="select_product" value="Volgende">
                    </form>
                </div>
            </section>

        <?php elseif (isset($_GET['step']) && $_GET['step'] === 'payment'): ?>
            <!-- Payment -->
            <section class="inlog-form">
                <div class="inlog-info-form">
                    <h2>Kies een betaalmethode</h2>
                    <form method="POST" action="">
                        <label for="payment_method">Betaalmethode:</label><br>
                        <select name="payment_method" id="payment_method" required>
                            <option value="iDEAL">iDEAL</option>
                            <option value="PayPal">PayPal</option>
                            <option value="CreditCard">CreditCard</option>
                        </select><br><br>

                        <input type="submit" name="pay" value="Betalen">
                    </form>
                </div>
            </section>

        <?php elseif (isset($_GET['step']) && $_GET['step'] === 'complete'): ?>
            <!-- Order Complete -->
            <section class="inlog-form">
                <div class="inlog-info-form">
                    <h2>Bestelling Voltooid!</h2>
                    <p>Je bestelling is succesvol geplaatst.</p>
                    <p>Betaalmethode: <?php echo $_SESSION['payment_method']; ?></p>
                    <p>Locatie: <?php echo $_SESSION['locatie']; ?></p>
                    <p>QR Code:</p>
                    <img src="<?php echo $_SESSION['qr_code']; ?>" alt="QR Code"><br>
                    <p>Een e-mail met de QR-code is naar je e-mailadres verzonden.</p>
                    <a href="website-components/uitloggen.php">Terug naar login</a>
                </div>
            </section>
        <?php endif; ?>

        <?php include 'website-components/footer.php'; ?>

    </body>

</html>