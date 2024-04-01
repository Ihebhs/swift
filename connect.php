<?php
// Database connection config
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'db_event_management';

// Create connection
$dbConn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($dbConn->connect_error) {
    die("Connection failed: " . $dbConn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($dbConn, $_POST['name']);
    $address = mysqli_real_escape_string($dbConn, $_POST['address']);
    $rdate = mysqli_real_escape_string($dbConn, $_POST['rdate']);
    $rtime = mysqli_real_escape_string($dbConn, $_POST['rtime']);
    $phone = mysqli_real_escape_string($dbConn, $_POST['phone']);
    $email = mysqli_real_escape_string($dbConn, $_POST['email']);
    $type = mysqli_real_escape_string($dbConn, $_POST['type']);
    $ucount = mysqli_real_escape_string($dbConn, $_POST['ucount']);

    $sql = "INSERT INTO tbl_users (name, address, rdate, rtime, phone, email, type, ucount)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbConn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $address, $rdate, $rtime, $phone, $email, $type, $ucount);
    $stmt->execute();

    echo "New record created successfully";
    header("location:http://localhost/site/payment.html");

    $stmt->close();
}

$dbConn->close();
?>

