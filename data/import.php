<?php

    require_once '../account-management/credentials.php';

    if (!isset($_SESSION['dbConnection'])) {
        echo "<script>console.error('No database connection found. Please create a connection before continuing');</script>";
        exit();
    }

    $importSqlFiles = ["DDL.sql", "DML.sql"];
    foreach ($importSqlFiles as $file) {
        
        echo "<script>console.log('Importing $file');</script>";
        $content = file($file);
        foreach ($content as $line) {
            
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            echo "<script>console.log('Executing $line');</script>";
            
            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            // Perform the query
            if (substr(trim($line), -1, 1) == ';') {

                // Reset temp variable to empty
                //mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                $templine = '';

            }

        }

    }

?>