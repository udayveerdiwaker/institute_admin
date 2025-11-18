<?php
include 'connection.php';
include 'sidebar.php';
?>

<div class="main-content">
  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3><i class="bi bi-cash-coin"></i> Fees / Students</h3>
      <a href="add_fees.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Payment</a>
    </div>

    <div class="card shadow-sm">
      <div class="card-body table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-dark text-center">
            <tr>
              <th>#</th>
              <th>Student</th>
              <th>Course</th>
              <th>Total Fee (₹)</th>
              <th>Paid (₹)</th>
              <th>Remaining (₹)</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            $i = 1;
            // get students with course
            $q = mysqli_query($conn,
              "SELECT s.id AS student_id, s.student_name, c.course, c.fees AS course_fee
               FROM students s
               LEFT JOIN courses c ON s.course_id = c.id
               ORDER BY s.id DESC"
            );
            while ($row = mysqli_fetch_assoc($q)) {
                $student_id = $row['student_id'];
                $total_fee = (float)$row['course_fee'];

                // sum all payments for this student
                $sumQ = mysqli_query($conn, "SELECT SUM(paid_amount) AS total_paid FROM student_fees WHERE student_id = $student_id");
                $sumR = mysqli_fetch_assoc($sumQ);
                $paid = (float)($sumR['total_paid'] ?? 0);
                $remaining = $total_fee - $paid;
                echo "<tr>
                        <td>{$i}</td>
                        <td>".htmlspecialchars($row['student_name'])."</td>
                        <td>".htmlspecialchars($row['course'])."</td>
                        <td>₹".number_format($total_fee,2)."</td>
                        <td>₹".number_format($paid,2)."</td>
                        <td>₹".number_format($remaining,2)."</td>
                        <td>
                          <a href='view_fees.php?student_id={$student_id}' class='btn btn-sm btn-info'> <i class='bi bi-eye'></i></a>
                          <a href='remaining.php?student_id={$student_id}' class='btn btn-sm btn-primary'>Add Payment</a>
                   
                        </td>
                      </tr>";
                $i++;
            }
            if ($i === 1) {
                echo "<tr><td colspan='7'>No students found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
