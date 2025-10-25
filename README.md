# 📝 To-Do Task Web

A simple, responsive to-do list web application that allows users to add tasks, view pending tasks, and mark them as done. Built with PHP, MySQL, HTML, CSS, and JavaScript. Features a clean UI with SweetAlert2 notifications and is fully containerized using Docker.

---

## 📁 Project Structure

<ul>
  <li>todo_web/</li>
  <li>api/ # Backend API endpoints</li>
  <li>db/ # Database configuration and initialization</li>
  <li>index.html # Main frontend page</li>
  <li>style.css # Styling for the application</li>
  <li>script.js # Frontend logic and API interactions</li>
  <li>Dockerfile # Docker image configuration</li>
  <li>docker-compose.yml # Multi-container orchestration</li>
</ul>

---

## 🛠️ Setup Instructions

### 1. 🐳 Start the Application with Docker (Recommended)

Ensure **Docker** and **Docker Compose** are installed.

```bash
# Clone the project (if not already done)
git clone (https://github.com/bihesha/todo_web.git)
cd todo_web

# Start all services
docker-compose up --build
```

> The app will be available at: [http://localhost:8081](http://localhost:8081)  
> phpMyAdmin (optional DB management): [http://localhost:8080](http://localhost:8080)  
(Use username: root and password: rootpassword to log in.)
> MySQL port: `3306`

### 2. 🛑 Stop the Application

```bash
docker-compose down
```

To remove volumes (clears database):

```bash
docker-compose down -v
```

---

### 3. 🔧 Manual Setup (Without Docker)

#### Requirements:
- PHP 8.2+ with `mysqli` extension
- MySQL 8.0+
- Apache/Nginx web server

## 🚀 Features

- Add tasks with title and description
- View up to 5 pending tasks
- Mark tasks as "Done" (removes from list)
- Responsive design (mobile-friendly)
- Success/error popups using SweetAlert2
- Secure SQL with prepared statements
- Environment-based DB config
- Full Docker + phpMyAdmin support


**Enjoy managing your tasks!** 🚀