<?php
include '../database/config.php';

$id = $_POST['id'];
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];

$sql = "UPDATE supplies SET item_name='$item_name', quantity='$quantity' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
header('Location: supply.php');
?>
