<?php
include 'connection.php';
include 'sidebar.php';

// Fetch exams
$sql = "SELECT * FROM exams ORDER BY id DESC";
$res = mysqli_query($conn, $sql);
?>

<div class="main-content">
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold">Exams List</h3>
            <a href="add_exam.php" class="btn btn-primary btn-sm">+ Add New Exam</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Exam Title</th>
                                <th>Total Marks</th>
                                <th>Passing</th>
                                <th>Duration (min)</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($res && mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo htmlspecialchars($row['title']) ?></td>
                                <td><?php echo $row['total_marks'] ?></td>
                                <td><?php echo $row['passing_marks'] ?></td>
                                <td><?php echo $row['duration_minutes'] ?> min</td>
                                <td>
                                    <?php if ($row['status'] == 'active'): ?>
                                    <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                    <span class="badge bg-secondary">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <a href="edit_exam.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <a href="view_result.php?attempt_id=<?php echo $row['id'] ?>"
                                        class="btn btn-info btn-sm">
                                        View Results
                                    </a>
                                    <a href="manage_question.php?exam_id=<?php echo $row['id']; ?>"
                                        class='btn btn-sm btn-info'>Questions</a>
                                    <a href="take_exam.php?exam_id=<?php echo $row['id']; ?>"
                                        class='btn btn-sm btn-success'>Take</a>
                                    <a href="delete_exam.php?id=<?php echo $row['id'] ?>"
                                        onclick="return confirm('Are you sure to delete this exam?')"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='8' class='text-center'>No exams found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>