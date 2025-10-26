<?php
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase {
    public function testConnectionSuccess() {
        include 'db/database.php';
        $this->assertNotNull($conn, "Connection object is null");
        $this->assertEmpty($conn->connect_error, "Database connection failed: " . $conn->connect_error);
    }
}
