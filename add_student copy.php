<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student | Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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

        .sidebar {
            width: 250px;
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

        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
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
    <button class="toggle-btn" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>

    <div class="wrapper">
        <?php include 'sidebar.php'; ?>

        <div class="content">
            <div class="card p-4 shadow-sm">
                <h4 class="mb-3"><i class="bi bi-person-plus"></i> Add New Student</h4>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Course</label>
                        <input type="text" name="course" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fee (₹)</label>
                        <input type="number" name="fee" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Add
                        Student</button>
                    <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $course = $_POST['course'];
        $fee = $_POST['fee'];
        $date = $_POST['date'];

        $sql = "INSERT INTO students (name, course, fee, date) VALUES ('$name', '$course', '$fee', '$date')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Student added successfully'); window.location='index.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
</body>

</html>