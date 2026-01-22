<?php
include 'session.php';

$id = (int)$_GET['id'];
$msg = "";

$q = mysqli_query($conn, "SELECT * FROM expenses WHERE id=$id");
$data = mysqli_fetch_assoc($q);

if (!$data) {
    die("Expense not found");
}

if (isset($_POST['update'])) {

    $expense_date = $_POST['expense_date'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $amount = (float)$_POST['amount'];

    $sql = "UPDATE expenses SET 
                expense_date='$expense_date',
                name='$name',
                description='$description',
                amount='$amount'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: expense_list");
        exit;
    } else {
        $msg = "<div class='alert alert-danger'>Error updating record</div>";
    }
}
include 'sidebar.php';
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="card p-4 shadow">
            <h4>Edit Expense</h4>
            <?= $msg ?>

            <form method="post">

                <label>Date</label>
                <input type="date" name="expense_date" value="<?= $data['expense_date'] ?>" class="form-control"
                    required>

                <label class="mt-3">Name</label>
                <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" required>

                <label class="mt-3">Amount</label>
                <input type="number" name="amount" step="0.01" value="<?= $data['amount'] ?>" class="form-control"
                    required>

                <label class="mt-3">Description</label>
                <textarea name="description" class="form-control"><?= $data['description'] ?></textarea>

                <button class="btn btn-primary mt-3" name="update">Update</button>
                <a href="expense_list" class="btn btn-secondary mt-3">Cancel</a>

            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>