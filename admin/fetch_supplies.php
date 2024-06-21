<?php
require_once('../database/config.php');

$query = "SELECT id, item_name, quantity FROM supplies ORDER BY id DESC";
$result = $conn->query($query);

$supplies = [];
while ($row = $result->fetch_assoc()) {
    $supplies[] = $row;
}

foreach ($supplies as $supply) {
    echo "<tr>";
    echo "<td class='py-4 px-6 border-b text-center'>" . htmlspecialchars($supply["id"]) . "</td>";
    echo "<td class='py-4 px-6 border-b text-left'>" . htmlspecialchars($supply["item_name"]) . "</td>";
    echo "<td class='py-4 px-6 border-b text-center'>" . htmlspecialchars($supply["quantity"]) . "</td>";
    echo "<td class='py-4 px-6 border-b text-left'>";
    echo "<button class='bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600' onclick='requestItem(" . $supply["id"] . ", \"" . addslashes($supply["item_name"]) . "\", " . $supply["quantity"] . ")'>Request</button>";
    echo "</td>";
    echo "</tr>";
}

$conn->close();
?>