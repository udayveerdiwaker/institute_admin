<?php

function addExam( $conn, $data ) {
    $sql = "INSERT INTO exams (exam_name, exam_date, exam_time, total_marks, pass_marks, exam_description)
            VALUES (
                '{$data['exam_name']}',
                '{$data['exam_date']}',
                '{$data['exam_time']}',
                '{$data['total_marks']}',
                '{$data['pass_marks']}',
                '{$data['exam_description']}'
            )";

    mysqli_query( $conn, $sql );
}

function getExam( $conn, $id ) {
    $sql = "SELECT * FROM exams WHERE id = $id";
    return mysqli_fetch_assoc( mysqli_query( $conn, $sql ) );
}

function updateExam( $conn, $data, $id ) {
    $sql = "UPDATE exams SET
            exam_name = '{$data['exam_name']}',
            exam_date = '{$data['exam_date']}',
            exam_time = '{$data['exam_time']}',
            total_marks = '{$data['total_marks']}',
            pass_marks = '{$data['pass_marks']}',
            exam_description = '{$data['exam_description']}'
            WHERE id = $id";

    mysqli_query( $conn, $sql );
}

function listExams( $conn ) {
    $sql = 'SELECT * FROM exams ORDER BY id DESC';
    $result = mysqli_query( $conn, $sql );

    $data = [];
    while( $row = mysqli_fetch_assoc( $result ) ) {
        $data[] = $row;
    }
    return $data;
}

function deleteExam( $conn, $id ) {
    mysqli_query( $conn, "DELETE FROM exams WHERE id = $id" );
}
?>