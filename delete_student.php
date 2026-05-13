<?php
include("db.php");
require("first.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content {
            max-width: 1130px;
            margin-left: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="content">
        <?php

        if (isset($_POST['student_id']))
        {
            $student_id = $_POST['student_id'];

            $delete_query = "DELETE FROM students WHERE id='$student_id'";
            $result = mysqli_query($connect, $delete_query);

            if ($result)
            {

                echo " Student Deleted Successfully";
            }
            else
            {
                echo "Error: " . mysqli_error($connect);
            }
        }
        ?>
    </div>
</body>
</html>