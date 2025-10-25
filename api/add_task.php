<?php
header('Content-Type: application/json');
include '../db/database.php';

$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';

if ($title == '') {
    echo json_encode(['success' => false, 'error' => 'Title is required']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO task (title, description, status) VALUES (?, ?, 'pending')");
$stmt->bind_param("ss", $title, $description);
if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Database error']);
}
