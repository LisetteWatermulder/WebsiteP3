<?php

    function createProducts(string $Path) {

        $files = getFiles($Path);

        foreach ($files as $file) {

            if ( strpos($file, '.php') === false || is_null($file) ) {
                continue;
            }

            echo "<div class='Product'>";

                $productName = explode('.', $file)[0];
                $productCleanName = ucwords( str_replace( ['-', '_'], ' ', $productName ) );
                echo "<h2 class='ProductTitle'>$productCleanName</h2>";
                echo "<img class='ProductImage' src='$Path/$productName.jpg' alt='$productCleanName'>";
                require_once "$Path/$file";
                echo "<button class='ProductButton' onclick='window.location.href=" . '"bestellen.php?product=' . $productName . '"' . "'>Huur Nu</button>";

            echo "</div>";


        }

    }

?>