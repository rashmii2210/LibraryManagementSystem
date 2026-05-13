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

    $select_query="SELECT * FROM books";
    $result=mysqli_query($connect,$select_query);

    if($result && mysqli_num_rows($result)>0)
    {
        echo "<table class='table'>";
        echo "<thead class='thead-dark'>";
        echo "<tr><th>Book ID</th><th>Date of Entry</th><th>Book Title</th><th>Language</th><th>Author</th><th>Publisher</th><th>Year</th><th>Pages</th><th>Location</th><th>Price</th><th>ISBN NO</th><th>Status</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['date_of_entry'] . "</td>";
            echo "<td>" . $row['book_title'] . "</td>";
            echo "<td>" . $row['language'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['publisher'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['pages'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['isbn_no'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    else
    {
        echo "<p>No books found.</p>";
    }
    ?>

</div>
</body>
</html>