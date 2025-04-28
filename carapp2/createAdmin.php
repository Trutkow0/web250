<?php
include 'config_db.php';

// Create a hashed password
$hashedPassword = password_hash('password', PASSWORD_DEFAULT);

// Insert user into database
$query = "INSERT INTO users (username, password, first_name, last_name) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssss", $username, $password, $first_name, $last_name);

$username = 'admin';
$password = $hashedPassword;
$first_name = 'Timothy';
$last_name = 'Rutkowski';

if ($stmt->execute()) {
    echo "Admin user created successfully.";
} else {
    echo "Error creating user: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
