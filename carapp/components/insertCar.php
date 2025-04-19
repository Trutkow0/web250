<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config_db.php';

$VIN = trim($_POST['VIN']);
$Make = trim($_POST['Make']);
$Model = trim($_POST['Model']);
$Price = trim($_POST['Asking_Price']);

$query = "INSERT INTO inventory (VIN, Make, Model, ASKING_PRICE) VALUES (?, ?, ?, ?)";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("sssd", $VIN, $Make, $Model, $Price);

if ($stmt->execute()) {
    header("Location: ../index.php?added=true");
    exit();
} else {
    echo "<p>Error inserting: " . $stmt->error . "</p>";
}

$stmt->close();
$mysqli->close();
?>
