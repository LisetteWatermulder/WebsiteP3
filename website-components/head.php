<head>

    <!-- Metadata tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Huur een powerbank bij de populairste events in Nederland. Altijd Opgeladen, Altijd Onderweg.">

    <link rel="icon" type="image/ico" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/images/global/favicon.ico">

    <!-- Import the Style and JavaScript functions -->
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/css/global.css">
    <?php

    session_start();

    require_once $_SERVER['DOCUMENT_ROOT'] . '/script/php/global-functions.php';

    switch (getCurrentPage()) {

        case 'Home':
            echo '<link rel="stylesheet" type="text/css" href="css/home.css">';
            break;

        case 'Producten Diensten':
            echo '<link rel="stylesheet" type="text/css" href="css/producten-diensten.css">';
            break;

        case 'Over Ons':
            echo '<link rel="stylesheet" type="text/css" href="css/over-ons.css">';
            break;

        case 'Contact':
            echo '<link rel="stylesheet" type="text/css" href="css/contact.css">';
            break;

        case 'Inloggen':
            echo '<link rel="stylesheet" type="text/css" href="css/inloggen.css">';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/account-management/handlers.php';
            break;

        default:
            error_log("No stylesheet has been found for the current page: " . getCurrentPage());
            break;

    }

    /* echo "<script>console.log('" . $_COOKIE['username'] . "')</script>"; */

    echo '<title>' . getCurrentPage() . ' - Plug & Play</title>';

    $_SESSION['previousPageAction'] = $_SESSION['currentPage'];
    $_SESSION['currentPage'] = basename($_SERVER['PHP_SELF']);
    if ($_SESSION['previousPageAction'] != $_SESSION['currentPage'] && $_SESSION['previousPageAction'] != 'inloggen.php' && $_SESSION['previousPageAction'] != 'registreren.php') {
        $_SESSION['lastPage'] = $_SESSION['previousPageAction'];
    }


    ?>

    <!-- Import the JavaScript functions -->
    <script src="script/js/general.js" type="text/javascript"></script>

    <!-- Automatically logout the user in 30 minutes -->
    <script>if (<?php echo isset($_COOKIE['isLoggedIn']) && null != $_COOKIE['isLoggedIn'] && $_COOKIE['isLoggedIn'] == true ? 'true' : 'false'; ?> === true) { SetAutoLogout(60) }</script>

</head>