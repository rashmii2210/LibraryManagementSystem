<?php
 require("first.php");
 include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       .content {
            max-width: 1130px;
            margin-left: 300px;
            padding: 20px;
            background-color: #d3d6d3;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="content">
        <h2 class="text-center mb-4">Add New Book</h2>
        
        <form action="add_book.php" method="post">
            <div class="form-group">
                <label for="date_of_entry">Date of Entry:</label>
                <input type="date" class="form-control" id="date_of_entry" name="date_of_entry" required>
            </div>

            <div class="form-group">
                <label for="book_title">Book Title:</label>
                <input type="text" class="form-control" id="book_title" name="book_title" required>
            </div>

            <div class="form-group">
                <label for="language">Language:</label>
                <input type="text" class="form-control" id="language" name="language" required>
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
                <label for="year">Year:</label>
                <input type="date" class="form-control" id="year" name="year" required>
            </div>

            <div class="form-group">
                <label for="pages">Pages:</label>
                <input type="number" class="form-control" id="pages" name="pages" required>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="isbn_no">ISBN Number:</label>
                <input type="text" class="form-control" id="isbn_no" name="isbn_no" required>
            </div>

            <div class="form-group">
                <label for="keyword">Keyword:</label>
                <input type="text" class="form-control" id="keyword" name="keyword" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Add Book</button>
        </form>

        <?php
        if (isset($_POST['submit']))
        {
            $date_of_entry = $_POST['date_of_entry'];
            $book_title = $_POST['book_title'];
            $language = $_POST['language'];
            $author = $_POST['author'];
            $publisher = $_POST['publisher'];
            $year = $_POST['year'];
            $pages = $_POST['pages'];
            $location = $_POST['location'];
            $price = $_POST['price'];
            $isbn_no = $_POST['isbn_no'];
            $keyword = $_POST['keyword'];
            $status = '1';

            // Prepare and execute SQL INSERT query
            $insert_query = "INSERT INTO books (date_of_entry, book_title, language, author, publisher, year, pages, location, price, isbn_no, status,keyword) 
             VALUES ('$date_of_entry', '$book_title', '$language', '$author', '$publisher', '$year', '$pages', '$location', '$price', '$isbn_no',  '$status','$keyword')";

            $result = mysqli_query($connect, $insert_query);

            if ($result)
            {
                echo "<p class='mt-3 text-success'>Book Added successfully.</p>";
            }
            else
            {
                echo "<p class='mt-3 text-danger'>Error: " . $result . "<br>" . mysqli_error($connect) . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
