<?php

// We use sessions to store data to forgo the need of a database
    session_start();

// Ensure session is initialized
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['loggedin'] = false;
}

class gebruiker
{
    private $klantid;
    private $gebruikersnaam;
    private $wachtwoord;
    private $locatie;

    // Constructor to initialize the user's properties
    public function __construct($klantid, $gebruikersnaam, $wachtwoord)
    {
        $this->klantid = $klantid;
        $this->gebruikersnaam = $gebruikersnaam;
        $this->wachtwoord = $wachtwoord;
    }

    // Getter for klantid
    public function getklantid(): int
    {
        return $this->klantid;
    }

    // Setter for klantid
    public function setklantid($klantid)
    {
        $this->klantid = $klantid;
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

    // Display user details
    public function displayUser()
    {
        echo "Gebruikersnaam: " . $this->gebruikersnaam . "<br>";
        if (!isset($this->locatie)) {
            echo "U heeft geen voorkeurslocatie ingesteld." . "<br>";
        } else {
            echo "Uw voorkeurslocatie is: " . $this->locatie . "<br>";
        }
    }

    public function login($gebruikersnaam, $wachtwoord)
    {
        return $this->gebruikersnaam === $gebruikersnaam && $this->wachtwoord === $wachtwoord;
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
        // we used hardcoded content and dicts to simulate the data that would be fetched from a database
    }
}

// Simulate hardcoded user for login
$gebruiker = new gebruiker(1, "hdevries", "wachtwoord123");

// Simulated product availability at locations, where the key is the location and the value is an array of available product IDs
$productAvailability = [
    "Amsterdam RAI" => [1, 2],
    "Jaarbeurs Utrecht" => [1, 2],
    "Station Amsterdam" => [1, 2],
    "Station Rotterdam" => [1, 3],
    "Station Utrecht" => [1, 3]
];

// Product list
$producten = [
    1 => "PlayGreen 1 (5.000 mAh) - €8",
    2 => "PlayGreen 2 (10.000 mAh) - €8",
    3 => "Playgreen 3 (27.000 mAh) - €8"
];

// Locations
$locaties = [
    "Amsterdam RAI",
    "Jaarbeurs Utrecht",
    "Station Amsterdam",
    "Station Rotterdam",
    "Station Utrecht"
];

// Handle login
if (isset($_POST['login'])) {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    if ($gebruiker->login($gebruikersnaam, $wachtwoord)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['gebruiker'] = $gebruiker;
        header("Location: ?step=select_location");
        exit();
    } else {
        $errorMessage = "Ongeldige gebruikersnaam of wachtwoord.";
    }
}

// Handle location selection
if (isset($_POST['select_location'])) {
    $locatie = $_POST['locatie'];
    $gebruiker->setlocatie($locatie);
    $_SESSION['locatie'] = $locatie;
    $_SESSION['available_products'] = $productAvailability[$locatie];
    header("Location: ?step=select_product");
    exit();
}

// Handle product selection
if (isset($_POST['select_product'])) {
    $productID = $_POST['product_id'];
    $_SESSION['product'] = $producten[$productID];
    header("Location: ?step=payment");
    exit();
}

// Handle payment and QR code generation
if (isset($_POST['pay'])) {
    $paymentMethod = $_POST['payment_method'];
    $_SESSION['payment_method'] = $paymentMethod;

    // Generate QR Code via GOQR.me API
    $qrContent = "Bestelling: " . $_SESSION['product'] . ", Locatie: " . $_SESSION['locatie'] . ", Betaalmethode: " . $paymentMethod;
    $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrContent);
    $_SESSION['qr_code'] = $qrUrl;

    header("Location: ?step=complete");
    exit();
}

?>