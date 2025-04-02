<?php

require_once 'credentials.php';

class gebruiker
{
    private $gebruikersnaam;
    private $wachtwoord;
    private $locatie;
    private $rol;

    // Constructor to initialize the user's properties
    public function __construct($gebruikersnaam, $wachtwoord /*, $rol */)
    {
        $this->gebruikersnaam = $gebruikersnaam;
        $this->wachtwoord = $wachtwoord;
        /* $this->rol = $rol; */
    }

    // Getter for gebruikersnaam
    public function getgebruikersnaam(): string
    {
        return $this->gebruikersnaam;
    }

    // Setter for gebruikersnaam
    public function editUser(string $gebruikersnaam = "", string $wachtwoord = "", string $voornaam = "", string $achternaam = "", string $adres = "", string $geboortedatum = "", string $voorkeurslocatie = "", string $emailadres = "")
    {

        $paramCount = 0;
        $params = [$gebruikersnaam, $wachtwoord, $voornaam, $achternaam, $adres, $geboortedatum, $voorkeurslocatie, $emailadres];

        foreach ($params as $param) {
            if (isset($param) && !empty($param)) {
                $paramCount++;
            }
        }

        if ($paramCount > 1) {
            throw new Exception("Only one parameter should be modified at a time");
        }

        if ($paramCount === 0) {
            return false;
        }
        
        if (!isset($_SESSION['dbConnection'])) {
            die('Database connection not found in session');
        }

        $connection = $_SESSION["dbConnection"];

        if ( isset($gebruikersnaam) ) {
            $result = $connection->prepare("UPDATE `User` set 'UserName' = '$gebruikersnaam' WHERE `UserName` = '$this->gebruikersnaam'");
        }
        else if ( isset($wachtwoord) ) {
            $passwordHash = password_hash($wachtwoord, PASSWORD_DEFAULT);
            $result = $connection->prepare("UPDATE `User` set 'PasswordHash' = '$passwordHash' WHERE `UserName` = '$this->gebruikersnaam'");
        }
        else if ( isset($voornaam) ) {
            $result = $connection->prepare("UPDATE `User` set 'FirstName' = '$voornaam' WHERE `UserName` = '$this->gebruikersnaam'");
        }
        else if ( isset($achternaam) ) {
            $result = $connection->prepare("UPDATE `User` set 'LastName' = '$achternaam' WHERE `UserName` = '$this->gebruikersnaam'");
        }
        else if ( isset($adres) ) {
            $result = $connection->prepare("UPDATE `User` set 'Address' = '$adres' WHERE `UserName` = '$this->gebruikersnaam'");
        }
        else if ( isset($geboortedatum) ) {
            $result = $connection->prepare("UPDATE `User` set 'DateOfBirth' = '$geboortedatum' WHERE `UserName` = '$this->gebruikersnaam'");
        }
        else if ( isset($voorkeurslocatie) ) {
            $result = $connection->prepare("UPDATE `User` set 'PreferredLocation' = '$voorkeurslocatie' WHERE `UserName` = '$this->gebruikersnaam'");
        }
        else if ( isset($emailadres) ) {
            $result = $connection->prepare("UPDATE `User` set 'EmailAddress' = '$emailadres' WHERE `UserName` = '$this->gebruikersnaam'");
        }
        
        $result->execute();
        return $result->fetch();

    }

    // Getter for wachtwoord
    public function getWachtwoord(): string
    {
        return $this->wachtwoord;
    }

    // Setter for wachtwoord
    public function setWachtwoord($wachtwoord): void
    {
        /* password_hash($this->wachtwoord, PASSWORD_DEFAULT) */
        $this->wachtwoord = $wachtwoord;
    }

    public function checkPassword($minCharacterRequired = 8): bool {

        if ( !isset($this->wachtwoord) ) {
            return false;
        }

        if ($minCharacterRequired > $this->wachtwoord) {
            return false;
        }

        return true;

    }

    // Getter for locatie
    public function getlocatie(): string
    {
        return $this->locatie;
    }

    // Setter for locatie
    public function setlocatie($locatie): void
    {
        $this->locatie = $locatie;
    }

    public function login()
    {

        $dbUser = $this->searchUser();
        if ($dbUser) {

            if ( password_verify($this->wachtwoord, $dbUser['PasswordHash']) ) {
                $this->locatie = $dbUser['Location'];
                return true;
            }

        }
        
        return false;

    }

    public function searchUser() {

        if (!isset($_SESSION['dbConnection'])) {
            die('Database connection not found in session');
        }

        $connection = $_SESSION["dbConnection"];
        $result = $connection->prepare("SELECT * FROM `User` WHERE UserName = '$this->gebruikersnaam'");
        $result->execute();
        return $result->fetch();

    }

    public function newUser(string $gebruikersnaam, string $wachtwoord, string $voornaam, string $achternaam, string $mail, string $geboortedatum, string $adres)
    {

        if (!isset($_SESSION['dbConnection'])) {
            die('Database connection not found in session');
        }

        $connection = $_SESSION["dbConnection"];
        $stmt = $connection->prepare("INSERT INTO `User` (UserName, PasswordHash, FirstName, LastName, EmailAddress, BirthDate, Address) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$gebruikersnaam, password_hash($wachtwoord, PASSWORD_DEFAULT), $voornaam, $achternaam, $mail, $geboortedatum, $adres]);

    }

}

class bestelling
{
    private $bestellingid;
    private $locatie;
    private $totaalprijs;
    private $status;

    // Constructor to initialize the user's properties
    public function __construct($bestellingid, $locatie, $totaalprijs, $status)
    {
        $this->bestellingid = $bestellingid;
        $this->locatie = $locatie;
        $this->totaalprijs = $totaalprijs;
        $this->status = $status;
    }
    // Getter for status
    public function getBestellingid(): int
    {
        return $this->bestellingid;
    }

    // Setter for status
    public function setBestellingid($bestellingid): void
    {
        $this->status = $bestellingid;
    }

    // Getter for status
    public function getStatus(): string
    {
        return $this->status;
    }

    // Setter for status
    public function setStatus($status): void
    {
        $this->status = $status;
    }
}

class betaalgegevens
{
    private $betaalid;
    private $bedrag;
    private $betaalmethode;
    private $betaaldatum;

    // Constructor to initialize the user's properties
    public function __construct($betaalid, $bedrag, $betaalmethode, $betaaldatum)
    {
        $this->betaalid = $betaalid;
        $this->bedrag = $bedrag;
        $this->betaalmethode = $betaalmethode;
        $this->betaaldatum = $betaaldatum;
    }

    // we used hardcoded content and dicts to simulate the data that would be fetched from a database
}

class product
{
    private $productid;
    private $productnaam;
    private $prijs;
    private $status;
    private $locatie;
    private $voorraad;

    // Constructor to initialize the user's properties
    public function __construct($productid, $productnaam, $prijs, $status, $locatie, $voorraad)
    {
        $this->productid = $productid;
        $this->productnaam = $productnaam;
        $this->prijs = $prijs;
        $this->status = $status;
        $this->locatie = $locatie;
        $this->voorraad = $voorraad;
    }

    // we used hardcoded content and dicts to simulate the data that would be fetched from a database
}

class systemhandler
{

    public function slaVoorkeursLocatieOp($klantid, $locatie)
    {
        // we used hardcoded content and dicts to simulate the data that would be fetched from a database
    }

    public function zoekProduct($productid, $locatie)
    {
        // we used hardcoded content and dicts to simulate the data that would be fetched from a database
    }

    public function opslaanBetaalgegeven($bestellingid, $bedrag, $betaalmethode)
    {
        // we used hardcoded content and dicts to simulate the data that would be fetched from a database
    }

    public function geneerQRCode($bestellingid)
    {
        
        

    }
}

$database = new Database('localhost', 'dbuser', 'LkC9STj5n6bztQ', 'PlugAndPlay');
$_SESSION['dbConnection'] = $database->connect();

// Handle payment and QR code generation
/* if (isset($_POST['pay'])) {
    $paymentMethod = $_POST['payment_method'];
    $_SESSION['payment_method'] = $paymentMethod;

    // Generate QR Code via GOQR.me API
    $qrContent = "Bestelling: " . $_SESSION['product'] . ", Locatie: " . $_SESSION['locatie'] . ", Betaalmethode: " . $paymentMethod;
    $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrContent);
    $_SESSION['qr_code'] = $qrUrl;

    header("Location: ?step=complete");
    exit();
} */

?>