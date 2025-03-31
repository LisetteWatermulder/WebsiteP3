<!DOCTYPE html>
<html lang="nl">

    <?php include 'website-components/head.php'; ?>

    <?php

        if (!isset($_COOKIE['isLoggedIn']) || $_COOKIE['isLoggedIn'] === false) {
            // Store product in cart before redirecting
            if (isset($_GET['product'])) {
                if (!isset($_SESSION['shoppingCart'])) {
                    $_SESSION['shoppingCart'] = array();
                }
                $_SESSION['shoppingCart'][$_GET['product']] = 1;
            }
            header('Location: inloggen.php');
            exit();
        }

    ?>

    <body>

        <?php include 'website-components/header.php'; ?>
        
        <?php

            if (!isset($_SESSION['shoppingCart'])) {
                $_SESSION['shoppingCart'] = array();
            }

            /* $_SESSION['shoppingCart'][$_GET['product']] += 1; */

            foreach ($_SESSION['shoppingCart'] as $item) {

                $productName = array_search($item, $_SESSION['shoppingCart']);
                echo $item;

            }

        ?>
        
        <?php include 'website-components/footer.php'; ?>

    </body>

</html>