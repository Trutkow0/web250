<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sam's Used Cars - Image Upload</title>
</head>
<body background="bg.jpg">
<h1>Sam's Used Cars</h1>
<h3>Add Image</h3>

<?php
include 'db.php';

$vin = mysqli_real_escape_string($mysqli, $_GET['VIN']);

$query = "SELECT * FROM INVENTORY WHERE VIN='$vin'";
$result = $mysqli->query($query);

// Loop through all the rows returned by the query, creating a table row for each
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $year = htmlspecialchars($row['YEAR']);
        $make = htmlspecialchars($row['Make']);
        $model = htmlspecialchars($row['Model']);
        $trim = htmlspecialchars($row['TRIM']);
        $color = htmlspecialchars($row['EXT_COLOR']);
        $interior = htmlspecialchars($row['INT_COLOR']);
        $mileage = htmlspecialchars($row['MILEAGE']);
        $transmission = htmlspecialchars($row['TRANSMISSION']);
        $price = htmlspecialchars($row['ASKING_PRICE']);

	echo "<p>$exterior $year $make $model<br>VIN: $vin</p>";
        echo "<p>Asking Price: $" . number_format($price, 0) . "</p>";
    }
} else {
    echo "Sorry, a vehicle with VIN of $vin cannot be found. " . $mysqli->error . "</br>";
}
?>

<!-- Upload Form -->
<form action="upload_file.php" method="post" enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file" id="file"><br>
    <input name="VIN" type="hidden" value= "<?php echo "$vin" ?>" />
    <input type="submit" name="submit" value="Submit">
</form>

<br/><br/>

<?php
// Display previously uploaded images
$query = "SELECT * FROM images WHERE VIN='$vin'";
$result = $mysqli->query($query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $image = htmlspecialchars($row['ImageFile']);
        echo "<img src='uploads/$image' width='250' alt='Image for VIN $vin'>  " ;
    }
}

$mysqli->close();
include 'footer.php';
?>

</body>

</html>
