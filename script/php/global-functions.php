<?php

    function getCurrentPage() {

        $currentPage = str_replace( ['-', '_'], ' ', explode('.', basename($_SERVER['PHP_SELF']))[0] );
        return $currentPage == 'index' ? 'Home' : ucwords($currentPage);

    };

    function getFiles(string $Path) {

        $files = array();

        $handle = opendir($Path);
        if ( !empty($handle) ) {

            while (false !== ($entry = readdir($handle))) {

                if ($entry != "." && $entry != "..") {
                    array_push($files, $entry);
                }

            }

            closedir($handle);

        }

        return $files;

    }

?>