<?php 
session_start();

if (!isset($_SESSION['admin_logged'])) {
    header("Location: login.php");
    exit;
}
// dashboard.php - full UI + PHP + Charts (monthly & yearly)
// Turn on errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connection.php'; 
 include 'sidebar.php';
?>


<style>
body {
    background-color: #f4f6f9;
    font-family: 'Segoe UI', sans-serif;
}

.wrapper {
    display: flex;
    flex-wrap: nowrap;
    height: 100vh;
    overflow: hidden;
}


.content {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
}

table {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

th {
    background: #212529 !important;
    color: #fff !important;
}

.toggle-btn {
    display: none;
    background: #212529;
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 20px;
    cursor: pointer;
}

@media (max-width: 768px) {
    .sidebar {
        position: fixed;
        left: -250px;
        top: 0;
        height: 100%;
        z-index: 1000;
    }

    .sidebar.show {
        left: 0;
    }

    .toggle-btn {
        display: block;
        position: fixed;
        top: 10px;
        left: 10px;
        z-index: 1100;
    }

    .content {
        padding-top: 60px;
    }
}
</style>
</head>

<body>
    <!-- <button class="togglse-btn" onclick="toggleSidebar()"><i class="bi bi-list"></i></button> -->

    <div class="main-content">
        <!-- Sidebar include -->

        <!-- Main Content -->
        <div class="content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Course List</h3>
                <a href="course_add.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Course</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Course</th>
                            <th>Duration</th>
                            <th>Fees (₹)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
          $sql = "SELECT * FROM courses ORDER BY id DESC";
          $result = mysqli_query($conn, $sql);

          $cnt = 1;
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "
              <tr>
                <td>{$cnt}</td>
                <td>{$row['course']}</td>
                <td>{$row['duration']}</td>
                <td>{$row['fees']}</td>
                 <td>
                  <a href='course_edit.php?id={$row['id']}' class='btn btn-sm btn-warning'><i class='bi bi-pencil-square'></i></a>
                  <a href='course_delete.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Delete this course?\")'><i class='bi bi-trash'></i></a>
                </td>
       
             
              </tr>";
              $cnt++;
            }
          } else {
            echo "<tr><td colspan='6'>No courses found</td></tr>";
          }
          ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <?php 
include 'footer.php';
?>