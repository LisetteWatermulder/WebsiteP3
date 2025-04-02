<header>

    <!-- Display the logo and the navbar at the top of the website (SECTION 2) -->
    <img class="header-logo" src="<?php $_SESSION['rootPath'] ?>/images/global/Logo.png" alt="logo Plug & Play">
    <nav class="header-links">

        <ul>

            <li>
                <a href="<?php $_SESSION['rootPath'] ?>/index.php" aria-label="home">Home</a>
            </li>
            <li>
                <a href="<?php $_SESSION['rootPath'] ?>/over-ons.php" aria-label="over ons">Over Ons</a>
            </li>
            <li>
                <a href="<?php $_SESSION['rootPath'] ?>/producten-diensten.php" aria-label="producten en diensten">Producten en Diensten</a>
            </li>
            <li>
                <a href="<?php $_SESSION['rootPath'] ?>/contact.php" aria-label="contact">Contact</a>
            </li>
            <li>

                <!-- Check if loggedin is null and check if it is set to true -->
                <?php if (isset($_COOKIE['isLoggedIn']) && $_COOKIE['isLoggedIn'] == true): ?>

                    <!-- CASE1: the user is considered logged in, show the link to the login page as the username and add an extra link to log out -->
                    <li>
                        <a href="<?php $_SESSION['rootPath'] ?>/account-management/account.php" aria-label="ingelogd">
                        <?php echo $_COOKIE['username']; ?></a>
                    </li>
                    <li>
                        <a href="<?php $_SESSION['rootPath'] ?>/account-management/uitloggen.php" aria-label="uitloggen">Uitloggen</a>
                    </li>

                <?php else: ?>

                    <!-- CASE2: the user is not considered logged in, show the link to the login page -->
                    <li><a href="<?php $_SESSION['rootPath'] ?>/inloggen.php" aria-label="inloggen">Inloggen</a></li>

                <?php endif; ?>

            </li>

        </ul>

    </nav>

</header>