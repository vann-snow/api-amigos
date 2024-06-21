<?php
require_once('../database/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemName = $_POST['item_name'];
    $quantity = $_POST['quantity'];

    // Prepare SQL to prevent SQL injection
    $sql = "INSERT INTO supplies (item_name, quantity) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $itemName, $quantity);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Supply added successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding supply.']);
    }

    $stmt->close();
    $conn->close();
}