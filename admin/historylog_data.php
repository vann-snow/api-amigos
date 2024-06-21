<?php
require_once('../database/config.php');

header('Content-Type: application/json');

// Fetch all request logs
$sql = "SELECT r.id AS request_id, r.username, r.item, r.quantity, r.status, r.timestamp AS request_date
        FROM requests r
        ORDER BY r.timestamp DESC";

$result = $conn->query($sql);

$historylogs = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $historylogs[] = [
            'request_id' => $row['request_id'],
            'username' => $row['username'],
            'item' => $row['item'],
            'quantity' => $row['quantity'],
            'status' => $row['status'],
            'request_date' => $row['request_date']
        ];
    }
}

$response = ['historylogs' => $historylogs];
echo json_encode($response);

$conn->close();
?>