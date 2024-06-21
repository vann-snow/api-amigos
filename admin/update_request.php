<?php
require_once('../database/config.php');

header('Content-Type: application/json');

$response = ['message' => 'Invalid request'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = intval($_POST['request_id']);
    $action = $_POST['action'];

    // Define valid actions and corresponding statuses
    $valid_actions = [
        'approve' => 'confirm',
        'reject' => 'cancelled'
    ];

    if (array_key_exists($action, $valid_actions)) {
        $new_status = $valid_actions[$action];
        $sql = "UPDATE requests SET status = ? WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('si', $new_status, $request_id);
            if ($stmt->execute()) {
                $response['message'] = ucfirst($action) . ' successful';
            } else {
                $response['message'] = ucfirst($action) . ' failed';
            }
            $stmt->close();
        } else {
            $response['message'] = 'Error preparing the query';
        }
    } else {
        $response['message'] = 'Invalid action';
    }
}

echo json_encode($response);
$conn->close();
?>