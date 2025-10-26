<?php
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class IntegrationTest extends TestCase {
    private $client;

    protected function setUp(): void {
        $this->client = new Client(['base_uri' => 'http://localhost:8081/todo_web/api/']);
    }

    public function testAddAndFetchTasksFlow() {
        // 1. Add a task
        $response = $this->client->post('add_task.php', [
            'form_params' => [
                'title' => 'Integration Task',
                'description' => 'From test'
            ]
        ]);
        $data = json_decode($response->getBody(), true);
        $this->assertTrue($data['success']);

        // 2. Fetch tasks
        $response = $this->client->get('get_tasks.php');
        $tasks = json_decode($response->getBody(), true);
        $this->assertIsArray($tasks);

        // 3. Mark first task done
        $taskId = $tasks[0]['id'] ?? null;
        if ($taskId) {
            $response = $this->client->post('mark_done.php', ['form_params' => ['id' => $taskId]]);
            $result = json_decode($response->getBody(), true);
            $this->assertTrue($result['success']);
        }
    }
}
