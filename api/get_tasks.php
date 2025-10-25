<?php
header('Content-Type: application/json');
include '../db/database.php';

$result = $conn->query("SELECT * FROM task WHERE status='pending' ORDER BY id ASC LIMIT 5");
$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}
echo json_encode($tasks);
