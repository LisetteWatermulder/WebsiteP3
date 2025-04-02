<?php

    if (!isset($_COOKIE['isLoggedIn']) || $_COOKIE['isLoggedIn'] === false) {
        
        header('Location: ../inloggen.php');
        exit();

    }

    require_once 'credentials.php';
    require_once 'handlers.php';
    $user = new gebruiker($_COOKIE['username'], $null);
    $userAccount = $user->searchUser();

?>

<!DOCTYPE html>
<html lang="en">

    <?php include_once '../website-components/head.php'; ?>

    <body>

        <?php include_once $_SESSION['rootPath'] . '/website-components/header.php'; ?>

        <h1>Settings</h1>
        <form method="POST" action="">
            <table>

                <tr>

                    <td>Voornaam:</td>
                    <td class="value" id="voornaam">
                        <span class="Value"><?php echo $userAccount['FirstName']; ?></span>
                        <input type="text" class="Change-Value" value="<?php echo $userAccount['FirstName']; ?>" style="display: none;" onchange="">
                    </td>
                    <td><a onclick="ToggleEditButton('voornaam')" class="Edit"><span class="material-symbols-outlined">edit</span></a></td>

                </tr>
                <tr>

                    <td>Achternaam:</td>
                    <td class="value" id="achternaam">
                        <span class="Value"><?php echo $userAccount['LastName']; ?></span>
                        <input type="text" class="Change-Value" value="<?php echo $userAccount['LastName']; ?>" style="display: none;" onchange="">
                    </td>
                    <td><a onclick="ToggleEditButton('achternaam')" class="Edit"><span class="material-symbols-outlined">edit</span></a></td>

                </tr>
                <tr>

                    <td>Gebruikersnaam:</td>
                    <td class="value" id="gebruikersnaam">
                        <span class="Value"><?php echo $_COOKIE['username']; ?></span>
                        <input type="text" class="Change-Value" value="<?php echo $_COOKIE['username']; ?>" style="display: none;" onchange="">
                    </td>
                    <td><a onclick="ToggleEditButton('gebruikersnaam')" class="Edit"><span class="material-symbols-outlined">edit</span></a></td>

                </tr>
                <tr>

                    <td>Wachtwoord:</td>
                    <td class="value" id="wachtwoord">
                        <span class="Value">********</span>
                        <input type="password" class="Change-Value" value="" style="display: none;" onchange="">
                    </td>
                    <td><a onclick="ToggleEditButton('wachtwoord')" class="Edit"><span class="material-symbols-outlined">edit</span></a></td>


                    <input type="submit" name="save" value="Opslaan"/>
                </tr>
                <tr>

                    <td>E-mailadres:</td>
                    <td class="value" id="emailadres">
                        <span class="Value"><?php echo $userAccount['EmailAddress']; ?></span>
                        <input type="text" class="Change-Value" value="<?php echo $userAccount['EmailAddress']; ?>" style="display: none;" onchange="">
                    </td>
                    <td><a onclick="ToggleEditButton('emailadres')" class="Edit"><span class="material-symbols-outlined">edit</span></a></td>

                </tr>
                <tr>

                    <td>Adres:</td>
                    <td class="value" id="adres">
                        <span class="Value"><?php echo $userAccount['Address']; ?></span>
                        <input type="text" class="Change-Value" value="<?php echo $userAccount['Address']; ?>" style="display: none;" onchange="">
                    </td>
                    <td><a onclick="ToggleEditButton('adres')" class="Edit"><span class="material-symbols-outlined">edit</span></a></td>

                </tr>
                <tr>

                    <td>Voorkeurslocatie:</td>
                    <td class="value" id="voorkeurslocatie">
                        <span class="Value"><?php echo $userAccount['PreferredLocation']; ?></span>
                        <input type="text" class="Change-Value" value="<?php echo $userAccount['PreferredLocation']; ?>" style="display: none;" onchange="">
                    </td>
                    <td><a onclick="ToggleEditButton('voorkeurslocatie')" class="Edit"><span class="material-symbols-outlined">edit</span></a></td>

                </tr>
                <tr>

                    <td>Geboortedatum:</td>
                    <td class="value" id="geboortedatum">
                        <span class="Value"><?php echo $userAccount['DateOfBirth']; ?></span>
                        <input type="text" class="Change-Value" value="<?php echo $userAccount['DateOfBirth']; ?>" style="display: none;" onchange="">
                    </td>
                    <td><a onclick="ToggleEditButton('geboortedatum')" class="Edit"><span class="material-symbols-outlined">edit</span></a></td>

                </tr>

            </table>

            <input type="submit" name="save" value="Opslaan"/>
        </form>

        <?php include $_SESSION['rootPath'] . '/website-components/footer.php'; ?>

    </body>

</html>