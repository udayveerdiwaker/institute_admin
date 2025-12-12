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

$msg = '';

if (isset($_POST['submit'])) {

    $expense_date = $_POST['expense_date'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $amount = (float)$_POST['amount'];

    $sql = "INSERT INTO expenses (expense_date, name, description, amount)
            VALUES ('$expense_date', '$name', '$description', '$amount')";

    if (mysqli_query($conn, $sql)) {
        header("Location: expense_list.php");
        exit;
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
include 'sidebar.php';

?>

<div class="main-content">
    <div class="container mt-4">
        <div class="card shadow p-4">
            <h4>Add Expense</h4>
            <?= $msg ?>

            <form method="post">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label>Date</label>
                        <input type="date" name="expense_date" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label>Amount (₹)</label>
                        <input type="number" step="0.01" name="amount" class="form-control" required>
                    </div>

                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" name="submit">Save</button>
                        <a href="expense_list.php" class="btn btn-secondary">Back</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>