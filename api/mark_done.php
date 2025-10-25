<?php
include '../db/database.php';
$id = $_POST['id'] ?? 0;

$stmt = $conn->prepare("UPDATE task SET status='done' WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

echo json_encode(["success" => true]);
?>
