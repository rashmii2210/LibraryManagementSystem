<?php
require("first.php");
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Student</title>
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
        <h3 class="text-center mb-4">Cancel Student</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="s_register_number">Enter Student ID:</label>
                <input type="number" class="form-control" id="s_register_number" name="s_register_number" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Show Student Details</button><br><br>
        </form>

        <?php
        if (isset($_POST['submit']))
        {
            $registerno = mysqli_real_escape_string($connect, $_POST['s_register_number']);
            $check_query = "SELECT * FROM students WHERE id='$registerno'";
            $result = mysqli_query($connect, $check_query);

            if (mysqli_num_rows($result) > 0)
            {
                echo "<table class='table'>";
                echo "<thead class='thead-dark'";
                echo "<tr><th>Registration Number</th><th>Name</th><th>Father Name</th><th>Surname</th><th>Address</th><th>Gender</th><th>Email</th><th>Phone Number</th><th>BirthDate</th><th>Action</th></tr>";
                echo "</thead>";

                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['s_name'] . "</td>";
                    echo "<td>" . $row['sfather_name'] . "</td>";
                    echo "<td>" . $row['s_surname'] . "</td>";
                    echo "<td>" . $row['s_address'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['s_email'] . "</td>";
                    echo "<td>" . $row['s_phoneno'] . "</td>";
                    echo "<td>" . $row['s_birth_date'] . "</td>";
                    echo "<td>";
        ?>
                    <form action="delete_student.php" method="post">
                        <input type="hidden" name="student_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete Student</button>
                    </form>
        <?php
                    echo "</td></tr>";
                }
                echo "</table>";
                echo "</div>";
            }
            else
            {
                echo "<p class='mt-3'>No students found matching the criteria.</p>";
            }
        }
        ?>
    </div>
</body>
</html>