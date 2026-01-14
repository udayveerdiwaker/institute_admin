<?php
include "connection.php";

$query ="SELECT * , COUNT(sub) FROM `questions` GROUP BY sub";
$result = mysqli_query($conn, $query);
$subject = mysqli_fetch_all($result , MYSQLI_ASSOC);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Section</title>
    <style>
    body {
        background-color: #495270;
    }

    div a {
        text-decoration: none;
        margin-left: 30%;
        background-color: #495270;
        color: white;
        padding: 5px 40px 10px 40px;
        border-radius: 25px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="row justify-content-around">
                <?php
                                      foreach ($subject as $k => $x) {
                                          ?>


                <div class="card mt-5 p-4" style="width: 30rem;   background-color:   lightblue">
                    <div class="card-body">
                        <h5 class="card-title  fs-2 text-center"><?php  echo $x['sub'] ?></h5>
                        <h6 class="card-subtitle mb-4 text-body-secondary text-center mt-4">Microsoft office Specialist
                        </h6>
                        <?php $n= base64_encode('1')?>
                        <a href="questions.php?n=<?php echo $n?>&sub=<?php echo $x['sub']?>&Q=<?php echo $x['question_number']?>"
                            class="card-link">Start Exam</a>
                    </div>
                </div>
                <?php
                            }
                              
                                        
                              ?>




            </div>



        </div>
    </div>
</body>

</html>