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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <form action="book_issued_section.php" method="post">
                <input type="number" name="student_id" placeholder="Enter Student Registration Number" style="width: 280px;" required>
                <input type="submit" name="submit" value="View Issued Books" class="btn btn-primary">
                <a href="book_issued.php" class="btn btn-primary" style="margin-left: 500px;">Issue Book</a>
            </form>
        </div>

        <?php

        if (isset($_POST['submit']))
        {
            // Get the student ID entered by the user
            $student_id = $_POST['student_id'];

            // Query to fetch issued books by the student along with student details
            $query = "SELECT s.id as student_id, s.s_name, s.s_surname, bi.book_id, b.book_title, bi.issued_date, bi.due_date, bi.return_date 
            FROM book_issueds bi
            INNER JOIN students s ON bi.student_id = s.id
            INNER JOIN books b ON bi.book_id = b.id
            WHERE bi.student_id = ? AND bi.return_date IS NULL"; // Only select entries where return_date is NULL
            $stmt = $connect->prepare($query);
            $stmt->bind_param("i", $student_id); // Assuming student_id is an integer
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && mysqli_num_rows($result) > 0)
            {
                // Books found, display them
                echo "<h3>Books Issued to Student ID: $student_id</h3>";
                echo "<table class='table'>";
                echo "<thead class='thead-dark'>";
                echo "<tr><th>Student ID</th><th>Name</th><th>Surname</th><th>Book ID</th><th>Book Title</th><th>Issued Date</th><th>Due Date</th><th>Return Date</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>" . $row['student_id'] . "</td>";
                    echo "<td>" . $row['s_name'] . "</td>";
                    echo "<td>" . $row['s_surname'] . "</td>";
                    echo "<td>" . $row['book_id'] . "</td>";
                    echo "<td>" . $row['book_title'] . "</td>";
                    echo "<td>" . $row['issued_date'] . "</td>";
                    echo "<td>" . $row['due_date'] . "</td>";
                    echo "<td>" . $row['return_date'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
            else
            {
                // No books found
                echo "<p>No books issued to student ID: $student_id</p>";
            }
        }
        ?>
        
    </div>
</body>
</html>
