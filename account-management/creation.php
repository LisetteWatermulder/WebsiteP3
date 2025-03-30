<?php

    /* function createTables() {

        $connection = $_SESSION["dbConnection"];
        $connection->query("CREATE TABLE IF NOT EXISTS `User` (

            `UserName` VARCHAR(50) PRIMARY KEY,
            `PasswordHash` VARCHAR(100) NOT NULL,
            `DateOfBirth` VARCHAR(10) NOT NULL,
            `FirstName` VARCHAR(50) NOT NULL,
            `LastName` VARCHAR(50) NOT NULL,
            'EmailAddress' VARCHAR(60) NOT NULL,
            'PhoneNumber' VARCHAR(15) NOT NULL,
            'Address' VARCHAR(55) NOT NULL,
            'IsAdmin' BOOLEAN

            CONSTRAINT `PK_User` PRIMARY KEY (`UserName`, `Address`)

        )");

    }

    function createDummyData() {



    } */

    function createNewUser(string $Username, string $Password, string $DateOfBirth, string $FirstName, string $LastName, string $EmailAddress, string $PhoneNumber, string $Address) {

        $connection = $_SESSION["dbConnection"];
        try {
            $connection->query("INSERT INTO `User` (`UserName`, `PasswordHash`, `DateOfBirth`, `FirstName`, `LastName`, `EmailAddress`, `PhoneNumber`, `Address`) VALUES ('$Username', '" . password_hash($Password, PASSWORD_DEFAULT) . "', '$DateOfBirth', '$FirstName', '$LastName', '$EmailAddress', '$PhoneNumber', '$Address')");
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    function makeAdmin() {

        $connection = $_SESSION["dbConnection"];
        $connection->query("UPDATE `User` SET `IsAdmin` = 1 WHERE `UserName` = '" . $_SESSION["username"] . "'");
        $_SESSION["isAdmin"] = true;

    }

    function searchUser(string $Username) {

        $connection = $_SESSION["dbConnection"];
        $result = $connection->query("SELECT * FROM `User` WHERE `UserName` = '$Username'");
        return $result->fetch_assoc();

    }

    function getUserList() {
        
        $connection = $_SESSION["dbConnection"];
        $result = $connection->query("SELECT * FROM `User` ORDER BY `UserName`");
        return $result->fetch_all();

    }

    function deleteUser(string $Username) {

        $connection = $_SESSION["dbConnection"];
        $connection->query("DELETE FROM `User` WHERE `UserName` = '$Username'");

    }

?>