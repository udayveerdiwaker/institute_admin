<?php
include 'connection.php';
include 'sidebar.php';

$id = (int)($_GET['id'] ?? 0);

$sql = "SELECT * FROM courses WHERE id=$id";
$res = mysqli_query($conn,$sql);
$course = mysqli_fetch_assoc($res);

if(!$course){
    echo "<div class='container mt-5 alert alert-danger'>Course not found</div>";
    exit;
}
?>

<div class="main-content">
    <div class="container mt-4">

        <h4 class="mb-3">Course Details</h4>

        <div class="card shadow p-4">
            <table class="table table-bordered">
                <tr>
                    <th>Course Name</th>
                    <td><?= htmlspecialchars($course['course']) ?></td>
                </tr>
                <tr>
                    <th>Total Fees</th>
                    <td>₹<?= number_format($course['fees'],2) ?></td>
                </tr>
                <tr>
                    <th>Monthly Fee</th>
                    <td>₹<?= number_format($course['monthly_fee'],2) ?></td>
                </tr>
                <tr>
                    <th>Course Details</th>
                    <td><?= nl2br(htmlspecialchars($course['course_details'])) ?></td>
                </tr>
            </table>

            <a href="course_list.php" class="btn btn-secondary mt-3">
                <i class="bi bi-arrow-left"></i> Back
            </a>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>