<?php

require_once 'credentials.php';

class gebruiker
{
    private $gebruikersnaam;
    private $wachtwoord;
    private $locatie;
    private $rol;

    // Constructor to initialize the user's properties
    public function __construct($gebruikersnaam, $wachtwoord/* , $rol */)
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
    public function setgebruikersnaam($gebruikersnaam)
    {
        $this->gebruikersnaam = $gebruikersnaam;
    }

    // Getter for wachtwoord
    public function getWachtwoord(): string
    {
        return $this->wachtwoord;
    }

    // Setter for wachtwoord
    public function setWachtwoord($wachtwoord): void
    {
        $this->wachtwoord = $wachtwoord;
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

        $dbUser = $this->searchUser($this->gebruikersnaam);
        if ($dbUser) {

            if ( password_verify($this->wachtwoord, $dbUser['PasswordHash']) ) {
                $this->locatie = $dbUser['Location'];
                return true;
            }

        }
        
        return false;

    }

    public function searchUser(string $gebruikersnaam) {

        if (!isset($_SESSION['dbConnection'])) {
            die('Database connection not found in session');
        }

        $connection = $_SESSION["dbConnection"];
        $result = $connection->prepare("SELECT * FROM `User` WHERE UserName = '$gebruikersnaam'");
        $result->execute();
        return $result->fetch();

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