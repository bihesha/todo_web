/**
 * @jest-environment jsdom
 */
const { jest } = require('@jest/globals');
require('../script.js');  // load your script

// Mock fetch
global.fetch = jest.fn();

// Set up DOM
document.body.innerHTML = `
  <div id="taskList"></div>
  <form id="taskForm">
    <input id="title" value="Test Task" />
    <textarea id="description">Test Description</textarea>
    <button type="submit">Add</button>
  </form>
`;

test('fetchTasks populates task list', async () => {
  const mockTasks = [
    { id: 1, title: 'Task 1', description: 'Desc', status: 'pending' }
  ];
  fetch.mockResolvedValueOnce({
    ok: true,
    json: async () => mockTasks
  });

  // Call your function from script.js
  await fetchTasks();

  const taskList = document.getElementById('taskList');
  expect(taskList.innerHTML).toContain('Task 1');
});

test('add task sends POST request', async () => {
  fetch.mockResolvedValueOnce({
    json: async () => ({ success: true })
  });

  const form = document.getElementById('taskForm');
  const event = new Event('submit');
  form.dispatchEvent(event);

  expect(fetch).toHaveBeenCalledWith(expect.stringContaining('add_task.php'), expect.any(Object));
});
