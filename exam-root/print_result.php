<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../connection.php';

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
$marks = (int)$r['student_marks'];
$status = ($marks >= 33) ? 'PASS' : 'FAIL';
$statusColor = ($status === 'PASS') ? '#2e7d32' : '#c62828';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Exam Result Receipt</title>

    <style>
    body {
        font-family: "Segoe UI", Arial, sans-serif;
        background: #f2f4f7;
    }

    .receipt {
        max-width: 720px;
        margin: 30px auto;
        background: #fff;
        padding: 35px;
        border: 2px solid #000;
    }

    .header {
        text-align: center;
        border-bottom: 2px solid #000;
        padding-bottom: 12px;
        margin-bottom: 20px;
    }

    .header h1 {
        margin: 0;
        font-size: 26px;
        letter-spacing: 1px;
    }

    .header p {
        margin: 5px 0 0;
        font-size: 14px;
    }

    .status-box {
        text-align: center;
        margin: 20px 0;
    }

    .status-box span {
        padding: 10px 30px;
        font-size: 20px;
        font-weight: bold;
        color: #fff;
        background: <?=$statusColor ?>;
        border-radius: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
    }

    td {
        padding: 12px;
        border: 1px solid #000;
        font-size: 15px;
    }

    .label {
        width: 40%;
        font-weight: 600;
        background: #f5f5f5;
    }

    .footer {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
    }

    .sign {
        text-align: center;
    }

    .sign-line {
        margin-top: 30px;
        border-top: 1px solid #000;
        width: 180px;
    }

    @media print {
        body {
            background: #fff;
        }
    }
    </style>
</head>

<body onload="window.print()">

    <div class="receipt">

        <!-- HEADER -->
        <div class="header">
            <h1>COMPUTER INSTITUTE</h1>
            <p>Website Banaye & Computer Sikhe</p>
            <p><strong>EXAM RESULT RECEIPT</strong></p>
        </div>

        <!-- STATUS -->
        <div class="status-box">
            <span><?= $status ?></span>
        </div>

        <!-- DETAILS -->
        <table>
            <tr>
                <td class="label">Student Name</td>
                <td><?= htmlspecialchars($r['student_name']) ?></td>
            </tr>
            <tr>
                <td class="label">Marks Obtained</td>
                <td><?= $marks ?></td>
            </tr>
            <tr>
                <td class="label">Passing Marks</td>
                <td>33</td>
            </tr>
            <tr>
                <td class="label">Exam Type</td>
                <td>MCQ (Online)</td>
            </tr>
            <tr>
                <td class="label">Exam Date</td>
                <td><?= date("d M Y", strtotime($r['created_at'] ?? date('Y-m-d'))) ?></td>
            </tr>
        </table>

        <!-- FOOTER -->
        <div class="footer">
            <div>
                <strong>Issued By</strong><br>
                Computer Sikhe & Website Banaye
            </div>

            <div class="sign">
                <strong>Authorized Sign</strong>
                <div class="sign-line"></div>
            </div>
        </div>

    </div>

</body>

</html>