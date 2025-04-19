<html>
<head>
<title>Sam's Used Cars</title>
</head>

<body>

<h1>Sam's Used Cars</h1>
<?php 
include 'db.php';

$vin = $_GET['VIN'];

$query = "DELETE FROM inventory WHERE VIN='$vin'";

/* Try to query the database */
if ($result = $mysqli->query($query)) {
    echo "<p>The vehicle with VIN $vin has been deleted</p>";
} else {
    echo "<p>Sorry, a vehicle with VIN of $vin cannot be found " . $mysqli->error . "</p>";
}

$mysqli->close();
include('footer.php');
?>

</body>

</html>
