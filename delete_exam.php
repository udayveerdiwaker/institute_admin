<?php
include( 'exam_sql.php' );

$id = $_GET[ 'id' ];
deleteExam( $conn, $id );

header( 'Location: list_exam.php' );
exit;