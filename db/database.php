<?php
// db/database.php - reads environment variables with sensible defaults
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$db   = getenv('DB_NAME') ?: 'todo_web';
$port = getenv('DB_PORT') ?: 3306; // optional

// If DB_HOST includes a port e.g. 'db:3306' you can parse it, but default above works.
$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    // For development show JSON error so frontend fetch() won't break silently
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}
?>
