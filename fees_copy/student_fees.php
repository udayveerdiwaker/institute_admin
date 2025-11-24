<?php
include 'connection.php';
include 'sidebar.php';

// Fetch all fees records with student + course
$query = mysqli_query(
    $conn,
    "SELECT sf.*, s.student_name, c.course 
     FROM student_fees sf
     LEFT JOIN students s ON sf.student_id = s.id
     LEFT JOIN courses c ON sf.course_id = c.id
     ORDER BY sf.id DESC"
);
?>

<div class="main-content">
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3><i class="bi bi-cash-coin"></i> Student Fees</h3>

            <a href="add_fees.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Fees
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Total Fee (₹)</th>
                            <th>Paid (₹)</th>
                            <th>Remaining (₹)</th>
                            <th>Mode</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (mysqli_num_rows($query) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                                <tr class="text-center">
                                    <td><?= $i++; ?></td>
                                    <td><?= htmlspecialchars($row['student_name']); ?></td>
                                    <td><?= htmlspecialchars($row['course']); ?></td>
                                    <td>₹<?= $row['total_fee']; ?></td>
                                    <td>₹<?= $row['paid_amount']; ?></td>
                                    <td>₹<?= $row['remaining']; ?></td>
                                    <td><?= htmlspecialchars($row['payment_mode']); ?></td>
                                    <td><?= $row['created_at']; ?></td>

                                    <td>
                                        <a href="view_fees_details.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="edit_fees.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- <a href="delete_fees.php?id=<?= $row['id']; ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this record?');">
                                            <i class="bi bi-trash"></i>
                                        </a> -->
                                        <a href="fees_receipt.php?id=<?= $row['id']; ?>"
                                            class="btn btn-sm btn-success" target="_blank">
                                            <i class="bi bi-receipt"></i>
                                        </a>
                                        <a href="fees_receipt_pdf.php?id=<?= $row['id']; ?>"
                                            class="btn btn-sm btn-danger" target="_blank">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </a>

                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='9' class='text-center text-danger'>No Records Found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>