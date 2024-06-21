<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include '../database/config.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'unknown']);
    exit();
}

$username = $_SESSION['username'];

// Prepare and execute SQL query
$query = "SELECT status FROM requests WHERE username = ? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'unknown']);
    exit();
}

$stmt->bind_param('s', $username);
$stmt->execute();
$status = null;
$stmt->bind_result($status);
$stmt->fetch();
$stmt->close();

// Check for JSON encoding errors
$response = ['status' => $status ? $status : 'pending'];
$json = json_encode($response);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'JSON encoding error: ' . json_last_error_msg();
    exit();
}

header('Content-Type: application/json');
echo $json;
?>