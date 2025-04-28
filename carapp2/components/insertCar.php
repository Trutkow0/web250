<?php
include 'config_db.php';
<?php

$VIN = trim($_POST['VIN']);
$YEAR = (int) $_POST['YEAR'];
$Make = trim($_POST['Make']);
$Model = trim($_POST['Model']);
$TRIM = trim($_POST['TRIM']);
$EXT_COLOR = trim($_POST['EXT_COLOR']);
$INT_COLOR = trim($_POST['INT_COLOR']);
$ASKING_PRICE = (float) $_POST['ASKING_PRICE'];
$SALE_PRICE = (float) $_POST['SALE_PRICE'];
$PURCHASE_PRICE = (float) $_POST['PURCHASE_PRICE'];
$MILEAGE = (int) $_POST['MILEAGE'];
$TRANSMISSION = trim($_POST['TRANSMISSION']);
$PURCHASE_DATE = $_POST['PURCHASE_DATE'];
$SALE_DATE = $_POST['SALE_DATE'];

$query = "INSERT INTO inventory (VIN, YEAR, Make, Model, TRIM, EXT_COLOR, INT_COLOR, ASKING_PRICE, SALE_PRICE, PURCHASE_PRICE, MILEAGE, TRANSMISSION, PURCHASE_DATE, SALE_DATE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("sissssssddisss", 
    $VIN, 
    $YEAR, 
    $Make, 
    $Model, 
    $TRIM, 
    $EXT_COLOR, 
    $INT_COLOR, 
    $ASKING_PRICE, 
    $SALE_PRICE, 
    $PURCHASE_PRICE, 
    $MILEAGE, 
    $TRANSMISSION, 
    $PURCHASE_DATE, 
    $SALE_DATE
);

if ($stmt->execute()) {
    header("Location: ../index.php?added=true");
    exit;
} else {
    echo "<p>Error inserting: " . $stmt->error . "</p>";
}

$stmt->close();
$mysqli->close();
?>
