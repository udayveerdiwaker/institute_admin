<?php
include 'connection.php';

session_start();

/* Only exam user allowed */
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    die("Access denied");
}

/* Validate result id */
if (!isset($_GET['id'])) {
    die("Result not found");
}

$id = (int) $_GET['id'];

/* Fetch result */
$res = mysqli_query($conn,"SELECT * FROM result WHERE id='$id' LIMIT 1");

if (mysqli_num_rows($res) != 1) {
    die("Invalid result");
}

$r = mysqli_fetch_assoc($res);

$status = ($r['student_marks'] >= 33) ? 'PASS' : 'FAIL';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Print Result</title>

    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6f9;
    }

    .result-box {
        max-width: 700px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border: 1px solid #ccc;
    }

    .header {
        text-align: center;
        border-bottom: 2px solid #000;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }

    h2 {
        margin: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    td {
        padding: 10px;
        border: 1px solid #ccc;
    }

    .label {
        font-weight: bold;
        width: 40%;
    }

    .status {
        font-size: 18px;
        font-weight: bold;
        color: <?=($status=='PASS')?'green':'red'?>;
    }

    .footer {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
    }

    @media print {
        body {
            background: #fff;
        }
    }
    </style>
</head>

<body onload="window.print()">

    <div class="result-box">

        <div class="header">
            <h2>Computer Institute</h2>
            <p>Exam Result</p>
        </div>

        <table>
            <tr>
                <td class="label">Student Name</td>
                <td><?= htmlspecialchars($r['student_name']) ?></td>
            </tr>
            <tr>
                <td class="label">Marks Obtained</td>
                <td><?= $r['student_marks'] ?></td>
            </tr>
            <tr>
                <td class="label">Result Status</td>
                <td class="status"><?= $status ?></td>
            </tr>
            <tr>
                <td class="label">Exam Date</td>
                <td><?= date("d M Y") ?></td>
            </tr>
        </table>

        <div class="footer">
            <div>
                <strong>Exam Authority</strong><br>
                Computer Sikhe & Website Banaye
            </div>
            <div>
                <strong>Signature</strong><br>
                ____________________
            </div>
        </div>

    </div>

</body>

</html>