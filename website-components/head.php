<?php session_start() ?>

<head>

    <!-- Metadata tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Huur een powerbank bij de populairste events in Nederland. Altijd Opgeladen, Altijd Onderweg.">

    <link rel="icon" type="image/ico" href="<?php $_SESSION['rootPath'] ?>/images/global/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=edit" />

    <!-- Import the Style and JavaScript functions -->
    <link rel="stylesheet" type="text/css" href="<?php $_SESSION['rootPath'] ?>/css/global.css">
    <?php

        require_once $_SESSION['rootPath'] . '/script/php/global-functions.php';
    
        switch ( getCurrentPage() ) {

            case 'Home':
                echo '<link rel="stylesheet" type="text/css" href="css/home.css">';
                echo '<script src="script/js/general.js" type="text/javascript"></script>';
                break;

            case 'Producten Diensten':
                echo '<link rel="stylesheet" type="text/css" href="css/producten-diensten.css">';
                echo '<script src="script/js/general.js" type="text/javascript"></script>';
                break;

            case 'Over Ons':
                echo '<link rel="stylesheet" type="text/css" href="css/over-ons.css">';
                echo '<script src="script/js/general.js" type="text/javascript"></script>';
                break;

            case 'Contact':
                echo '<link rel="stylesheet" type="text/css" href="css/contact.css">';
                echo '<script src="script/js/general.js" type="text/javascript"></script>';
                break;

            case 'Inloggen':
                echo '<link rel="stylesheet" type="text/css" href="css/inloggen.css">';
                echo '<script src="script/js/general.js" type="text/javascript"></script>';
                require_once $_SESSION['rootPath'] . '/account-management/handlers.php';
                break;

            case 'Account':
                echo '<link rel="stylesheet" type="text/css" href="../css/account.css">';
                echo '<script src="../script/js/general.js" type="text/javascript"></script>';
                require_once $_SESSION['rootPath'] . '/account-management/handlers.php';
                break;
            
            default:
                error_log("No stylesheet has been found for the current page: " . getCurrentPage());
                echo '<script src="script/js/general.js" type="text/javascript"></script>';
                break;

        }

        /* echo "<script>console.log('" . $_COOKIE['username'] . "')</script>"; */

        echo '<title>' . getCurrentPage() .' - Plug & Play</title>';

        $_SESSION['previousPageAction'] = $_SESSION['currentPage'];
        $_SESSION['currentPage'] = basename($_SERVER['PHP_SELF']);
        if ($_SESSION['previousPageAction'] != $_SESSION['currentPage'] && $_SESSION['previousPageAction'] != 'inloggen.php' && $_SESSION['previousPageAction'] != 'registreren.php') {
            $_SESSION['lastPage'] = $_SESSION['previousPageAction'];
        }

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;

        require $_SESSION['rootPath'] . '/extensions/PHPMailer/src/Exception.php';
        require $_SESSION['rootPath'] . '/extensions/PHPMailer/src/PHPMailer.php';
        require $_SESSION['rootPath'] . '/extensions/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);
        
    
    ?>

    <!-- Automatically logout the user in 30 minutes -->
    <script>if (<?php echo isset($_COOKIE['isLoggedIn']) && null != $_COOKIE['isLoggedIn'] && $_COOKIE['isLoggedIn'] == true ? 'true' : 'false'; ?> === true) { SetAutoLogout(60) }</script>

</head>