<?php
include 'config_db.php';

$mysqli->query("DELETE FROM inventory");

function randomDate($start, $end) {
    return date("Y-m-d", rand(strtotime($start), strtotime($end)));
}

$makes = ['Toyota', 'Honda', 'Ford', 'Chevy', 'Nissan'];
$models = ['Camry', 'Civic', 'F-150', 'Impala', 'Altima'];
$trims = ['LE', 'SE', 'Sport', 'LX', 'EX'];
$colors = ['Red', 'Blue', 'Black', 'White', 'Gray'];
$transmissions = ['Automatic', 'Manual'];

for ($i = 0; $i < 100; $i++) {
    $vin = strtoupper(substr(md5(uniqid()), 0, 17));
    $year = rand(2005, 2023);
    $make = $makes[array_rand($makes)];
    $model = $models[array_rand($models)];
    $trim = $trims[array_rand($trims)];
    $ext = $colors[array_rand($colors)];
    $int = $colors[array_rand($colors)];
    $ask = rand(5000, 25000);
    $sale = $ask - rand(500, 2000);
    $purchase = $sale - rand(500, 1000);
    $miles = rand(20000, 150000);
    $trans = $transmissions[array_rand($transmissions)];
    $purchase_date = randomDate('2015-01-01', '2022-12-31');
    $sale_date = randomDate('2023-01-01', '2024-12-31');

    $query = "INSERT INTO inventory 
        (VIN, YEAR, Make, Model, TRIM, EXT_COLOR, INT_COLOR, ASKING_PRICE, SALE_PRICE, PURCHASE_PRICE, MILEAGE, TRANSMISSION, PURCHASE_DATE, SALE_DATE)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sissssssddisss", $vin, $year, $make, $model, $trim, $ext, $int, $ask, $sale, $purchase, $miles, $trans, $purchase_date, $sale_date);

    if (!$stmt->execute()) {
        echo "Error inserting car $i: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

$mysqli->close();

echo "<h2>✅ 100 Cars Successfully Inserted!</h2>";
?>
