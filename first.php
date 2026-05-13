<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- For Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .navbar {
        padding: 18px;
        background-color: #1e1e1e;
        overflow: hidden;
    }

    * {
        margin: 0;
        padding: 0;
        list-style: none;
        text-decoration: none;
    }

    .sidebar {
        position: fixed;
        overflow: hidden;
        left: 0;
        width: 250px;
        height: 100%;
        background: #1e1e1e;
    }

    .sidebar a {
        display: block;
        height: 65px;
        width: 100%;
        color: white;
        line-height: 65px;
        padding-left: 30px;
        box-sizing: border-box;
        border-bottom: 1px solid black;
        border-top: 1px solid rgba(255, 255, 255, .1);
        border-left: 5px solid transparent;
        font-family: 'Open Sans', sans-serif;
        transition: all .5s ease;
        text-decoration: none;
    }

    a.active,
    a:hover {
        border-left: 5px solid #b93632;
        color: #b93632;
    }

    .sidebar a i {
        font-size: 23px;
        margin-right: 16px;
    }

    .sidebar a span {
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    @media(max-width : 860px) {
        .sidebar {
            height: auto;
            width: 70px;
            left: 0;
            margin: 100px 0;
        }

        header,
        #btn,
        #cancel {
            display: none;
        }

        span {
            position: absolute;
            margin-left: 23px;
            opacity: 0;
            visibility: hidden;
        }

        .sidebar a {
            height: 60px;
        }

        .sidebar a i {
            margin-left: -10px;
        }

        a:hover {
            width: 200px;
            background: inherit;
        }

        .sidebar a:hover span {
            opacity: 1;
            visibility: visible;
        }
    }
    </style>
</head>

<body>
    <div class="navbar">
        <p style="color: white; font-size: 40px; padding-left: 34px;">Library</p>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="dashboard.php"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="book_department.php"><i class="fa-solid fa-book"></i>Book Department</a></li>
            <li><a href="student_section.php"><i class="fas fa-book-reader"></i>Student Section</a></li>
            <li><a href="book_issued_section.php"><i class="fa-solid fa-book"></i>Book Issued Section</a></li>
            <li><a href="return_book.php"><i class="fa-solid fa-book"></i>Return Book</a></li>
            <li><a href="renew_book.php"><i class="fa-solid fa-book"></i>Renew Book</a></li>
            <li><a href="cancle_student.php"><i class="fas fa-book-reader"></i>Cancel Student</a></li>
            <!-- <li><a href="#"><i class="fa-solid fa-book"></i>Cancel Book</a></li> -->
            <li><a href="demand_book.php"><i class="fa-solid fa-book"></i>Demand</a></li>
        </ul>
    </div>
</body>

</html>

