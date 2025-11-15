<?php
include 'connection.php';

include 'sidebar.php';
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>All Students</h3>
            <a href="new_registration.php" class="btn btn-success"><i class="bi bi-person-plus"></i> New
                Registration</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Phone</th>
                        <th>Admission Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
          $sql = "SELECT s.*, c.course AS course_name FROM students s LEFT JOIN courses c ON s.course_id = c.id ORDER BY s.id DESC";
          $res = mysqli_query($conn, $sql);
          if ($res && mysqli_num_rows($res) > 0) {
            while ($r = mysqli_fetch_assoc($res)) {
              $photo = !empty($r['photo']) ? $r['photo'] : 'student_img/default.png';
              echo "<tr>
                      <td>{$r['id']}</td>
                      <td><img src='{$photo}' style='width:48px;height:48px;object-fit:cover;border-radius:6px'></td>
                      <td>{$r['student_name']}</td>
                      <td>{$r['course_name']}</td>
                      <td>{$r['phone']}</td>
                      <td>{$r['admission_date']}</td>
                      <td>
                        <a href='student_view.php?id={$r['id']}' class='btn btn-sm btn-info'>View</a>
                        <a href='student_edit.php?id={$r['id']}' class='btn btn-sm btn-warning'>Edit</a>
                        <a href='student_delete.php?id={$r['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Delete this student?')\">Delete</a>
                      </td>
                    </tr>";
            }
          } else {
            echo "<tr><td colspan='7' class='text-center'>No students found</td></tr>";
          }
          ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>