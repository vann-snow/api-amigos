<?php
include '../database/config.php';

$id = $_GET['id'];

$sql = "DELETE FROM supplies WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header('Location: supply.php');
?>
