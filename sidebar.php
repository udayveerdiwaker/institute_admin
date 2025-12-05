<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Institute Admin Panel</title>

    <!-- Bootstrap 5 -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Bootstrap Icons -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css' rel='stylesheet'>

    <link rel='stylesheet' href='assets/style.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'>

    <style>
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Header */
    header {
        background: #343a40;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 20px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    header h5 {
        margin: 0;
        font-size: 18px;
    }

    .menu-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background: #343a40;
        color: white;
        position: fixed;
        top: 45px;
        /* height of header */
        left: 0;
        height: 100%;
        overflow-y: auto;
        transition: left 0.3s ease;
        z-index: 999;
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

    /* Main content area */
    .main-content {
        margin-left: 250px;
        margin-top: 60px;
        padding: 20px;
        transition: margin-left 0.3s ease;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .menu-toggle {
            display: block;
        }

        .sidebar {
            top: 50px;

            left: -260px;
        }

        .sidebar.show {
            left: 0;
        }

        .main-content {
            margin-left: 0;
        }
    }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <button class='menu-toggle' onclick='toggleSidebar()'><i class='bi bi-list'></i></button>
        <h5>Admin Panel</h5>
        <!-- <div class = 'd-flex align-items-center'>
<i class = 'bi bi-person-circle me-2'></i> Admin
</div> -->
    </header>

    <!-- Sidebar -->
    <div class='sidebar' id='sidebar'>
        <!-- <h4>Menu</h4> -->
        <a href='dashboard.php' class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
            <i class='bi bi-speedometer2 me-2'></i> Dashboard
        </a>
        <a href='course_list.php'
            class="<?php echo basename($_SERVER['PHP_SELF']) == 'course_list.php' ? 'active' : '' ?>">
            <i class='bi bi-journal-bookmark me-2'></i> Course List
        </a>
        <a href='fees_list.php' class="<?php echo basename($_SERVER['PHP_SELF']) == 'fees_list.php' ? 'active' : '' ?>">
            <i class='bi bi-cash-stack me-2'></i> Fees Student
        </a>

        <a href='   all_students.php'
            class="<?php echo basename($_SERVER['PHP_SELF']) == 'all_students.php' ? 'active' : '' ?>">
            <i class='bi bi-person-lines-fill me-2'></i> All Students
        </a>

        <a href='list_guest.php'
            class="<?php echo basename($_SERVER['PHP_SELF']) == 'list_guest.php' ? 'active' : '' ?>">
            <i class='bi bi-person-lines-fill me-2'></i> Guest Entries
        </a>

        <a href='list_exam.php' class="<?php echo basename($_SERVER['PHP_SELF']) == 'list_exam.php' ? 'active' : '' ?>">
            <i class='bi bi-person-lines-fill me-2'></i> List Exam
        </a>

        <!-- <a href = '#'><i class = 'bi bi-gear me-2'></i> Settings</a> -->
        <a href='logout.php'><i class='bi bi-box-arrow-right me-2'></i> Logout</a>
    </div>

    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('show');
    }
    </script>
</body>

</html>