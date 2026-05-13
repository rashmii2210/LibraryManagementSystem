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
    <div class="demand-book-form">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Demand Book</h3>
        <form action="show_demands.php" method="post">
            <a href="show_demands.php"><button type="submit" class="btn btn-primary mr-2" name="show_demand_books">Show Demand Books</button></a>
        </form>
    </div>

    <form action="demand_book.php" method="post">
        <div class="form-group">
            <label for="student_id">Student ID:</label>
            <input type="text" class="form-control" id="student_id" name="student_id" required>
        </div>
        <div class="form-group">
            <label for="book_title">Book Title:</label>
            <input type="text" class="form-control" id="book_title" name="book_title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="publisher">Publisher:</label>
            <input type="text" class="form-control" id="publisher" name="publisher" required>
        </div>
        <div class="form-group">
            <label for="demand_date">Demand Date:</label>
            <input type="date" class="form-control" id="demand_date" name="demand_date">
        </div>
        <button type="submit" class="btn btn-primary" name="demand_book">Demand Book</button>
    </form>
    <!-- JavaScript to disable past dates in issued_date input -->
    <script>
        // Get the current date
        var today = new Date().toISOString().split('T')[0];

        // Set the min attribute of the issued_date input to today's date
        document.getElementById("demand_date").setAttribute("min", today);
    </script>
</div>


<?php

if (isset($_POST['demand_book']))
{

    $student_id = $_POST['student_id'];
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $demand_date = $_POST['demand_date'];


    $insert_query = "INSERT INTO book_demand (student_id,book_title,author,publisher,demand_date)
    VALUES('$student_id','$book_title','$author','$publisher','$demand_date')";

    $result = mysqli_query($connect, $insert_query);

    if ($result)
    {
        echo "Demand Added Successfully";
    }
    else
    {
        echo "Error:" . $result . "<br>";
    }
}
?>

</div>
</body>
</html>