<?php

require("first.php");
include("db.php");

// Function to calculate the fine based on the return date and due date
function calculateFine($returnDate, $dueDate)
{
    $fine = 0;
    // Compare return date with due date
    if ($returnDate > $dueDate)
    {
        // Calculate number of days late
        $daysLate = (strtotime($returnDate) - strtotime($dueDate)) / (60 * 60 * 24);
        // Calculate fine (10 rupees per day)
        $fine = $daysLate * 10;
    }
    return $fine;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Return Form</title>
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
        <h2 class="text-center mb-4">Book Return Form</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" class="form-control" id="student_id" name="student_id" required>
            </div>

            <div class="form-group">
                <label for="book_id">Select Book:</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    <?php
                    // Fetch book options from the database
                    $book_query = "SELECT id, book_title FROM books WHERE status = '0'";
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
                <label for="return_date">Return Date:</label>
                <input type="date" class="form-control" id="return_date" name="return_date">
            </div>

            <button type="submit" class="btn btn-primary" name="update">Update Return Date</button>
        </form>
        <!-- JavaScript to disable past dates in issued_date input -->
        <script>
            // Get the current date
            var today = new Date().toISOString().split('T')[0];

            // Set the min attribute of the issued_date input to today's date
            document.getElementById("return_date").setAttribute("min", today);
        </script>

        <?php

        if (isset($_POST['update']))
        {
            $student_id = $_POST['student_id'];
            $return_date = $_POST['return_date'];
            $book_id = $_POST['book_id'];

            // Retrieve due date from the database
            $due_date_query = "SELECT due_date FROM book_issueds WHERE book_id='$book_id' AND student_id='$student_id'";
            $due_date_result = mysqli_query($connect, $due_date_query);
            $row = mysqli_fetch_assoc($due_date_result);
            $due_date = $row['due_date'];

            // Calculate fine
            $fine = calculateFine($return_date, $due_date);

            if ($fine > 0)
            {
                echo "<p class='mt-3'>Fine: $fine rupees</p>";
            }

            // Update return date in book_issueds table
            $update_query = "UPDATE book_issueds SET return_date='$return_date' WHERE book_id='$book_id' AND student_id='$student_id' ";
            $result = mysqli_query($connect, $update_query);

            if ($result)
            {
                // Update status of the book in books table
                $update_book_query = "UPDATE books SET status='1' WHERE id='$book_id'";
                $update_book_result = mysqli_query($connect, $update_book_query);

                if ($update_book_result)
                {
                    echo "<p class='mt-3 text-success'>Return date updated successfully.</p>";
                }
                else
                {
                    echo "<p class='mt-3 text-danger'>Error updating book status: " . mysqli_error($connect) . "</p>";
                }
            }
            else
            {
                echo "<p class='mt-3 text-danger'>Error updating return date: " . mysqli_error($connect) . "</p>";
            }
        }

        ?>
    </div>
</body>
</html>
