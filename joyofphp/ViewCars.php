<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sam's Used Cars</title>
   </head>
<body>
<h1>Sam's Used Cars</h1>
<h3>Complete Inventory</h3>
 <?php
include ('db.php');

$query = "SELECT * FROM inventory ORDER BY Make";
/* Try to insert the new car into the database */
if ($result = $mysqli->query($query)) {
    echo "<table id='Grid'>";
    echo "<tr> <th style='width: 50px;'>Make</th> <th style='width: 50px;'>Model</th> <th style='width: 50px;'>Asking Price</th> </tr>";

    $class ="odd";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr class='$class'>";
        echo "<td>" . htmlspecialchars($row['Make']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Model']) . "</td>";
        echo "<td>" . htmlspecialchars($row['ASKING_PRICE']) . "</td>";
        echo "</tr>";

        $class = ($class === "odd") ? "even" : "odd";
    }

    echo "</table>";
} else {
    echo "Error getting cars from the database: " . $mysqli->error . "<br>";
}

$mysqli->close();
?>
</body>
</html>
