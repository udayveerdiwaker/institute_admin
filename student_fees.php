<?php include 'connection.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="container mt-4">
        <h4><i class="bi bi-cash-coin"></i> Fees Management</h4>
        <a href="add_payment.php" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Add Payment</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Total Fee</th>
                    <th>Paid</th>
                    <th>Remaining</th>
                    <th>Last Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $result = mysqli_query($conn, "
          SELECT s.name, c.course, f.total_fee, f.paid_amount, f.remaining_amount, f.payment_date
          FROM student_fees f
          JOIN students s ON f.student_id = s.id
          JOIN courses c ON f.course_id = c.id
        ");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['course']}</td>
                    <td>₹{$row['total_fee']}</td>
                    <td>₹{$row['paid_amount']}</td>
                    <td>₹{$row['remaining_amount']}</td>
                    <td>{$row['payment_date']}</td>
                  </tr>";
        }
        ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>