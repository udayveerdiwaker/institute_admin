<?php include 'connection.php'; ?>

<?php include 'sidebar.php'; ?>

<div class="main-content">

    <div class="container mt-4">
        <h3 class="mb-4">All Students</h3>
        <a href="add_student.php" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Add Student</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Duration</th>
                    <th>Fees</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT students.*, courses.course AS course_name 
                                           FROM students 
                                           LEFT JOIN courses ON students.course = courses.id");

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['course_name']; ?></td>
                        <td><?= $row['duration']; ?></td>
                        <td><?= $row['fees']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td>
                            <a href="edit_student.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">
                                Edit
                            </a>

                            <a href="delete_student.php?id=<?= $row['id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>