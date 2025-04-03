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

<<<<<<< HEAD
        <?php include 'website-components/header.php'; ?>
        
        <?php

            if (!isset($_SESSION['shoppingCart'])) {
                $_SESSION['shoppingCart'] = array();
            }

            if (!in_array($_GET['product'], $_SESSION['shoppingCart'])) {

                $productName = ucwords( str_replace( ['-', '_'], ' ', $_GET['product'] ) );
                $_SESSION['shoppingCart'][$productName] = 1;

            }

        ?>

        <div>

            <form method="POST" action="?step=payment">

                <?php foreach ($_SESSION['shoppingCart'] as $productName => $item): ?>

                    <input type="text" name="count" value="<?php echo $item; ?>">
                    <label class="product-name"><?php echo $productName; ?></label>

                <?php endforeach; ?>

                <input type="submit" name="submit" value="Bestellen">

            </form>

        </div>
        
        <?php include 'website-components/footer.php'; ?>

    </body>
=======
</body>
>>>>>>> 81e8631 (Apply formatting/fixes to sql and website)

</html>