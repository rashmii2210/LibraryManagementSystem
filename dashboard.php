<?php
require("first.php");
include("db.php");

// Query to get total number of students
$total_students_query = "SELECT COUNT(*) AS total_students FROM students";
$total_students_result = mysqli_query($connect, $total_students_query);
$total_students = mysqli_fetch_assoc($total_students_result)['total_students'];

// Query to get total number of books
$total_books_query = "SELECT COUNT(*) AS total_books FROM books";
$total_books_result = mysqli_query($connect, $total_books_query);
$total_books = mysqli_fetch_assoc($total_books_result)['total_books'];

// Query to get total number of available books (status=1)
$total_available_books_query = "SELECT COUNT(*) AS total_available_books FROM books WHERE status = 1";
$total_available_books_result = mysqli_query($connect, $total_available_books_query);
$total_available_books = mysqli_fetch_assoc($total_available_books_result)['total_available_books'];

// Query to get total number of issued books (status=0)
$total_issued_books_query = "SELECT COUNT(*) AS total_issued_books FROM books WHERE status = 0";
$total_issued_books_result = mysqli_query($connect, $total_issued_books_query);
$total_issued_books = mysqli_fetch_assoc($total_issued_books_result)['total_issued_books'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

    <div class="container mt-5">

        <h2 class="text-center mb-4">Dashboard</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="dashboard_totalstudents.php"><h5 class="card-title">Total Number of Students</h5></a>
                        <p class="card-text"><?php echo $total_students; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="dashboard_totalbooks.php"><h5 class="card-title">Total Number of Books</h5></a>
                        <p class="card-text"><?php echo $total_books; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="dashboard_totalavailablebooks.php"><h5 class="card-title">Total Number of Available Books</h5></a>
                        <p class="card-text"><?php echo $total_available_books; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="dashboard_totalissuedbooks.php"><h5 class="card-title">Total Number of Issued Books</h5></a>
                        <p class="card-text"><?php echo $total_issued_books; ?></p>
                        <p class="card-text"> <a href="dashboard_issuedbooktostudent.php">Detail</a></p>
                    </div>
                </div>
            </div> 
        </div>
        
    </div>
    </div>
</body>
</html>
