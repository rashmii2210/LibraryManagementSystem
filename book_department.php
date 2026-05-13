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

    <title>Book Information</title>
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
        <div class="container">

             <!-- Title and Add Book Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mt-4">Book Information</h2>
                <a href="add_book.php" class="btn btn-primary">ADD BOOK</a>
            </div>

            <form action="book_department.php" method="post" class="mt-4">
                <div class="form-group">
                    <input type="text" name="searchbook" class="form-control" placeholder="Search Book">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">SEARCH BOOK</button>
            </form>

            <?php

            if (isset($_POST['submit']))
            {
                $searchKeyword = $_POST['searchbook'];

                // Query to search for books based on title or keyword
                $search_query = "SELECT * FROM books WHERE book_title LIKE '%$searchKeyword%' OR keyword LIKE '%$searchKeyword%'";
                $result = mysqli_query($connect, $search_query);

                if ($result && mysqli_num_rows($result) > 0)
                {
                    echo "<div class='mt-4'>";
                    echo "<table class='table'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr><th>Book Title</th><th>Language</th><th>Author</th><th>Publisher</th><th>Year</th><th>Pages</th><th>Location</th><th>Price</th><th>ISBN Number</th><th>Status</th></tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
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
                    echo "</div>";
                }
                else
                {
                    // No books found
                    echo "<div class='mt-4'><p>No books found.</p></div>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>