<?php
use PHPUnit\Framework\TestCase;

class MarkDoneTest extends TestCase {
    public function testMarkDone() {
        $_POST = ['id' => 1];
        ob_start();
        include 'api/mark_done.php';
        $response = json_decode(ob_get_clean(), true);
        $this->assertTrue($response['success']);
    }
}
