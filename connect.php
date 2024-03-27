<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$number = $_POST['number'];
$date = $_POST['date'];
$time = $_POST['time'];
$members = $_POST['members'];

// Data connection
$conn = new mysqli('localhost', 'root', '', 'swift_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO swift (firstName, lastName, email, number, date, time, members) VALUES (?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("sssssss", $firstName, $lastName, $email, $number, $date, $time, $members);
if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
}

echo "Registration successful.";

// Close statement and connection
$stmt->close();
$conn->close();
?>
