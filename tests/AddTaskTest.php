<?php
use PHPUnit\Framework\TestCase;

class AddTaskTest extends TestCase {
    public function testTitleRequired() {
        $_POST = ['title' => '', 'description' => 'test desc'];
        ob_start();
        include 'api/add_task.php';
        $response = json_decode(ob_get_clean(), true);
        $this->assertFalse($response['success']);
        $this->assertEquals('Title is required', $response['error']);
    }

    public function testValidInsert() {
        $_POST = ['title' => 'Test Task', 'description' => 'Test Description'];
        ob_start();
        include 'api/add_task.php';
        $response = json_decode(ob_get_clean(), true);
        $this->assertTrue($response['success']);
    }
}
