USE `plugandplay`;

-- Supplier inserts
INSERT INTO `Supplier` (`SupplierName`, `Address`, `Country`, `SalesPerson`, `PhoneNumber`) 
VALUES ("Power Supply Nu", "De Herbeenlaan 363", "Nederland", "Frans van Veen", "110101"),
("Amazon EU S.à r.l.", "Mr. Treublaan 7", "Nederland", "Annette Maan", "185396"),
("UGREEN.", "19H WAN DI PLAZA 3 TAI YU STREET SAN PO KONG KOWLOON BAY", "China", "Ping Yo", "734075");

-- Location inserts - Removed StockName initially since it has a circular reference with Product
INSERT INTO `Location` (`ChargingStationName`, `LocationName`, `LocationAddress`) 
VALUES ("Amsterdam Rai", "Amsterdam Rai", "Europaplein 24"),
("Breda Centraal", "Breda Centraal", " Stationsplein 16"),
("Rotterdam Euromast", "Rotterdam Euromast", "Parkhaven 20"),
("Utrecht Centraal", "Utrecht Centraal", "Croeselaan 14 P"),
("Jaarbeurs Utrecht", "Jaarbeurs Utrecht", "Croeselaan 14 P"),
("Amsterdam Centraal", "Amsterdam Centraal", "Croeselaan 14 P"),
("Rotterdam Centraal", "Rotterdam Centraal", "Croeselaan 14 P");

-- Product inserts with required fields
INSERT INTO `Product` (`ProductName`, `Availability`, `Price`, `Status`, `Description`, `ProviderName`, `StoredLocationName`) 
VALUES ("PlayGreen1", 1, 8.00, "Op Voorraad", "4.000 mAh powerbank", "UGREEN.", "Amsterdam Rai"),
("PlayGreen2", 0, 8.00, "Niet Leverbaar", "10.000 mAh powerbank", "UGREEN.", "Breda Centraal"),
("PlayGreen3", 1, 8.00, "Op Voorraad", "27.000 mAh powerbank", "UGREEN.", "Rotterdam Euromast");

-- User inserts remain the same as they appear correct
-- Keeping just a few examples for brevity
INSERT INTO `User` (`UserName`, `Address`, `DateOfBirth`, `EmailAddress`, `FirstName`, `LastName`, `Password`, `PhoneNumber`, `Role`) 
VALUES ('hdevries', 'Hendrick van loonlaan 4', '1994-01-17', 'hdevries@gmail.com', 'Hans', 'de Vries', '$2y$10$5BM1s.ZBEMqSltCPbIQb9erKxx5ac4xJgFg0MEderCt7XAolwW8wW', '06-37229539', 'User'),
('Albinus genaamd Weiss von Weissenlöwweg 3-5 n4967 PH Mander', '2015-01-05', 'rschouten@example.net', 'Isis', 'Aziz', 'efdb74e5a6c198c1ea9d23b62e379f', '0414-342064', 'User'),
('Jonkerboulevard 17-11 n2292 ME Iens', '1978-02-20', 'noëlle24@example.net', 'Alicia', 'Rahajoe genaamd en geschreven ', '1ef243105b9132e20a031806455723', '+31(0)58-1797810', 'User'),
('Sardjoesteeg 98 n4078 LT Winterswijk Ratum', '2001-11-29', 'vandoorn.ceylin@example.org', 'Kyan', 'Kalloe', '16c4ee2e1573e5b6f45bd64f50ca11', '+316 44645214', 'User', 'zoë.de haan'),
('van Drenthedreef 61q n7980 CI Rilland', '2022-11-19', 'depruyssenaeredelawoestijne.ha', 'Bradley', 'van het Heerenveen', '3a00d2a8ec6ba963ed23b07e222358', '+31(0)980 858766', 'User'),
('de Gratiehof 3993 n9322 GA Alphen', '2010-02-26', 'udebruin@example.net', 'Lizzy', 'van Leeuwen', 'ad994c68507f375f4543b05582a1e0', '+31(0)146 317064', 'User'),
('Zuérius Boxhorn van Miggrodestraat 2-o n1254 HV Marum', '1983-09-02', 'cbrizee@example.org', 'Nina', 'Zhang', 'e7cca3f3539e0d1446e41a39c32216', '032 4370817', 'User'),
('Kanhaiweg 594 n8057 RQ Feanwâlden', '1993-06-12', 'sep81@example.net', 'Merijn', 'Nihoe', '583a50e381a9e54161f62ee4012e33', '0197-571696', 'User', 'van leeuwen.stan'),
('Gansneb genaamd Tengnagel tot Bonkenhavebaan 54-w n9536 BT Zweins', '2010-10-21', 'hulshouts.bilal@example.org', 'Daan', 'Franse Storm', 'babba30efb3b118848b5b57b73237f', '+31410-073875', 'User'),
('van Hugenpoth tot den Berenclauwring 94k n4750 BG Hoogersmilde', '2008-02-06', 'uzun.pippa@example.com', 'Naud', 'Demir', 'eff4591ad3ee909eee247321caccc7', '+316 10709218', 'User'),
('Esajashof 26o n5396 NV Ouderkerk aan de Amstel', '1994-01-17', 'lize.ramcharan@example.net', 'James', 'Badal', '24a542374036b48174b67de4cdd772', '(0055) 372299', 'User'),
('Hermansring 1b n2595 EQ Laag-Soeren', '1979-03-10', 'jan87@example.com', 'Britt', 'Claassen', '21c6cbb4725b034604bafedc7d4202', '+31(0)07-4970941', 'User'),
('Jansz Muskus te Pasqueweg 77 n1547 DO Muiderberg', '1982-08-03', 'philip23@example.org', 'Fenne', 'Ferran', '83c15d70e30f679d09d5815a4b7c3d', '+3164 8620502', 'User'),
('Kuipersbaan 90 n2109 CL Mantgum', '1979-10-16', 'amin.vroegindewei@example.org', 'Julia', 'Zowran von Ranzow', '104a3ab2bbac17b22b60006ffc68de', '(007) 1863903', 'User'),
('van Berkumdreef 93-99 n3958 JU Puth', '2022-11-24', 'sital.mara@example.org', 'Joey', 'van der Ven', 'd9a59c43df77deb5cf1e91f94e34f6', '0857 764037', 'User'),
('Jonkerbaan 12 n8645 XP Melderslo', '1973-12-25', 'joëlle86@example.net', 'Maaike', 'Kurt', '567441952e18594e2510b2af82f952', '+31(0)221514618', 'User'),
('de Bruindreef 6-9 n7727 VR Sluiskil', '1986-02-24', 'paspoortvangrijpskerkeenpoppen', 'Linn', 'Cadefau', 'd37f60742f14dd88d790af9b4acdff', '+3171-2061804', 'User'),
('Duhme auf der Heide sive Heydahrenssingel 1-t n7079 IB Warmond', '2019-06-17', 'evanhugenpothtotdenberenclauw@', 'Kim', 'Boer', '7e63f1415d66956fad1954fcf51a38', '+31(0)377 403579', 'User'),
('Elsjan of Wipperring 4 n1907 HO Baars', '2021-05-17', 'dorisbinsijlvanus.teun@example', 'Luka', 'de Groot', '1040f11a1cd488083bb8e9ba556d92', '06-84713153', 'User'),
('Azizboulevard 8p n3165 IP Geijsteren', '2014-10-28', 'alex90@example.net', 'Meike', 'Yilmaz', 'f3c9f523c7cf36754e77d7cf013e62', '+31799 866144', 'User'),
('Nguyenlaan 6-4 n2490 AO t Goy', '2025-01-30', 'ouwel.ali@example.net', 'Aya', 'de Pruyssenaere de la Woestijn', '49cd05ecf39735d90bb60d88e678ad', '018 3518877', 'User'),
('van Wallaertdreef 7131 n6720 NS Oudehorne', '2010-01-07', 'thuisman@example.com', 'Josephine', 'van Geffen', 'aeda97c22ca0c82aaf04183b22df7c', '0639004895', 'User'),
('Roosesteeg 76-04 n2227 QY Otterlo', '2001-04-16', 'nora.spiegelmakerspanjaard@exa', 'Kai', 'Post', 'f4c849295b90dbde0294de8f6d42b8', '+31954-904646', 'User'),
('de Kokweg 2-2 n4338 GQ Meppen', '2018-01-15', 'tyler.yildiz@example.org', 'Mats', 'Molenaar', '01a2b4b5bdc6273298c424858a5782', '+31696056259', 'User'),
('Overeemsingel 4y n7667 HM Meijel', '1987-12-01', 'femke03@example.net', 'Luca', 'van der Ven', '6ba414479bd77dd448770dbfcf146c', '+316 14708844', 'User'),
('die Wittehof 4m n1038 AM Appeltern', '2023-01-25', 'benjamin42@example.net', 'Jill', 'Brouwer', 'ddf8053101cb05110ef7b93fd73503', '+316 75264791', 'User'),
('Rahajoe genaamd en geschreven ten Katedreef 2-7 n1686 YD Opijnen', '2008-02-04', 'pim00@example.com', 'Rosalie', 'Tahiri', '22a8871faf5dfc81c92ec93d889bf2', '+31(0)6-87471392', 'User'),
('Grinwis Plaat Stuitjeslaan 4y n8530 IA Elst', '1991-07-06', 'brian.korkmaz@example.org', 'Tobias', 'Spring in t Veld', '23c92b256c8932f211d78c00957505', '+3156-5872573', 'User'),
('Brouwerdreef 8-4 n8372 LH Maastricht-Airport', '1992-07-23', 'simsek.kick@example.org', 'Lina', 'Gansneb genaamd Tengnagel tot ', 'c5a40319196338c355b573219a1b72', '+31463 358564', 'User'),
('Badalbaan 72 n6436 OX Alphen', '2008-01-08', 'kijkindevegte.jamie@example.ne', 'Yasmine', 'Kalloe', '0ed3e98f86dca586a627da2fbbd43e', '(079)-7536187', 'User'),
('Takkelenburgdreef 9 n2957 PP Tienhoven', '2015-06-08', 'livia.devos@example.net', 'Vera', 'Esajas', '07f65b792cb7dbc2c18b9da44f5456', '06-97757013', 'User'),
('Ramautarlaan 7u n2116 CD Puth', '1992-09-01', 'springintveld.fabiënne@exampl', 'Kim', 'Geerman', 'e90de34b8885626a801d611c24740d', '06 69136493', 'User'),
('Koning Knolhof 22 n6824 SE Baarlo', '1998-11-08', 'jvroegindewei@example.com', 'Lara', 'van Drenthe', '70f71da2898d4262a020a2757bf022', '0296-782813', 'User'),
('Vinkstraat 4-z n3148 RI Simpelveld', '1974-03-31', 'thijs04@example.net', 'Sofia', 'Paspoort van Grijpskerke en Po', 'dd02c9ed3a33012192ac0c4903aa5c', '+31(0)915 038999', 'User'),
('Winnrichdreef 4320 n8421 AX Deinum', '2016-08-09', 'jalbinusgenaamdweissvonweissen', 'Stan', 'Kurt', 'a75b467894066610068d769683628b', '06-70395797', 'User'),
('Sardjoelaan 5 n5364 EP Moerkapelle', '1999-08-19', 'lieve30@example.com', 'Kaylee', 'Martena van Burmania Vegilin v', 'bb67ec137ae6be4263e01d2a653155', '+316-04138983', 'User'),
('Huijbrechtslaan 15 n9229 ON Oude Willem', '2024-07-04', 'johanna.vanderveen@example.net', 'Noor', 'Çakir', '3615daa0e849c280ae1cb0517ab1ec', '06-82240419', 'User'),
('Zuérius Boxhorn van Miggrodepad 6 n5174 JX Rinsumageast', '1977-03-09', 'jort.çetin@example.net', 'Floris', 'van der Pol', '49b13cc2f923c62003c883aa7ff71c', '+31(0)6 63323174', 'User'),
('van Boles Rijnbendelaan 520 n5608 XB Buren', '1987-11-01', 'tvosspecht@example.com', 'Liam', 'Cicilia', '4a72032da81081626d68b1d5965ee0', '+31(0)75-2846815', 'User'),
('van Wessexbaan 99-72 n1796 UW Slagharen', '2000-04-20', 'bourgondië,van.merel@example.o', 'Nout', 'Mahabier', '8a7ca26dcf99021fd7e88032c3d8a9', '+31763-595045', 'User'),
('Kleine Pierhof 53-32 n1022 CJ Rijswijk (GLD)', '2016-09-04', 'carlijn.kleinepier@example.org', 'Isis', 'de la Fontaine und dHarnoncou', '14e314970fc5dc658d92afa7304bd5', '+3123 6929349', 'User');