<head>

    <!-- Metadata tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Huur een powerbank bij de populairste events in Nederland. Altijd Opgeladen, Altijd Onderweg.">

    <link rel="icon" type="image/ico" href="../images/global/favicon.ico">

    <!-- Import the Style and JavaScript functions -->
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <?php

        require_once 'script/php/global-functions.php';
    
        switch ( getCurrentPage() ) {

            case 'Home':
                echo '<link rel="stylesheet" type="text/css" href="css/home.css">';
                break;

            case 'Producten Diensten':
                echo '<link rel="stylesheet" type="text/css" href="css/producten-diensten.css">';
                echo '<script src="script/js/producten-diensten.js" type="text/javascript"></script>';
                break;

            case 'Over Ons':
                echo '<link rel="stylesheet" type="text/css" href="css/over-ons.css">';
                break;

            case 'Contact':
                echo '<link rel="stylesheet" type="text/css" href="css/contact.css">';
                break;

            case 'Inloggen':
                echo '<link rel="stylesheet" type="text/css" href="css/inloggen.css">';
                break;
            
            default:
                error_log("No stylesheet has been found for the current page: " . getCurrentPage());
                break;

        }

        echo '<title>' . getCurrentPage() .' - Plug & Play</title>';

        require_once 'website-components/handlers.php';
    
    ?>

</head>