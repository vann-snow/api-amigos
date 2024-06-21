<?php
include ('../database/config.php');

// Updated SQL query with correct column names and join conditions
$sql = "SELECT r.id, r.username, r.item, r.quantity, r.status, r.timestamp
        FROM requests r
        WHERE r.status = 'pending'
        ORDER BY r.timestamp DESC";

$result = $conn->query($sql);

$notifications = array();
while($row = $result->fetch_assoc()) {
    $notifications[] = array(
        'id' => $row['id'],
        'item' => $row['item'],
        'quantity' => $row['quantity'],
        'user' => $row['username'],
        'date' => $row['timestamp']
    );
}

$response = array('notifications' => $notifications);
echo json_encode($response);

$conn->close();
?>