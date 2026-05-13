<?php
require("first.php");
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .content {
            max-width: 1080px;
            margin-left: 300px;
            margin-top: 25px;
            padding: 20px;
            background-color: #d3d6d3;
            border-radius: 10px;
            box-shadow: 10px -10px 20px 0px rgb(30 32 32 / 84%);
        }
        
    </style>
</head>

<body>
        <div class="content">
            <h2 class="text-center mb-4">Add Student</h2>

            <form method="post" action="add_student.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="s_name" class="form-label">Name:</label>
                    <input type="text" id="s_name" name="s_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sfather_name" class="form-label">Father's Name:</label>
                    <input type="text" id="sfather_name" name="sfather_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="s_surname" class="form-label">Surname:</label>
                    <input type="text" id="s_surname" name="s_surname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="s_address" class="form-label">Address:</label>
                    <textarea id="s_address" name="s_address" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="gender" class="form-label">Gender:</label>
                    <select id="gender" name="gender" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="s_email" class="form-label">Email:</label>
                    <input type="email" id="s_email" name="s_email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="s_phoneno" class="form-label">Phone Number:</label>
                    <input type="tel" id="s_phoneno" name="s_phoneno" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="s_birth_date" class="form-label">Birth Date:</label>
                    <input type="date" id="s_birth_date" name="s_birth_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="s_photo" class="form-label">Photo:</label>
                    <input type="file" id="s_photo" name="s_photo" class="form-control-file" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>

        <?php
        if (isset($_POST["submit"]))
        {
            // Retrieve input data from form
            $name = $_POST['s_name'];
            $fathername = $_POST['sfather_name'];
            $surname = $_POST['s_surname'];
            $address = $_POST['s_address'];
            $gender = $_POST['gender'];
            $email = $_POST['s_email'];
            $phoneno = $_POST['s_phoneno'];
            $birthdate = $_POST['s_birth_date'];


            // Prepare SQL statement to insert data into student table
            $insert_query = "INSERT INTO students (s_name,sfather_name,s_surname,s_address,gender,s_email,s_phoneno,s_birth_date) 
                    VALUES ('$name', '$fathername','$surname','$address','$gender','$email','$phoneno','$birthdate')";

            $result = mysqli_query($connect, $insert_query);

            if ($result)
            {
                echo "Record inserted successfully.";
            }
            else
            {
                echo "Error: " . $result . "<br>" . mysqli_error($connect);
            }
        }
        ?>
</div>
</body>
</html>