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
        $query = "SELECT bi.id AS issued_id, bi.student_id, s.s_name, s.s_surname, bi.book_id, bi.book_name, bi.issued_date, bi.due_date, bi.return_date
        FROM book_issueds bi
        INNER JOIN students s ON bi.student_id = s.id
        WHERE bi.return_date IS NULL";
        $result = mysqli_query($connect, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            echo "<table class='table'>";
            echo "<thead class='thead-dark'>";
            echo "<tr><th>Student ID</th><th>Issued ID</th><th>Student Name</th><th>Surname</th><th>Book ID</th><th>Book Title</th><th>Issued Date</th><th>Due Date</th><th>Return Date</th></tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>" . $row['issued_id'] . "</td>";
                echo "<td>" . $row['s_name'] . "</td>";
                echo "<td>" . $row['s_surname'] . "</td>";
                echo "<td>" . $row['book_id'] . "</td>";
                echo "<td>" . $row['book_name'] . "</td>";
                echo "<td>" . $row['issued_date'] . "</td>";
                echo "<td>" . $row['due_date'] . "</td>";
                echo "<td>" . $row['return_date'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No records found</p>";
        }
        ?>
    </div>
</body>

</html>
