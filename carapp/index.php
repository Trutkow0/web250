<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tenacious Raccoon's Used Cars</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>Tenacious Raccoon's Used Cars</h1>
    <h2>Current Inventory</h2>

    <?php
    error_reporting(E_ALL);
    ini_set('display_error', 1);

    include 'config_db.php';

    $query = "SELECT VIN, Make, Model, Asking_Price FROM inventory ORDER BY Make";
    $result = $mysqli->query($query);

    if ($result):
    ?>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Asking Price</th>
            <th>Actions</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= htmlspecialchars($row['Make']) ?></td>
            <td><?= htmlspecialchars($row['Model']) ?></td>
            <td>$<?= number_format($row['Asking_Price'], 2) ?></td>
            <td>
                <a href="index.php?edit=<?= urlencode($row['VIN']) ?>#edit-form">Edit</a> |
                <a href="components/deleteCar.php?VIN=<?= urlencode($row['VIN']) ?>" style="color:red;" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>

    <?php
    if (isset($_GET['added']) && $_GET['added'] === 'true') {
        echo '<p class="success">New car added successfully!</p>';
    }
    ?>

    <?php
    if (isset($_GET['deleted']) && $_GET['deleted'] === 'true') {
        echo '<p class="success">Car deleted successfully!</p>';
    }
    ?>

    <?php
    if (isset($_GET['updated']) && $_GET['updated'] === 'true') {
        echo '<p class="success">Car updated successfully!</p>';
    }
    ?>

    <h2>Add a New Car</h2>
    <form method="post" action="components/insertCar.php">
        <label for="VIN">VIN:</label><br>
        <input type="text" id="VIN" name="VIN" required><br><br>

        <label for="Make">Make:</label><br>
        <input type="text" id="Make" name="Make" required><br><br>

        <label for="Model">Model:</label><br>
        <input type="text" id="Model" name="Model" required><br><br>

        <label for="Asking_Price">Asking Price:</label><br>
        <input type="number" id="Asking_Price" name="Asking_Price" step="0.01" required><br><br>

        <input type="submit" value="Add Car">
    </form>

    <?php
    if (isset($_GET['edit'])) {
        $editVIN = $mysqli->real_escape_string($_GET['edit']);
        $editQuery = "SELECT * FROM inventory WHERE VIN = '$editVIN'";
        $editResult = $mysqli->query($editQuery);

        if ($editResult && $editResult->num_rows > 0) {
            $car = $editResult->fetch_assoc();
    ?>

    <h2 id="edit-form">Edit Car</h2>
    <form method="post" action="components/updateCar.php">
        <input type="hidden" name="VIN" value="<?= htmlspecialchars($car['VIN']) ?>">

        <label for="Make">Make:</label><br>
        <input type="text" id="Make" name="Make" value="<?= htmlspecialchars($car['Make']) ?>" required><br><br>

        <label for="Model">Model:</label><br>
        <input type="text" id="Model" name="Model" value="<?= htmlspecialchars($car['Model']) ?>" required><br><br>

        <label for="Asking_Price">Asking Price:</label><br>
        <input type="number" id="Asking_Price" name="Asking_Price" step="0.01" value="<?= htmlspecialchars($car['ASKING_PRICE']) ?>" required><br><br>

        <input type="submit" value="Update Car">
    </form>

    <?php
        }
    }
    ?>

    <?php else: ?>
        <p style="color: red;">Error fetching inventory: <?= $mysqli->error ?></p>
    <?php endif; ?>

    <?php $mysqli->close(); ?>
</body>
</html>
