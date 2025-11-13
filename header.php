<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institute Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: #343a40;
        color: white;
        transition: all 0.3s ease;
    }

    .sidebar h4 {
        padding: 20px;
        background: #212529;
        text-align: center;
        margin: 0;
    }

    .sidebar a {
        display: block;
        color: #ddd;
        text-decoration: none;
        padding: 12px 20px;
        transition: background 0.2s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background: #495057;
        color: #fff;
    }

    /* Header / Topbar */
    .topbar {
        background-color: #343a40;
        color: white;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        position: fixed;
        top: 0;
        left: 250px;
        right: 0;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .toggle-btn {
        font-size: 22px;
        cursor: pointer;
    }

    .sidebar.collapsed {
        width: 0;
        overflow: hidden;
    }

    .topbar.expanded {
        left: 0;
    }

    /* Main content */
    .main-content {
        margin-left: 250px;
        margin-top: 60px;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .collapsed+.main-content {
        margin-left: 0;
    }

    @media (max-width: 768px) {
        .sidebar {
            left: -250px;
            position: fixed;
        }

        .sidebar.active {
            left: 0;
        }

        .topbar {
            left: 0;
        }

        .main-content {
            margin-left: 0;
        }
    }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h4>🎓 Admin Panel</h4>
        <a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
        <a href="add_course.php" class="<?= basename($_SERVER['PHP_SELF']) == 'add_course.php' ? 'active' : '' ?>">
            <i class="bi bi-journal-bookmark me-2"></i> Add Course
        </a>
    </div>

    <!-- Header / Topbar -->
    <div class="topbar" id="topbar">
        <i class="bi bi-list toggle-btn" id="toggleSidebar"></i>
        <span>Institute Admin Panel</span>
        <div>
            <i class="bi bi-person-circle me-2"></i> Admin
        </div>
    </div>

    <script>
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    toggleSidebar.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
    </script>