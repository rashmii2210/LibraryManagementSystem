<?php
require("first.php");
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    $select_query = "SELECT * FROM students";
    $result = mysqli_query($connect, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class='table'>";
        echo "<thead class='thead-dark'>";
        echo "<tr><th>Registration Number</th><th>Name</th><th>Father Name</th><th>Surname</th><th>Address</th><th>Gender</th><th>Email</th><th>PhoneNo</th><th>BirthDate</th><th>Photo</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['s_name'] . "</td>";
            echo "<td>" . $row['sfather_name'] . "</td>";
            echo "<td>" . $row['s_surname'] . "</td>";
            echo "<td>" . $row['s_address'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['s_email'] . "</td>";
            echo "<td>" . $row['s_phoneno'] . "</td>";
            echo "<td>" . $row['s_birth_date'] . "</td>";
            echo "<td>" . $row['s_photo'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    ?>
    </div>
</body>
</html>