// Fetch tasks from backend
async function fetchTasks() {
    try {
        const res = await fetch('api/get_tasks.php');
        if (!res.ok) throw new Error('Network response not ok');

        const tasks = await res.json(); // make sure PHP returns JSON
        const list = document.getElementById('taskList');
        list.innerHTML = '';

        tasks.forEach(task => {
            const div = document.createElement('div');
            div.className = 'task';
            div.innerHTML = `
                <h3>${task.title}</h3>
                <p>${task.description}</p>
                <button onclick="markDone(${task.id})">Done</button>
            `;
            list.appendChild(div);
        });
    } catch (err) {
        console.error('Error fetching tasks:', err);
    }
}

// Add task via backend
document.getElementById('taskForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;

    const formData = new FormData();
    formData.append('title', title);
    formData.append('description', description);

    try {
        const res = await fetch('api/add_task.php', { method: 'POST', body: formData });
        const data = await res.json();

        if (data.success) {
            // Clear form
            this.reset();

            // Show SweetAlert2 popup
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Task added successfully!',
                timer: 2000,
                showConfirmButton: false
            });

            // Reload tasks from backend
            fetchTasks();
        } else {
            Swal.fire('Error', data.error || 'Failed to add task', 'error');
        }
    } catch (err) {
        console.error('Error adding task:', err);
        Swal.fire('Error', 'Something went wrong', 'error');
    }
});

// Mark task as done
async function markDone(id) {
    const formData = new FormData();
    formData.append('id', id);

    try {
        await fetch('api/mark_done.php', { method: 'POST', body: formData });
        fetchTasks();
    } catch (err) {
        console.error('Error marking done:', err);
    }
}

// Initial fetch
fetchTasks();
