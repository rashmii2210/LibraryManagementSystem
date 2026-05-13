<?php

require("first.php");
include("db.php");

// Function to calculate the fine based on the return date and due date
function calculateFine($currentDate, $dueDate)
{
    $fine = 0;
    // Compare current date with due date
    if ($currentDate > $dueDate)
    {
        // Calculate number of days late
        $daysLate = (strtotime($currentDate) - strtotime($dueDate)) / (60 * 60 * 24);
        // Calculate fine (50 rupees per day)
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
    <title>Book Renewal Form</title>
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
        <h2 class="text-center mb-4">Book Renewal Form</h2>
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
                <label for="renewal_date">Renewal Date:</label>
                <input type="date" class="form-control" id="renewal_date" name="renewal_date">
            </div>

            <button type="submit" class="btn btn-primary" name="update">Renew Book</button>
        </form>
        <!-- JavaScript to disable past dates in issued_date input -->
        <script>
            // Get the current date
            var today = new Date().toISOString().split('T')[0];

            // Set the min attribute of the issued_date input to today's date
            document.getElementById("renewal_date").setAttribute("min", today);
        </script>

        <?php

        // Check if form is submitted for renewing the book
        if (isset($_POST['update']))
        {
            $student_id = $_POST['student_id'];
            $book_id = $_POST['book_id'];
            $renewal_date = $_POST['renewal_date'];

            // Retrieve issued date and due date from the database
            $date_query = "SELECT issued_date, due_date FROM book_issueds WHERE book_id='$book_id' AND student_id='$student_id'";
            $date_result = mysqli_query($connect, $date_query);
            $date_row = mysqli_fetch_assoc($date_result);
            $issued_date = $date_row['issued_date'];
            $due_date = $date_row['due_date'];

            // Calculate fine
            $fine = calculateFine($renewal_date, $due_date);

            if ($fine > 0)
            {
                echo "<p class='mt-3'>Fine: $fine rupees. Please pay the fine before renewing the book.</p>";
            }
            else
            {
                // Proceed with the renewal process
                // Calculate new due date by adding 7 days to the current due date
                $new_due_date = date('Y-m-d', strtotime($due_date . ' + 7 days'));

                // Update the due date in the database
                $update_query = "UPDATE book_issueds SET due_date='$new_due_date' WHERE book_id='$book_id' AND student_id='$student_id'";
                $result = mysqli_query($connect, $update_query);

                if ($result)
                {
                    echo "<p class='mt-3 text-success'>Book renewed successfully. New due date is: $new_due_date</p>";
                }
                else
                {
                    echo "<p class='mt-3 text-danger'>Error renewing book: " . mysqli_error($connect) . "</p>";
                }
            }
        }
        ?>

    </div>
</body>
</html>