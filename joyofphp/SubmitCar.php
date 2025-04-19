<!DOCTYPE html>
<html>
<head>
    <title>Car Saved</title>
    <meta charset="UTF-8">
    <style>
	body {
	    background-color: #FFFFFF;
	    color: #000000;
	}
    </style>
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
// Include DB connection
include 'db.php';

// Capture the values posted to this php program from the text fields
$VIN =  trim($_REQUEST['VIN']);
$Make = trim($_REQUEST['Make']);
$Model = trim($_REQUEST['Model']);
$Price = trim($_REQUEST['Asking_Price']);

// Build SQL Query
$query = "INSERT INTO inventory
  (VIN, Make, Model, Asking_Price)
   VALUES (
   '$VIN',
   '$Make',
   '$Model',
   '$Price'
    )";

// Run query and provide feedback
if ($mysqli->query($query) === TRUE) {
    echo "<p>You have successfully entered $Make $Model into the database.</p>";
} else {
    echo "<p>Error entering $VIN into database: " . $mysqli->error . "</p>";
}

// Close connection
$mysqli->close();
include ('footer.php');
?>
</body>
</html>
