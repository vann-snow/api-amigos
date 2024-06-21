<?php
require_once('../database/config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'] ?? 'guest';
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO requests (username, item, quantity, status) VALUES (?, ?, ?, 'pending')");
    $stmt->bind_param('ssi', $username, $item, $quantity);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Request submitted successfully']);
    } else {
        echo json_encode(['error' => 'Database error']);
    }

    $stmt->close();
    $conn->close();
}
?>