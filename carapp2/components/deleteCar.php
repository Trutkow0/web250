<?php
include '../config_db.php';

if (isset($_GET['VIN'])) {
    $vin = $mysqli->real_escape_string($_GET['VIN']);

    $query = "DELETE FROM inventory WHERE VIN = '$vin'";

    if ($mysqli->query($query)) {
        header("Location: ../index.php?deleted=true");
        exit;
    } else {
        echo "<p>Error deleting car: " . $mysqli->error . "</p>";
    }
} else {
    echo "<p>No VIN provided.</p>";
}

$mysqli->close();
?>
