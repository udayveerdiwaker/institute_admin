<?php

include 'session.php';


$id = intval($_GET['id']);

// Get image name
$res = mysqli_query($conn, "SELECT photo FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($res);

if ($row && !empty($row['photo'])) {
    $imgPath = "student_img/" . $row['photo'];

    if (file_exists($imgPath)) {
        unlink($imgPath); // DELETE IMAGE
    }
}

// Delete fees
mysqli_query($conn, "DELETE FROM student_fees WHERE student_id=$id");

// Delete student
mysqli_query($conn, "DELETE FROM students WHERE id=$id");

header("Location: students?msg=deleted");
exit;