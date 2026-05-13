<?php
require("first.php");
include("db.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Issued Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <h2 class="text-center mb-4">Book Issue Form</h2>
        <form action="book_issued.php" method="post">

            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" class="form-control" id="student_id" name="student_id" required>
            </div>

            <div class="form-group">
                <label for="book_id">Select Book:</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    <?php
                    // Fetch book options from the database
                    $book_query = "SELECT id, book_title FROM books WHERE status = '1'";
                    $book_result = mysqli_query($connect, $book_query);

                    // Check if books are available
                    if (mysqli_num_rows($book_result) > 0)
                    {
                        // Output each book option
                        while ($book_row = mysqli_fetch_assoc($book_result))
                        {
                            echo "<option value='" . $book_row['id'] . "'>" . $book_row['book_title'] . "</option>";
                        }
                    }
                    else
                    {
                        echo "<option value=''>No books available</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="issued_date">Issued Date:</label>
                <input type="date" class="form-control" id="issued_date" name="issued_date">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <!-- JavaScript to disable past dates in issued_date input -->
        <script>
            // Get the current date
            var today = new Date().toISOString().split('T')[0];

            // Set the min attribute of the issued_date input to today's date
            document.getElementById("issued_date").setAttribute("min", today);
        </script>

        <?php

        if (isset($_POST['submit']))
        {
            $student_id = $_POST['student_id'];
            $book_id = $_POST['book_id'];
            $issued_date = $_POST['issued_date'];

            // Calculate due date (issued date + 7 days)
            $due_date = date('Y-m-d', strtotime($issued_date . ' + 7 days'));


            // Retrieve book name based on book ID
            $book_name_query = "SELECT book_title FROM books WHERE id='$book_id'";
            $result = $connect->query($book_name_query);
            $row = $result->fetch_assoc();
            $book_name = $row['book_title'];


            $insert_query = "INSERT INTO book_issueds (student_id, book_id, book_name, issued_date,due_date) 
                     VALUES ('$student_id', '$book_id', '$book_name', '$issued_date','$due_date')";

            $result = mysqli_query($connect, $insert_query);

            if ($result)
            {
                // Update status of the book in books table
                $update_book_query = "UPDATE books SET status='0' WHERE id='$book_id'";
                $update_book_result = mysqli_query($connect, $update_book_query);

                if ($update_book_result)
                {
                    echo "<p class='mt-3 text-success'>Book issued successfully.</p>";
                }
                else
                {
                    echo "<p class='mt-3 text-danger'>Error updating book status: " . mysqli_error($connect) . "</p>";
                }
            }
            else
            {
                echo "<p class='mt-3 text-danger'>Error " . $result . "<br>" . mysqli_error($connect) . "</p>";
            }
        }

        ?>
    </div>
</body>
</html>
