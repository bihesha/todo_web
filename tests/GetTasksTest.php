<?php
use PHPUnit\Framework\TestCase;

class GetTasksTest extends TestCase {
    public function testFetchPendingTasks() {
        ob_start();
        include 'api/get_tasks.php';
        $response = json_decode(ob_get_clean(), true);
        $this->assertIsArray($response);
        foreach ($response as $task) {
            $this->assertEquals('pending', $task['status']);
        }
    }
}
