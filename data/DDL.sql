CREATE DATABASE IF NOT EXISTS plugandplay;

USE plugandplay;

CREATE TABLE
    IF NOT EXISTS `Supplier` (
        `Address` VARCHAR(80),
        `Country` VARCHAR(50),
        `SalesPerson` VARCHAR(40),
        `SupplierName` VARCHAR(40) PRIMARY KEY, 
        `PhoneNumber` VARCHAR(30)
        -- Supplier naam kan veranderen en is dus geen goede primary key
        -- `Supplierid` INT PRIMARY KEY AUTO_INCREMENT, -- Dit is een auto increment en kan dus niet veranderen, maar is niet uniek in de database
    );

CREATE TABLE
    IF NOT EXISTS `Product` (
        `Availability` TINYINT (1),
        `Price` DECIMAL(10, 2),
        `ProductName` VARCHAR(50) PRIMARY KEY,
        `Status` VARCHAR(50),
        `Description` VARCHAR(50),
        -- Foreign Keys
        `ProviderName` VARCHAR(50),
        `StoredLocationName` VARCHAR(50)
    );

CREATE TABLE
    IF NOT EXISTS `Location` (
        `ChargingStationName` VARCHAR(50) PRIMARY KEY,
        `LocationAddress` VARCHAR(50),
        `LocationName` VARCHAR(50),
        -- Foreign Key
        `StockName` VARCHAR(50)
    );

CREATE TABLE
    IF NOT EXISTS `User` (
        `UserName` VARCHAR(30),
        `Address` VARCHAR(80),
        `DateOfBirth` DATE,
        `EmailAddress` VARCHAR(30),
        `FirstName` VARCHAR(30),
        `LastName` VARCHAR(30),
        `Password` VARCHAR(100),
        `PhoneNumber` VARCHAR(30),
        `Role` ENUM (
            "Super Admin",
            "Administrator",
            "Supplier",
            "User"
        ),
        -- Foreign Key
        `PreferredLocationName` VARCHAR(50),
        PRIMARY KEY (`UserName`, `Address`)
    );

CREATE TABLE
    IF NOT EXISTS `Order` (
        `Date` DATE,
        `OpenBalance` VARCHAR(20),
        `PaymentMethod` VARCHAR(20),
        `ReferenceNumber` VARCHAR(20) PRIMARY KEY,
        `Status` ENUM (
            "Betaling Voltooid",
            "Betaling Geweigerd",
            "Betaling In Behandeling",
            "Opgehaald",
            "Voltooid"
        ),
        `TotalPrice` DECIMAL(10, 2),
        -- Foreign Keys
        `ConsumerName` VARCHAR(30),
        `ConsumerAddress` VARCHAR(80),
        `CompanyName` VARCHAR(40)
    );

CREATE TABLE
    IF NOT EXISTS `Order_Product` (
        `ProductName` VARCHAR(50),
        `Quantity` INT,
        `ReferenceNumber` VARCHAR(20),
        PRIMARY KEY (`ProductName`, `ReferenceNumber`)
    );
    
    
ALTER TABLE `Product` 
        ADD CONSTRAINT FK_Product FOREIGN KEY (`ProviderName`) REFERENCES Supplier (`SupplierName`) ON UPDATE CASCADE,
        ADD CONSTRAINT FK_StoredLocation FOREIGN KEY (`StoredLocationName`) REFERENCES Location (`ChargingStationName`) ON UPDATE CASCADE;

ALTER TABLE `Location`
		ADD CONSTRAINT FK_Location FOREIGN KEY (`StockName`) REFERENCES Product (`ProductName`) ON UPDATE CASCADE;
        
ALTER TABLE `User`        
        ADD CONSTRAINT FK_User FOREIGN KEY (`PreferredLocationName`) REFERENCES Location (`ChargingStationName`) ON UPDATE CASCADE;

ALTER TABLE `Order`
        ADD CONSTRAINT FK_Order FOREIGN KEY (`ConsumerName`, `ConsumerAddress`) REFERENCES User (`UserName`, `Address`),
 		ADD CONSTRAINT FK_Supplier FOREIGN KEY (`CompanyName`) REFERENCES Supplier (`SupplierName`) ON UPDATE CASCADE;
        
ALTER TABLE `Order_Product`        
        ADD CONSTRAINT FK_OrderProduct_Product FOREIGN KEY (`ProductName`) REFERENCES `Product` (`ProductName`) ON UPDATE CASCADE ON DELETE CASCADE,
        ADD CONSTRAINT FK_OrderProduct_Order FOREIGN KEY (`ReferenceNumber`) REFERENCES `Order` (`ReferenceNumber`) ON UPDATE RESTRICT ON DELETE CASCADE;



DROP PROCEDURE AddProduct; -- Remove the procedure if it already exists
        DELIMITER //

CREATE PROCEDURE AddProduct (
    IN ProductName VARCHAR(50),
    IN Availability TINYINT(1),
    IN Price DECIMAL(10,2)
)
BEGIN
    INSERT INTO Products (
        ProductName,
        Availability,
        Price
    )
    VALUES (
        ProductName,
        Availability,
        Price
    );
END //

DELIMITER ;

-- Now you can call the procedure like this:
CALL AddProduct('Philips A1', 1, 20.00);