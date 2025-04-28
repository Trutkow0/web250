<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tenacious Raccoon's Used Cars 2</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config_db.php';
?>

<div style="text-align: right; margin: 15px; font-weight: bold;">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <a href="components/logout.php" style="color: #451606;">Logout</a>
    <?php else: ?>
        <a href="components/login.php" style="color: #451606;">Login</a>
    <?php endif; ?>
</div>

    <header>
        <h1>Tenacious Raccoon's Used Cars 2</h1>
    </header>

<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
<!-- Add New Car Form -->
<h2>Add a New Car</h2>
 <form method="post" action="components/insertCar.php" class="car-form">
 <div class="form-grid">
  <div class="form-column">
    <label for="VIN">VIN:</label><br>
    <input type="text" id="VIN" name="VIN" required><br><br>

    <label for="YEAR">Year:</label><br>
    <input type="number" id="YEAR" name="YEAR" required><br><br>

    <label for="Make">Make:</label><br>
    <input type="text" id="Make" name="Make" required><br><br>

    <label for="Model">Model:</label><br>
    <input type="text" id="Model" name="Model" required><br><br>
  </div>

  <div class="form-column">
    <label for="TRIM">Trim:</label><br>
    <input type="text" id="TRIM" name="TRIM"><br><br>

    <label for="EXT_COLOR">Exterior Color:</label><br>
    <input type="text" id="EXT_COLOR" name="EXT_COLOR"><br><br>

    <label for="INT_COLOR">Interior Color:</label><br>
    <input type="text" id="INT_COLOR" name="INT_COLOR"><br><br>

    <label for="ASKING_PRICE">Asking Price:</label><br>
    <input type="number" id="ASKING_PRICE" name="ASKING_PRICE" step="0.01" required><br><br>
  </div>

  <div class="form-column">
    <label for="SALE_PRICE">Sale Price:</label><br>
    <input type="number" id="SALE_PRICE" name="SALE_PRICE" step="0.01"><br><br>

    <label for="PURCHASE_PRICE">Purchase Price:</label><br>
    <input type="number" id="PURCHASE_PRICE" name="PURCHASE_PRICE" step="0.01"><br><br>

    <label for="MILEAGE">Mileage:</label><br>
    <input type="number" id="MILEAGE" name="MILEAGE"><br><br>

    <label for="TRANSMISSION">Transmission:</label><br>
    <input type="text" id="TRANSMISSION" name="TRANSMISSION"><br><br>
  </div>

  <div class="form-dates">
    <label for="PURCHASE_DATE">Purchase Date:</label><br>
    <input type="date" id="PURCHASE_DATE" name="PURCHASE_DATE"><br><br>

    <label for="SALE_DATE">Sale Date:</label><br>
    <input type="date" id="SALE_DATE" name="SALE_DATE"><br><br>

  <div class="form-submit">
    <input type="submit" value="Add Car">
  </div>
  </div>
 </div>
</form>
<?php endif; ?>

    <?php
    if (isset($_GET['edit'])) {
        $editVIN = $mysqli->real_escape_string($_GET['edit']);
        $editQuery = "SELECT * FROM inventory WHERE VIN = '$editVIN'";
        $editResult = $mysqli->query($editQuery);

        if ($editResult && $editResult->num_rows > 0) {
            $car = $editResult->fetch_assoc();
    ?>

<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
    <!-- Edit Car Form -->
    <h2 id="edit-form">Edit Car</h2>
    <form method="post" action="components/updateCar.php" class="car-form">
     <div class="form-grid">
       <div class="form-column">
	<input type="hidden" name="VIN" value="<?= htmlspecialchars($car['VIN']) ?>">

	<label for="YEAR">Year:</label>
	<input type="number" name="YEAR" id="YEAR" value="<?= htmlspecialchars($car['YEAR']) ?>" required><br><br>

	<label for="Make">Make:</label>
	<input type="text" name="Make" id="Make" value="<?= htmlspecialchars($car['Make']) ?>" required><br><br>

	<label for="Model">Model:</label>
	<input type="text" name="Model" id="Model" value="<?= htmlspecialchars($car['Model']) ?>" required><br><br>
      </div>

      <div class="form-column">
	<label for="TRIM">Trim:</label>
	<input type="text" name="TRIM" id="TRIM" value="<?= htmlspecialchars($car['TRIM']) ?>"><br><br>

	<label for="EXT_COLOR">Exterior Color:</label>
	<input type="text" name="EXT_COLOR" id="EXT_COLOR" value="<?= htmlspecialchars($car['EXT_COLOR']) ?>"><br><br>

	<label for="INT_COLOR">Interior Color:</label>
	<input type="text" name="INT_COLOR" id="INT_COLOR" value="<?= htmlspecialchars($car['INT_COLOR']) ?>"><br><br>

	<label for="ASKING_PRICE">Asking Price:</label>
	<input type="number" name="ASKING_PRICE" id="ASKING_PRICE" step="0.01" value="<?= htmlspecialchars($car['ASKING_PRICE']) ?>" required><br><br>
      </div>

      <div class="form-column">
	<label for="SALE_PRICE">Sale Price:</label>
	<input type="number" name="SALE_PRICE" id="SALE_PRICE" step="0.01" value="<?= htmlspecialchars($car['SALE_PRICE']) ?>"><br><br>

	<label for="PURCHASE_PRICE">Purchase Price:</label>
	<input type="number" name="PURCHASE_PRICE" id="PURCHASE_PRICE" step="0.01" value="<?= htmlspecialchars($car['PURCHASE_PRICE']) ?>"><br><br>

	<label for="MILEAGE">Mileage:</label>
	<input type="number" name="MILEAGE" id="MILEAGE" value="<?= htmlspecialchars($car['MILEAGE']) ?>"><br><br>

	<label for="TRANSMISSION">Transmission:</label>
	<input type="text" name="TRANSMISSION" id="TRANSMISSION" value="<?= htmlspecialchars($car['TRANSMISSION']) ?>"><br><br>
      </div>

      <div class="form-dates">
	<label for="PURCHASE_DATE">Purchase Date:</label>
	<input type="date" name="PURCHASE_DATE" id="PURCHASE_DATE" value="<?= htmlspecialchars($car['PURCHASE_DATE']) ?>"><br><br>

	<label for="SALE_DATE">Sale Date:</label>
	<input type="date" name="SALE_DATE" id="SALE_DATE" value="<?= htmlspecialchars($car['SALE_DATE']) ?>"><br><br>

      <div class="form-submit">
	<input type="submit" value="Update Car">
      </div>
      </div>
     </div>
    </form>
<?php endif; ?>


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

    <?php
        }
    }
    ?>

    <h2>Current Inventory</h2>
    <?php
    $query = "SELECT VIN, YEAR, Make, Model, TRIM, EXT_COLOR, INT_COLOR, ASKING_PRICE, SALE_PRICE, PURCHASE_PRICE, MILEAGE, TRANSMISSION, PURCHASE_DATE, SALE_DATE FROM inventory ORDER BY Make";
    $result = $mysqli->query($query);

    if ($result):
    ?>
    <table border="1" cellpadding="10" cellspacing="0">
	<tr>
    	    <th>Year</th>
    	    <th>Make</th>
    	    <th>Model</th>
    	    <th>Trim</th>
    	    <th>Ext Color</th>
    	    <th>Int Color</th>
    	    <th>Asking Price</th>
    	    <th>Sale Price</th>
    	    <th>Purchase Price</th>
    	    <th>Mileage</th>
    	    <th>Transmission</th>
    	    <th>Purchase Date</th>
    	    <th>Sale Date</th>
    	    <th>Actions</th>
	</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= !is_null($row['YEAR']) ? htmlspecialchars($row['YEAR']) : 'N/A' ?></td>
    <td><?= !is_null($row['Make']) ? htmlspecialchars($row['Make']) : 'N/A' ?></td>
    <td><?= !is_null($row['Model']) ? htmlspecialchars($row['Model']) : 'N/A' ?></td>
    <td><?= !is_null($row['TRIM']) ? htmlspecialchars($row['TRIM']) : 'N/A' ?></td>
    <td><?= !is_null($row['EXT_COLOR']) ? htmlspecialchars($row['EXT_COLOR']) : 'N/A' ?></td>
    <td><?= !is_null($row['INT_COLOR']) ? htmlspecialchars($row['INT_COLOR']) : 'N/A' ?></td>
    <td>
        <?php if (!is_null($row['ASKING_PRICE'])): ?>
            $<?= number_format($row['ASKING_PRICE'], 2) ?>
        <?php else: ?>
            N/A
        <?php endif; ?>
    </td>
    <td>
        <?php if (!is_null($row['SALE_PRICE'])): ?>
            $<?= number_format($row['SALE_PRICE'], 2) ?>
        <?php else: ?>
            N/A
        <?php endif; ?>
    </td>
    <td>
        <?php if (!is_null($row['PURCHASE_PRICE'])): ?>
            $<?= number_format($row['PURCHASE_PRICE'], 2) ?>
        <?php else: ?>
            N/A
        <?php endif; ?>
    </td>
    <td>
        <?php if (!is_null($row['MILEAGE'])): ?>
            <?= number_format($row['MILEAGE']) ?> mi
        <?php else: ?>
            N/A
        <?php endif; ?>
    </td>
    <td><?= !is_null($row['TRANSMISSION']) ? htmlspecialchars($row['TRANSMISSION']) : 'N/A' ?></td>
    <td><?= !is_null($row['PURCHASE_DATE']) ? htmlspecialchars($row['PURCHASE_DATE']) : 'N/A' ?></td>
    <td><?= !is_null($row['SALE_DATE']) ? htmlspecialchars($row['SALE_DATE']) : 'N/A' ?></td>
    <td>
        <a href="index.php?edit=<?= urlencode($row['VIN']) ?>#edit-form">Edit</a> |
        <a href="components/deleteCar.php?VIN=<?= urlencode($row['VIN']) ?>" style="color:red;" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
   </td>
</tr>
<?php endwhile; ?>
    </table>

    <?php else: ?>
        <p style="color: red;">Error fetching inventory: <?= $mysqli->error ?></p>
    <?php endif; ?>

    <?php $mysqli->close(); ?>
</body>
</html>
