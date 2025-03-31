CREATE DATABASE IF NOT EXISTS PlugAndPlay;
USE `PlugAndPlay`;
 
/* DROP TABLE IF EXISTS `Supplier`;
DROP TABLE IF EXISTS `Product`;
DROP TABLE IF EXISTS `ProductDetail`;
DROP TABLE IF EXISTS `Order`;
DROP TABLE IF EXISTS `Location`;
DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS `Order_Product`; */
 
CREATE TABLE IF NOT EXISTS `Supplier` (



    `Address` VARCHAR(80),
    `Country` VARCHAR(50),
    `SalesPerson` VARCHAR(40),
    `SupplierName` VARCHAR(40) PRIMARY KEY 
    --Supplier naam kan veranderen en is dus geen goede primary key
    --`Supplierid` INT PRIMARY KEY AUTO_INCREMENT, -- Dit is een auto increment en kan dus niet veranderen, maar is niet uniek in de database

);

CREATE TABLE IF NOT EXISTS `Product` (

    `Available` TINYINT(1),
    `Price` DECIMAL(10,2),
    `ProductName` VARCHAR(50) PRIMARY KEY,
    `Status` VARCHAR(50),
    `Supplier` VARCHAR(40), -- dit was INT maar dat is niet goed, dit moet VARCHAR(40) zijn omdat het een foreign key is naar de supplier tabel
    
    -- The foreign key will be updated if the supplier number is updated because we need to be able to change the supplier number in the product table if the supplier number is changed in the supplier table
    -- The foreign key will be restricted if the supplier number is deleted because we don't want to delete the supplier number in the product table if the product still exists
    CONSTRAINT FK_Product FOREIGN KEY(`Supplier`) REFERENCES Supplier(`SupplierName`) ON UPDATE CASCADE 
    -- Kunnen hier ook kiezen voor een supplierid gezien de supplier naam kan veranderen

);

CREATE TABLE IF NOT EXISTS `Location` (

    `ChargingStationName` VARCHAR(50) PRIMARY KEY,
    `LocationAddress` VARCHAR(50),
    `LocationName` VARCHAR(50),
    `ProductName` VARCHAR(50),

    CONSTRAINT FK_Location FOREIGN KEY(`ProductName`) REFERENCES Product(`ProductName`) ON UPDATE CASCADE ON DELETE SET NULL

);

CREATE TABLE IF NOT EXISTS `User` (

    `Address` VARCHAR(80),
    `DateOfBirth` DATE,
    `EmailAddress` VARCHAR(30),
    `FirstName` VARCHAR(30),
    `LastName` VARCHAR(30),
    `PasswordHash` VARCHAR(100),
    `PhoneNumber` VARCHAR(30),
    `Role` ENUM("Super Admin", "Administrator", "Supplier", "User"),
    `UserName` VARCHAR(30),
    `PreferredLocation` VARCHAR(50),

    CONSTRAINT PK_User PRIMARY KEY(`UserName`, `Address`),
    
    CONSTRAINT FK_User FOREIGN KEY(`PreferredLocation`) REFERENCES Location(`ChargingStationName`) ON UPDATE CASCADE ON DELETE SET NULL

);

CREATE TABLE IF NOT EXISTS `Order` (

    `Date` DATE,
    `OpenBalance` VARCHAR(20),
    `PaymentMethod` VARCHAR(20),
    `ReferenceNumber` VARCHAR(20) PRIMARY KEY,
    `Status` ENUM("Betaling Voltooid", "Betaling Geweigerd", "Betaling In Behandeling", "Opgehaald", "Voltooid"),
    `TotalPrice` DECIMAL(10,2),
    `UserName` VARCHAR(30),
    `Address` VARCHAR(80),

    CONSTRAINT FK_Order FOREIGN KEY(`UserName`,`Address`) REFERENCES User(`UserName`, `Address`)/*  ON UPDATE RESTRICT ON DELETE RESTRICT */

);

CREATE TABLE IF NOT EXISTS `Order_Product` (

    `ProductName` VARCHAR(50),
    `Quantity` INT,
    `ReferenceNumber` VARCHAR(20),


    CONSTRAINT PK_OrderProduct PRIMARY KEY (`ProductName`, `ReferenceNumber`),

    CONSTRAINT FK_OrderProduct_Product FOREIGN KEY (`ProductName`) REFERENCES `Product`(`ProductName`) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_OrderProduct_Order FOREIGN KEY (`ReferenceNumber`) REFERENCES `Order`(`ReferenceNumber`) ON UPDATE RESTRICT ON DELETE CASCADE

);