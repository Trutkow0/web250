<html>
<head>
<title>Car Saved</title>
</head>
<body bgcolor="#FFFFFF" text="#000000" >

<?php
// Capture the values posted to this php program from the text fields in the form

$VIN = $_REQUEST['VIN'];
$Make = $_REQUEST['Make'];
$Model = $_REQUEST['Model'];
$Price = $_REQUEST['Asking_Price'];

//Build a SQL Query using the values from above

$query = "UPDATE inventory SET
    Make = '$Make',
    Model = '$Model',
    ASKING_PRICE = '$Price'
    WHERE VIN = '$VIN'";

// Print the query to the browser so you can see it
// echo ($query . "<br>");

// Connect to DB
include 'db.php';

/* check connection */
if ($mysqli->connect_errno) {
    echo ("Connection failed: " . $mysqli->error . "<br>");
    exit();
}

 echo 'Connected successfully to mySQL. <br>';

// Run query
if ($result = $mysqli->query($query)) {
    echo "<p>You have successfully entered $Make $Model into the database.</p>";
} else {
    echo "Error updating $VIN into database: " . $mysql->error . "</p>";
}

$mysqli->close();
?>

<p><a href="ViewCarsWithStyle2.php">View Cars with Edit Links</a></p>
</body>
</html>
