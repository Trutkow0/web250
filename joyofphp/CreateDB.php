<?php
/**
 * Joy of PHP sample code
 * Demonstrates how to create a database, create a table, and insert records.
 */

$mysqli = new mysqli('localhost', 'phpuser', 'CpccUser01!', 'Cars');


   if (!$mysqli) { 
      die('Could not connect'); 
  } 
  echo 'Connected successfully to mySQL. <br>'; 
  

/* Create table doesn't return a resultset */
if ($mysqli->query("CREATE DATABASE IF NOT EXISTS Cars") === TRUE) {
    echo "<p>Database Cars created</p>";
}
else
{
    echo "Error creating Cars database: " . $mysqli->connect_error ."<p>";
}

//select a database to work with
$mysqli->query("USE Cars");
   Echo "<p>Using Cars database</p>";

$query = " CREATE TABLE IF NOT EXISTS inventory 
( VIN VARCHAR(17) PRIMARY KEY, YEAR INT, Make VARCHAR(50), Model VARCHAR(100), 
TRIM VARCHAR(50), EXT_COLOR VARCHAR(50), INT_COLOR VARCHAR(50), ASKING_PRICE DECIMAL (10,2), 
SALE_PRICE DECIMAL (10,2), PURCHASE_PRICE DECIMAL (10,2), MILEAGE int, TRANSMISSION VARCHAR(50), 
PURCHASE_DATE DATE, SALE_DATE DATE)";
//echo "<p>***********</p>";
//echo $query ;
//echo "<p>***********</p>";
if ($mysqli->query($query) === TRUE) 
{
    echo "<p>Database table 'INVENTORY' created</p>";
}
else
{
    echo "<p>Error: " . $mysqli->error . "</p>";
}
// Dates are stored in MySQL as 'YYYY-MM-DD' format
$query = "INSERT IGNORE INTO `Cars`.`inventory` 
(`VIN`, `YEAR`, `Make`, `Model`, `TRIM`, `EXT_COLOR`, `INT_COLOR`, `ASKING_PRICE`, `SALE_PRICE`, `PURCHASE_PRICE`, `MILEAGE`, `TRANSMISSION`, `PURCHASE_DATE`, `SALE_DATE`) 
VALUES 
('5FNYF4H91CB054036', '2012', 'Honda', 'Pilot', 'Touring', 'White Diamond Pearl', 'Leather', '37807', NULL, '34250', '7076', 'Automatic', '2012-11-08', NULL);";


if ($mysqli->query($query) === TRUE) {
    echo "<p>Honda Pilot inserted into inventory table. </p>";
}
else
{
    echo "<p>Error inserting Honda Pilot: " . $mysqli->error . "</p>";
    echo "<p>***********</p>";
    echo $query ;
    echo "<p>***********</p>";
}

// Insert a Dodge Durango

$query = "INSERT INTO `Cars`.`inventory` (`VIN`, `YEAR`, `Make`, `Model`, `TRIM`, `EXT_COLOR`, `INT_COLOR`, `ASKING_PRICE`, `SALE_PRICE`, `PURCHASE_PRICE`, `MILEAGE`, `TRANSMISSION`, `PURCHASE_DATE`, `SALE_DATE`) 
VALUES 
('LAKSDFJ234LASKRF2', '2009', 'Dodge', 'Durango', 'SLT', 'Silver', 'Black', '2700', NULL, '2000', '144000', '4WD Automatic', '2012-12-05', NULL);";


if ($mysqli->query($query) === TRUE) {
    echo "<p>Dodge Durango inserted into inventory table.</p>";
}
else
{
    echo "<p>Error Inserting Dodge: " . $mysqli->error . "</p>";
    echo "<p>***********</p>";
    echo $query ;
    echo "<p>***********</p>";
}

// Insert 27 other cars
$query3 = "INSERT INTO `Cars`.`inventory` (`VIN`, `YEAR`, `Make`, `Model`, `TRIM`, `EXT_COLOR`, `INT_COLOR`, `ASKING_PRICE`, `SALE_PRICE`, `PURCHASE_PRICE`, `MILEAGE`, `TRANSMISSION`, `PURCHASE_DATE`, `SALE_DATE`)
 VALUES
('1FAFP44423F44657', 2003, 'Ford', 'Mustang', 'Base', 'Silver / Black', 'Gray', 8995, NULL, 6746, 75820, 'Automatic', '2013-01-14', NULL),
('2G1WD58C47917903', 2007, 'Chevrolet', 'Impala', 'SS', 'Gray', 'Gray', 9995.00, NULL, 7496, 129108, '4-Speed Automatic', '2013-01-14', NULL),
('19UUA56682A036203', 2002, 'Acura', 'TL', 'Base', 'Blue', 'Tan', 7995.00, NULL, 5996, 77442, '5-Speed Automatic', '2013-01-14', NULL),
('1B3EL46J25N513802', 2005, 'Dodge', 'Stratus', 'SXT', 'Blue', 'Gray', 7995.00, NULL, 5996, 41941, '4-Speed Automatic', '2013-01-14', NULL),
('1FAHP36N09W191342', 2009, 'Ford', 'Focus', 'SES', 'Silver', 'Gray', 9670.00, NULL, 7252, 47000, 'Automatic', '2013-01-14', NULL),
('1G1JH12FX57138124', 2005, 'Chevrolet', 'Cavalier', 'LS Sport', 'Yellow', 'Gray', 9995, NULL, 7596.00, 15828, '5-Speed Manual', '2013-01-14', NULL),
('1G1ZU54814F248763', 2004, 'Chevrolet', 'Malibu', 'LT', 'Black', 'Gray', 8995.00, NULL, 6746, 41135, '4-Speed Automatic', '2013-01-14', NULL),
('1G6EL5780FE603440', 1985, 'Cadillac', 'Eldorado', 'Base', 'Pewter', 'Tan', 7995.00, NULL, 5996, 32880, 'UNSPECIFIED', '2013-01-14', NULL),
('1G8JD54R05Y503397', 2005, 'Saturn', 'L300', 'Base', 'Silver', 'Grey', 8888.00, NULL, 6666, 35751, '4-Speed Automatic', '2013-01-14', NULL),
('2HKYF18567H525598', 2007, 'Honda', 'Pilot', 'EX-L', 'Aberdeen Green Metallic', 'Gray', 14500, NULL, 10875.00, 86200, '5-Speed Automatic', '2013-01-14', NULL),
('3A4FY48B27T554499', 2007, 'Chrysler', 'PT Cruiser', 'Base', 'Purple', 'Gray', 7995.00, NULL, 5996, 41981, 'Manual', '2013-01-14', NULL),
('3FAHP01159R137525', 2009, 'Ford', 'Fusion', 'SE', 'Vapor Silver', 'Camel', 9495.00, NULL, 7124, 107532, '6-Speed Automatic', '2013-01-14', NULL),
('3GNFK16T71G208523', 2001, 'Chevrolet', 'Suburban', 'LT', 'Black Onyx', 'Tan Neutral', 7995, NULL, 5996.25, 116305, '4-Speed Automatic', '2013-01-14', NULL),
('5FNRL38477B091190', 2007, 'Honda', 'Oddyssey', 'EX', 'Slate Green Metallic', 'Gray', 10000, NULL, 7500.00, 99555, '5-Speed Automatic', '2013-01-14', NULL),
('5FNYF4H91CB052346', 2012, 'Honda', 'Pilot', 'Touring', 'White Diamond Pearl', 'Leather', 37807, NULL, 34250.00, 7076, 'Automatic', '2012-11-08', NULL),
('5J6YH28307L014151', 2007, 'Honda', 'Element', 'LX', 'Silver', 'Gray', 8995.00, NULL, 6746, 111000, 'Automatic', '2013-01-14', NULL),
('JHLRD77802C069548', 2002, 'Honda', 'CR-V', 'EX', 'Blue', 'Black', 6995.00, NULL, 5246, 105139, '5-Speed Manual', '2013-01-14', NULL),
('JTLKE50E481060621', 2008, 'Scion', 'xB', 'Base', 'Black Sand Pearl', 'Dark Gray', 9999, NULL, 7499.00, 65146, 'Automatic', '2013-01-14', NULL),
('KMHDU46DX7U184501', 2007, 'Hyundai', 'Elantra', 'SE', 'Seattle Blue', 'Gray', 999, NULL, 7497.00, 41560, '5-Speed Manual', '2013-01-14', NULL),
('KNAGE228795310609', 2009, 'Kia', 'Optima', 'Base', 'Ruby Red', 'Beige', 10000, NULL, 7500.00, 56749, '5-Speed Automatic', '2013-01-14', NULL),
('LAKSDFJ234ZASKRF2', 2009, 'Dodge', 'Durango', 'SLT', 'Silver', 'Black', 2700, NULL, 2000.00, 144000, '4WD Automatic', '2012-12-05', NULL),
('WBAEU33434PR12965', 2004, 'BMW', '325', 'xi', 'Silver', 'Black', 9650, NULL, 7237.50, 98208, 'Automatic', '2013-01-14', NULL),
('WDBJF65J71B215984', 2001, 'Mercedes-Benz', 'E320', 'Base', 'Silver', 'Gray', 9900, NULL, 7425.00, 40902, '5-Speed Automatic', '2013-01-14', NULL),
('WDBRF87HX6F757914', 2006, 'Mercedes-Benz', 'C350 4Matic', 'Luxury', 'Black', 'Black', 14450, NULL, 10837.50, 82000, '5-Speed Automatic', '2013-01-14', NULL),
('WMEEK31X79K226939', 2009, 'Smart', 'ForTwo', 'Passion', 'Silver', 'Design Black', 8988, NULL, 6741.00, 23272, '5-Speed Automatic with Auto-Shift', '2013-01-14', NULL),
('WMWRC334X4TJ61214', 2004, 'MINI', 'Cooper', 'Base', 'Jet Black', 'Black', 9499, NULL, 7124.25, 59160, 'Automatic', '2013-01-14', NULL),
('YS3DF75K627015298', 2002, 'Saab', '9-3', 'SE', 'Sand', 'Tan', 8495.00, NULL, 6371, 48499, '5-speed Manual', '2013-01-14', NULL),
('YV1MJ682152063198', 2005, 'Volvo', 'V50', 'T5', 'Blue', 'Black', 8995.00, NULL, 6746, 110354, 'Automatic', '2013-01-14', NULL),
('YV4SZ592561219696', 2006, 'Volvo', 'XC70', 'AWD', 'Willow Green Metallic', 'Taupe Leather', 14996, NULL, 11247, 83664, '5-Speed Automatic w/ Geartronic', '2013-01-14', NULL);
";
if ($mysqli->query($query3) === TRUE) {
    echo "<p>27 cars inserted into inventory table.</p>";
}
else
{
echo mysql_error();
    echo "<p>Error Inserting 27 cars: </p>" . printf("Errormessage: %s\n", $mysqli->error);
    echo "<p>***********</p>";
    echo $query3;
    echo "<p>***********</p>";
}

$mysqli->close();
include 'footer.php';
?>
