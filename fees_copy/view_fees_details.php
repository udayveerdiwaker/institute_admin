<?php
include 'connection.php';
include 'sidebar.php';

// FIX : redirect to fees list page instead of same page
if (!isset($_GET['id'])) {
    header('Location: student_fees.php');

    echo "<div class='main-content container mt-4'>
            <div class='alert alert-danger'>Invalid Request: No Payment ID Found.</div>
          </div>";
    include 'footer.php';
    exit;
}

$id = (int) $_GET['id'];

$q = mysqli_query(
    $conn,
    "SELECT sf.*, s.student_name, c.course
     FROM student_fees sf
     LEFT JOIN students s ON sf.student_id = s.id
     LEFT JOIN courses c ON sf.course_id = c.id
     WHERE sf.id = $id"
);

if (!$q || mysqli_num_rows($q) == 0) {
    echo "<div class='main-content container mt-4'>Record not found.</div>";
    include 'footer.php';
    exit;
}

$r = mysqli_fetch_assoc($q);
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="card p-4 shadow-sm">
            <h4 class="mb-3"><i class="bi bi-eye"></i> Payment Details</h4>

            <div class="row">
                <div class="col-md-6 mb-2"><strong>Student:</strong> <?= htmlspecialchars($r['student_name']) ?></div>
                <div class="col-md-6 mb-2"><strong>Course:</strong> <?= htmlspecialchars($r['course']) ?></div>

                <div class="col-md-4 mb-2"><strong>Total Fee:</strong> ₹<?= $r['total_fee'] ?></div>
                <div class="col-md-4 mb-2"><strong>Paid:</strong> ₹<?= $r['paid_amount'] ?></div>
                <div class="col-md-4 mb-2"><strong>Remaining:</strong> ₹<?= $r['remaining'] ?></div>

                <div class="col-md-6 mb-2"><strong>Mode:</strong> <?= htmlspecialchars($r['payment_mode']) ?></div>
                <div class="col-md-6 mb-2"><strong>Date:</strong> <?= $r['created_at'] ?></div>

                <div class="col-12 mt-3"><strong>Remarks:</strong>
                    <div class="p-2 bg-light rounded"><?= nl2br(htmlspecialchars($r['remarks'])) ?></div>
                </div>
            </div>

            <div class="mt-3">
                <a href="edit_fees.php?id=<?= $r['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="delete_fees.php?id=<?= $r['id'] ?>" class="btn btn-danger"
                    onclick="return confirm('Delete this payment?')">Delete</a>
                <a href="student_fees.php" class="btn btn-secondary">Back</a>
        

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>