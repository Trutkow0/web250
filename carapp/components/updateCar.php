<?php
include '../config_db.php';

$VIN   = trim($_POST['VIN']);
$Make  = trim($_POST['Make']);
$Model = trim($_POST['Model']);
$Price = trim($_POST['Asking_Price']);

$query = "UPDATE inventory SET 
    Make = ?, 
    Model = ?, 
    ASKING_PRICE = ? 
    WHERE VIN = ?";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssds", $Make, $Model, $Price, $VIN);

if ($stmt->execute()) {
    header("Location: ../index.php?updated=true");
    exit;
} else {
    echo "<p>Error updating car: " . $stmt->error . "</p>";
}

$stmt->close();
$mysqli->close();
?>
