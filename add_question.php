<?php
include 'connection.php';

if(isset($_POST['add'])){
mysqli_query($conn,"
INSERT INTO exam_questions
(course_id,question,option_a,option_b,option_c,option_d,correct_option)
VALUES(
'{$_POST['course_id']}',
'{$_POST['question']}',
'{$_POST['a']}','{$_POST['b']}','{$_POST['c']}','{$_POST['d']}',
'{$_POST['correct']}'
)");
}
include 'sidebar.php';
?>
<div class="main-content">
    <div class="container mt-4">
        <h2>Add Question</h2>
        <form method="post">
            <select name="course_id">
                <?php
$c = mysqli_query($conn,"SELECT * FROM courses");
while($row=mysqli_fetch_assoc($c)){
 echo "<option value='{$row['id']}'>{$row['course']}</option>";
}
?>
            </select>

            <textarea name="question"></textarea>
            <input name="a">
            <input name="b">
            <input name="c">
            <input name="d">
            <select name="correct">
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
            </select>
            <button name="add">Add Question</button>
        </form>
    </div>
</div>